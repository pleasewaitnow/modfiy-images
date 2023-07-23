<?php

namespace Controllers;

use Imagick;

class ImageModificationService
{
    public function modify(string $source, array $modifiers): string
    {
        if (array_key_exists('crop_height', $modifiers) && array_key_exists('crop_width', $modifiers)) {
            $cropped = $this->crop($source, $modifiers['crop_height'], $modifiers['crop_width']);

            return $this->save($cropped, $this->generateFileName(pathinfo($source, PATHINFO_EXTENSION)));
        }

        if (array_key_exists('resize_height', $modifiers) && array_key_exists('resize_width', $modifiers)) {
            $resized = $this->resize($source, $modifiers['resize_height'], $modifiers['resize_width']);

            return $this->save($resized, $this->generateFileName(pathinfo($source, PATHINFO_EXTENSION)));
        }

        throw new \Exception('Unknown modifiers were sent!');
    }

    public function crop(string $source, string $height, string $width): Imagick
    {
        $imagick = new Imagick($source);
        $imagick->cropImage($width, $height, 0, 0);

        return $imagick;
    }

    public function resize(string $source, string $height, string $width): Imagick
    {
        $imagick = new Imagick($source);
        $imagick->resizeImage($width, $height, Imagick::FILTER_LANCZOS, 1, true);

        return $imagick;
    }

    private function save(Imagick $imagick, string $destination): string
    {
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
