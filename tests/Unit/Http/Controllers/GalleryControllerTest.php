<?php

namespace Http\Controllers;

use App\Gallery;
use App\Http\Controllers\GalleryController;
use PHPUnit\Framework\TestCase;

class GalleryControllerTest extends TestCase
{
    /** @test */
    public function a_gallery_can_be_added_to_a_project()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/gallery', [
            'title' => 'Gallery Test',
            'user_id' => 1,
            'project_id' => 1
        ]);

        $response->assertOk();
        $this->assertCount(1, Gallery::all());
    }
}
