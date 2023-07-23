<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_example()
    {
        $endpoint = route('get.images.modify', ['file' => 'name.png']);

        $this->get($endpoint)->assertStatus(200);
    }
}
