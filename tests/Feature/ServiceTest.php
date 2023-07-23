<?php

use App\Http\Controllers\ImageModificationService;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    private $service;
    public function setUp(): void
    {
        parent::setUp();
        $this->service = new ImageModificationService();
        $this->file = UploadedFile::fake()->image('image_one.jpg');
    }

    public function testCrop()
    {
        $modified = $this->service->modify($this->file->path(), ['crop_height' => 2, 'crop_width' => 4]);

        $imagick = new Imagick($this->service->getImagePath() . $modified);
        $this->assertEquals(2, $imagick->getImageHeight());
        $this->assertEquals(4, $imagick->getImageWidth());
    }
}
