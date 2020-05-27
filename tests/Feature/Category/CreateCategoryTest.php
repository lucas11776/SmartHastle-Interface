<?php

namespace Tests\Feature\Category;

use App\Category;
use Illuminate\Foundation\Testing\TestResponse;
use Tests\TestCase;

class CreateCategoryTest extends TestCase
{
    /**
     * Should create category.
     */
    public function testCreateCategory()
    {
        $data = $this->CategoryMock();

        $this->createCategory($data)
            ->assertRedirect('dashboard/categories');
    }

    /**
     * Should try to create category with empty data.
     */
    public function testCreateCategoryWithEmptyData()
    {
        $this->createCategory([])
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'name'
                ]
            ]);
    }

    /**
     * Should try to create category with exist category name.
     */
    public function testCreateCategoryWithExistingName()
    {
        $category = factory(Category::class)->create();

        $this->createCategory($category->toArray())
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'name'
                ]
            ]);
    }

    /**
     * Make request to create category in application.
     *
     * @param array $data
     * @return TestResponse
     */
    protected function createCategory(array $data): TestResponse
    {
        return $this->json('POST', 'category', $data);
    }
}
