<?php

namespace Tests\Feature\Category;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class CreateCategoryTest extends TestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loginAsAdministrator();
    }

    /**
     * Should create category.
     */
    public function testCreateCategory()
    {
        $data = $this->CategoryMock();

        $this->createCategory($data)
            ->assertRedirect();
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
