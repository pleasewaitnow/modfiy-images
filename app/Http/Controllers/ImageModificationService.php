<?php


namespace App\Http\Controllers;

use Imagick;

class ImageModificationService
{
    public function modify(string $source, array $modifiers): string
    {
        if (array_key_exists('crop_height', $modifiers) && array_key_exists('crop_width', $modifiers)) {
            return $this->crop($source, $modifiers['crop_height'], $modifiers['crop_width']);
        }

        if (array_key_exists('resize_height', $modifiers) && array_key_exists('resize_width', $modifiers)) {
            return $this->resize($source, $modifiers['resize_height'], $modifiers['resize_width']);
        }

        throw new \Exception('Unknown modifiers were sent!');
    }

    private function crop(string $source, string $height, string $width): string
    {
        $imagick = new Imagick($source);
        $imagick->cropImage($width, $height, 0, 0);

        $extension = pathinfo($source, PATHINFO_EXTENSION);
        $destination = $this->generateFileName($extension);
        $imagick->writeImage($this->getImagePath() . $destination);

        $imagick->clear();
        $imagick->destroy();

        return $destination;
    }

    private function resize(string $source, string $height, string $width): string
    {
        $imagick = new Imagick($source);
        $imagick->resizeImage($width, $height, Imagick::FILTER_LANCZOS, 1, true);

        $extension = pathinfo($source, PATHINFO_EXTENSION);
        $destination = $this->generateFileName($extension);
        $imagick->writeImage($this->getImagePath() . $destination);

        $imagick->clear();
        $imagick->destroy();

        return $destination;
    }

    private function generateFileName(string $format): string
    {
        return sprintf('%s-%s.%s', 'generated-image', time(), $format);
    }

    public function getImagePath(): string
    {
        return public_path() . '/images/';
    }
}
