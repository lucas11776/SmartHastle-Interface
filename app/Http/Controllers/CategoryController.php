<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\DeleteCategoryRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Create new in storage.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CategoryRequest $request)
    {
        $this->create($request->validated());

        return redirect('dashboard/categories')
            ->with('success', 'Category has been created.');
    }

    /**
     * Update specified category in storage.
     *
     * @param Category $category
     * @param CategoryRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update(Category $category, CategoryRequest $request)
    {
        $category->update([
            'name' => $name = $request->validated()['name'],
            'slug' => Str::slug($name)
        ]);

        return redirect('dashboard/categories')
            ->with('success', 'Category has updated successfully.');
    }

    /**
     * Delete a specified category in storage.
     *
     * @param Category $category
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    protected function destroy(Category $category)
    {
        $category->delete();

        return redirect('dashboard/categories')
            ->with('success', 'Category has been deleted successfully.');
    }

    /**
     * Create category in storage.
     *
     * @param array $data
     * @return Category
     */
    protected function create(array $data): Category
    {
        return Category::create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name'])
        ]);
    }
}
