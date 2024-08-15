<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryManager extends Component
{
    public $name;
    public $categories;
    public $categoryId;

    protected $rules = [
        'name' => 'required|string|max:255|unique:categories,name',
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function store()
    {
        $this->validate();

        Category::updateOrCreate(
            ['id' => $this->categoryId],
            ['name' => $this->name]
        );

        $this->resetFields();
        $this->categories = Category::all();
    }

    public function edit(Category $category)
    {
        $this->categoryId = $category->id;
        $this->name = $category->name;
    }

    public function delete(Category $category)
    {
        $category->delete();
        $this->categories = Category::all();
    }

    private function resetFields()
    {
        $this->categoryId = null;
        $this->name = '';
    }

    public function render()
    {
        return view('livewire.category-manager');
    }
}