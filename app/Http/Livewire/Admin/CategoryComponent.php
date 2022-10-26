<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CategoryComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $listeners = ['delete'];
    public $category;
    public $edit_image;

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

    public function updatedCreateFormName($value)
    {
        $this->createForm['slug'] = Str::slug($value);
    }

    public function save()
    {
        $this->validate();
        $this->createForm['image'] = $this->createForm['image']->store('categories');
        Category::create($this->createForm);
        $this->reset('createForm');
    }

    public function edit($id)
    {
        // Resetar validaciones
        $this->resetValidation();
        $this->reset('editForm', 'edit_image');
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
            'edit_image' => 'nullable|image|max:1024',
        ]);
        $this->category->update([
            'name' => $this->editForm['name'],
            'slug' => $this->editForm['slug'],
            'description' => $this->editForm['description'],
            'image' => $this->edit_image->store('categories'),
        ]);
        $this->editForm['open'] = false;
        $this->reset('editForm', 'edit_image');
    }

    public function delete($categoryId)
    {
        $category = Category::find($categoryId);
        Storage::delete($category->image);
        $category->delete();
        $this->resetPage();
    }

    public function render()
    {
        // Categorias en orden descendente, paginadas de 10 en 10
        $categories = Category::latest()->paginate(10);

        return view('livewire.admin.category-component', compact('categories'))->layout('layouts.admin');
    }
}
