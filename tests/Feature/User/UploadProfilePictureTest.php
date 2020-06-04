<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UploadProfilePictureTest extends TestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loginAsUser();
    }

    /**
     * Should upload user profile picture.
     */
    public function testUploadProfilePicture()
    {
        $data = [
            'image' => UploadedFile::fake()->create('lucas.png', 1000 * 2)
        ];

        $this->uploadProfilePicture($data)
            ->assertRedirect();
        Storage::disk('public')
            ->assertExists($data['image']->hashName());
    }

    /**
     * Should try to upload profile picture with empty data.
     */
    public function testUploadProfilePictureWithEmptyData()
    {
        $data = [
            'image' => UploadedFile::fake()->create('lucas.pdf', 1000 * 2)
        ];

        $this->uploadProfilePicture($data)
            ->assertJsonStructure([
               'message',
               'errors' => [
                   'image'
               ]
            ]);
    }

    /**
     * Change user profile picture.
     *
     * @param array $data
     * @return TestResponse
     */
    protected function uploadProfilePicture(array $data): TestResponse
    {
        return $this->json('POST', 'user/picture', $data);
    }
}
