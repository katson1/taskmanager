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
        'name' => 'required|string|max:255',
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function store()
    {
        $this->validate([
            'name' => $this->categoryId ? 'required|string|max:255|unique:categories,name,' . $this->categoryId : 'required|string|max:255|unique:categories,name',
        ]);

        Category::updateOrCreate(
            ['id' => $this->categoryId],
            ['name' => $this->name]
        );

        $this->resetFields();
        $this->categories = Category::all();
    }

    public function edit($categoryId)
    {
        $category = Category::find($categoryId);
        $this->categoryId = $category->id;
        $this->name = $category->name;
    }

    public function delete($categoryId)
    {
        $category = Category::find($categoryId);
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
