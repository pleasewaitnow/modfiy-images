<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImageTest extends TestCase
{
    public function testSuccessful()
    {
        $endpoint = route('get.images.modify', ['file' => 'xbox.png']);

        $this->get($endpoint)->assertStatus(200);
    }

    public function testInvalidQueryParameters()
    {
        $endpoint = route('get.images.modify', [
            'file' => 'xbox.png',
            'unknown_height' => 500,
            'unknown_width' => 200
        ]);

        $this->get($endpoint)->assertStatus(500);
    }

    public function testRedirectWithValidParameters()
    {
        $endpoint = route('get.images.modify', [
            'file' => 'xbox.png',
            'crop_height' => 500,
            'crop_width' => 200
        ]);

        $this->get($endpoint)->assertStatus(302);
    }
}
