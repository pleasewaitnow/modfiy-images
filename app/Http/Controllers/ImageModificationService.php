<?php

namespace App\Http\Controllers;

class ImageModificationService
{
    public function modify(string $file, array $modifiers): string
    {
        if (empty($modifiers)) {
            return $file;
        }

        // generate a new file

        return $this->generateFileName();
    }

    function generateFileName(string $prefix = 'generated-image'): string
    {
        return sprintf('%s-%s', $prefix, time());
    }
}
