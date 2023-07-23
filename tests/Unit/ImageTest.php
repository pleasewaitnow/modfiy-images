<?php

namespace Tests\Unit;

use Controllers\ImageModificationService;
use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
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
        $modified = $this->service->crop($this->file->path(), 2, 4);

        $this->assertEquals(2, $modified->getImageHeight());
        $this->assertEquals(4, $modified->getImageWidth());
    }
    public function testResize()
    {
        $modified = $this->service->resize($this->file->path(), 2,4);

        $this->assertEquals(2, $modified->getImageHeight());
    }
}
