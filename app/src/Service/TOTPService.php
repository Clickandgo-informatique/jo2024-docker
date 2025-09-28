<?php

namespace App\Service;

use App\Entity\Users;
use BaconQrCode\Renderer\GDLibRenderer;
use BaconQrCode\Writer;
use PragmaRX\Google2FA\Google2FA;

class TOTPService
{
    private Google2FA $google2FA;

    public function __construct()
    {
        $this->google2FA = new Google2FA();
    }

    public function generateSecret(): string
    {
        return $this->google2FA->generateSecretKey();
    }

    public function getQRCode(Users $user, int $size = 200): string
{
    $appName = 'reservations-jo-2024';

    // Génère l'URI TOTP
    $otpUri = $this->google2FA->getQRCodeUrl(
        $appName,
        $user->getEmail(),
        $user->getGoogle2FASecret()
    );

    // Génération du QR Code en image PNG
    $renderer = new GDLibRenderer($size);
    $writer = new Writer($renderer);

    $pngString = $writer->writeString($otpUri);

    return 'data:image/png;base64,' . base64_encode($pngString);
}


    public function verifyCode(Users $user, string $code): bool
    {
        return $this->google2FA->verifyKey($user->getGoogle2FASecret(), $code, 4);
    }
    public function checkCode(Users $user, string $code): bool
{
    if (!$user->getGoogle2FASecret()) {
        return false;
    }

    return $this->google2FA->verifyKey($user->getGoogle2FASecret(), $code);
}
}
