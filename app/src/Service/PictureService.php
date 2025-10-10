<?php

namespace App\Service;

use Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PictureService
{
    private string $picturesDir;

    public function __construct(ParameterBagInterface $params)
    {
        $this->picturesDir = rtrim($params->get('pictures_directory'), '/');
    }

    public function upload(UploadedFile $picture, ?string $folder = null, ?int $width = 250, ?int $height = 250): string
    {
        $filename = md5(uniqid('', true)) . '.webp';
        $pictureInfos = getimagesize($picture);

        if ($pictureInfos === false) {
            throw new Exception("Format d'image incorrect");
        }

        switch ($pictureInfos['mime']) {
            case 'image/png':
                $source = imagecreatefrompng($picture);
                break;
            case 'image/jpeg':
                $source = imagecreatefromjpeg($picture);
                break;
            case 'image/gif':
                $source = imagecreatefromgif($picture);
                break;
            case 'image/webp':
                $source = imagecreatefromwebp($picture);
                break;
            default:
                throw new Exception("Format d'image incorrect");
        }

        $w = $pictureInfos[0];
        $h = $pictureInfos[1];
        $square = min($w, $h);
        $srcX = ($w > $h) ? ($w - $square) / 2 : 0;
        $srcY = ($h > $w) ? ($h - $square) / 2 : 0;

        $resized = imagecreatetruecolor($width, $height);
        imagecopyresampled($resized, $source, 0, 0, $srcX, $srcY, $width, $height, $square, $square);

        $path = $this->picturesDir . ($folder ?? '');
        $miniPath = $path . '/mini';

        $this->createDirectory($path);
        $this->createDirectory($miniPath);

        // Sauvegarde miniature
        imagewebp($resized, $miniPath . '/' . $width . 'x' . $height . '-' . $filename);

        // Déplacement original
        $picture->move($path, $filename);

        // Correction permissions du fichier original
        $this->fixPermissions($path . '/' . $filename);

        return $filename;
    }

    public function delete(string $filename, ?string $folder = '', ?int $width = 250, ?int $height = 250): bool
    {
        if ($filename === 'default.webp') return false;

        $path = $this->picturesDir . ($folder ?? '');
        $mini = $path . '/mini/' . $width . 'x' . $height . '-' . $filename;
        $original = $path . '/' . $filename;

        if (file_exists($mini)) unlink($mini);
        if (file_exists($original)) unlink($original);

        return true;
    }

    private function createDirectory(string $path): void
    {
        if (!is_dir($path)) {
            if (!mkdir($path, 0777, true) && !is_dir($path)) {
                throw new Exception("Impossible de créer le dossier : $path");
            }
            $this->fixPermissions($path);
        }
    }

    private function fixPermissions(string $path): void
    {
        // Détecte l’utilisateur courant (PHP-FPM / CLI)
        $user = posix_getuid() ?? 1000; // fallback 1000 si non supporté
        $group = posix_getgid() ?? 1000;

        // Applique propriétaire + permissions 0777 pour dossiers / 0666 pour fichiers
        if (is_dir($path)) {
            @chown($path, $user);
            @chgrp($path, $group);
            @chmod($path, 0777);
        } elseif (is_file($path)) {
            @chown($path, $user);
            @chgrp($path, $group);
            @chmod($path, 0666);
        }
    }
}
