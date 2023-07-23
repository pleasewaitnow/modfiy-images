<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController
{
    public function modify(Request $request, string $file, ImageModificationService $service)
    {
        $modifiers = $request->all();
        $source = $service->getImagePath() . $file;

        if (empty($modifiers)) {
            return response()->file($source);
        }

        $generated = $service->modify($source, $modifiers);

        return redirect()->route('get.images.modify', ['file' => $generated]);
    }
}
