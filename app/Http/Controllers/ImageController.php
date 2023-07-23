<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController
{
    public function modify(Request $request, string $file, ImageModificationService $service)
    {
        $modifiers = $request->all();

        $service->modify($file, $modifiers);

        return $file;
    }
}
