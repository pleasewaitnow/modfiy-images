<?php

namespace App\Http\Controllers;

use Imagick;

class ImageModificationService
{
    public function modify(string $source, array $modifiers): string
    {
        if (empty($modifiers)) {
            return $source;
        }

        $destination = public_path() . $this->generateFileName();

        return $this->generateFileName();
    }

    private function resize(string $source, string $destination, string $height, string $width): void
    {
        $imagick = new Imagick($source);
        $imagick->cropImage($width, $height, 0, 0);
        $imagick->writeImage($destination);

        $imagick->clear();
        $imagick->destroy();
    }

    private function crop(string $source, string $destination, string $height, string $width): void
    {

    }

    private function generateFileName(string $prefix = 'generated-image'): string
    {
        return sprintf('%s-%s', $prefix, time());
    }
}
