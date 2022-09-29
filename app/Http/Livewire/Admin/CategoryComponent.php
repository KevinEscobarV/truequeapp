<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    use WithPagination;
    protected $listeners = ['delete'];
    public $category;

    public $createForm = [
        'name' => null,
        'slug' => null,
        'description' => null,
        'image' => null,
    ];

    public $editForm = [
        'open' => false,
        'name' => null,
        'slug' => null,
        'description' => null,
        'image' => null,
    ];

    public $rules = [
        'createForm.name' => 'required',
        'createForm.slug' => 'required',
        'createForm.description' => 'required',
        'createForm.image' => 'required|image|max:1024',
    ];

    public function save()
    {
        $this->validate();
        $this->createForm['image'] = $this->createForm['image']->store('categories');
        Category::create($this->createForm);
        $this->reset('createForm');
    }

    public function edit($id)
    {
        $category = $this->category = Category::find($id);
        $this->editForm['open'] = true;
        $this->editForm['name'] = $category->name;
        $this->editForm['slug'] = $category->slug;
        $this->editForm['description'] = $category->description;
        $this->editForm['image'] = $category->image;
    }

    public function update()
    {
        $this->validate([
            'editForm.name' => 'required',
            'editForm.slug' => 'required',
            'editForm.description' => 'required',
            'editForm.image' => 'required|image|max:1024',
        ]);
        $this->category->update([
            'name' => $this->editForm['name'],
            'slug' => $this->editForm['slug'],
            'description' => $this->editForm['description'],
            'image' => $this->editForm['image']->store('categories'),
        ]);
        $this->editForm['open'] = false;
        $this->reset('editForm');
    }

    public function delete($categoryId)
    {
        $category = Category::find($categoryId);
        $category->delete();
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::paginate(10);
        return view('livewire.admin.category-component', compact('categories'))->layout('layouts.admin');
    }
}
