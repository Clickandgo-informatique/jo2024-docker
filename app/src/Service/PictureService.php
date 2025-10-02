<?php

namespace App\Service;

use Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PictureService
{
    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    public function add(UploadedFile $picture, ?string $folder = null, ?int $width = 250, ?int $height = 250)
    {
        //On donne un nouveau nom à l'image
        $fichier = md5(uniqid(rand(), true)) . '.webp';

        //On récupère les infos de l'image
        $picture_infos = getimagesize($picture);

        if ($picture_infos === false) {
            throw new Exception("Format d'image incorect");
        }
        //On vérifie le format de l'image
        switch ($picture_infos['mime']) {
            case 'image/png';
                $picture_source = imagecreatefrompng($picture);
                break;
            case 'image/jpeg';
                $picture_source = imagecreatefromjpeg($picture);
                break;
            case 'image/gif';
                $picture_source = imagecreatefromgif($picture);
                break;
            case 'image/webp';
                $picture_source = imagecreatefromwebp($picture);
                break;
            default:
                throw new Exception("Format d'image incorect");
        }

        //Recadrage de l'image et récupération des dimensions
        $imageWidth = $picture_infos[0];
        $imageHeight = $picture_infos[0];

        //Vérification de l'orrientation
        switch ($imageWidth <=> $imageHeight) {
            case -1: //portrait
                $squareSize = $imageWidth;
                $src_x = 0;
                $src_y = ($imageHeight - $squareSize) / 2;
                break;

            case 0: //carrée
                $squareSize = $imageWidth;
                $src_x = 0;
                $src_y = 0;
                break;

            case 1: //paysage
                $squareSize = $imageWidth;
                $src_y = 0;
                $src_x = ($imageHeight - $squareSize) / 2;
                break;

            default:
                return;
        }

        //création d'une nouvelle image
        $resized_picture = imagecreatetruecolor($width, $height);

        imagecopyresampled($resized_picture, $picture_source, 0, 0, $src_x, $src_y, $width, $height, $squareSize, $squareSize);

        $path = $this->params->get('images_directory') . $folder;

        //Création du dossier de destination
        if (!file_exists($path . '/mini/')) {
            mkdir($path . '/mini', 0755, true);
        }

        //stockage de l'image recadrée
        imagewebp($resized_picture, $path . '/mini/' . $width . 'x' . $height . '-' . $fichier);

        $picture->move($path . '/', $fichier);
        return $fichier;
    }

    public function delete($fichier, ?string $folder = '', ?int $width = 250, ?int $height = 250)
    {

        if ($fichier !== 'default.webp') {
            $success = false;
            $path = $path = $this->params->get('images_directory') . $folder;
            $mini = $path . '/mini' . $width . 'x' . $height . '-' . $fichier;

            if (file_exists($mini)) {
                unlink($mini);
                $success = true;
            }

            $original = $path . '/' . $fichier;
            if (file_exists($original)) {
                unlink($original);
                $success = true;
            }
            return $success;
        }
        return false;
    }
}
