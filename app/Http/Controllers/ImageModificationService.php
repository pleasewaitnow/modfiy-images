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

        return '';
    }

    function generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
}
