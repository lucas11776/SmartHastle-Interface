<?php

namespace Tests\Feature\Category;

use App\Category;
use Illuminate\Foundation\Testing\TestResponse;
use Tests\TestCase;

class DeleteCategoryTest extends TestCase
{
    /**
     * Should delete category in storage.
     */
    public function testDeleteCategory()
    {
        $id = factory(Category::class)->create()->id;

        $this->deleteCategory($id)
            ->assertRedirect();
    }

    /**
     * Should try and delete category that does not exist.
     */
    public function testDeleteInvalidCategoryId()
    {
        $this->deleteCategory(rand(5, 55))
            ->assertJsonStructure([
                'message'
            ]);
    }

    /**
     * Make request to try and delete category.
     *
     * @param int $id
     * @return TestResponse
     */
    protected function deleteCategory(int $id): TestResponse
    {
        return $this->json('DELETE', 'category/' . $id);
    }
}
