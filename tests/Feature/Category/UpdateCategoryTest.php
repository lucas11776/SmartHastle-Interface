<?php

namespace Tests\Feature\Category;

use App\Category;
use Tests\TestCase;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\TestResponse;

class UpdateCategoryTest extends TestCase
{
    /**
     * Should update category in storage
     */
    public function testUpdateCategory()
    {
        $id = ($category = factory(Category::class)->create())->id;
        $data = ['name' => Faker::create()->unique()->name];

        $this->updateCategory($id, $data)
            ->assertRedirect();
    }

    public function testUpdateCategoryWithEmptyData()
    {
        $id = ($category = factory(Category::class)->create())->id;

        $this->updateCategory($id, [])
            ->assertJsonStructure([
                'message',
                'errors' => ['name']
            ]);
    }

    /**
     * Should try  to update category with existing category name.
     */
    public function testUpdateCategoryWithExistingName()
    {
        $id = factory(Category::class)->create()->id;
        $data = ['name' => factory(Category::class)->create()->name];

        $this->updateCategory($id, $data)
            ->assertJsonStructure([
                'message',
                'errors' => [
                   'name'
                ]
            ]);
    }

    /**
     * Make request to update category.
     *
     * @param int $id
     * @param array $data
     * @return TestResponse
     */
    protected function updateCategory(int $id, array $data): TestResponse
    {
        return $this->json('PATCH', 'category/' . $id, $data);
    }
}
