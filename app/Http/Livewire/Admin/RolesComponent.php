<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesComponent extends Component
{
    use WithPagination;

    protected $queryString =['search' => ['except' => '']];
    public $search = '';
    public $perPage = '10';
    public $permissions;

    protected $listeners = ['delete'];

    public $createForm = [
        'name' => null,
        'permissions' => [],
    ];

    public $editForm = [
        'open' => false,
        'name' => null,
        'permissions' => [],
        'role_id' => null,
    ];

    public $rulesCrate = [
        'createForm.name' => 'required|string|max:255',
        'createForm.permissions' => 'required',
    ];

    public $rulesEdit = [
        'editForm.name' => 'required|string|max:255',
        'editForm.permissions' => 'required',
    ];


    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.permissions' => 'rol',
    ];

    public function mount()
    {
        $this->permissions = Permission::all();
    }

    public function save()
    {
        $this->validate($this->rulesCrate);       
        Role::create($this->createForm)->syncPermissions($this->createForm['permissions']);
        $this->reset('createForm');
        $this->emit('saved');
    }

    public function edit(Role $role)
    {
        $this->editForm['open'] = true;
        $this->editForm['name'] = $role->name;
        $this->editForm['permissions'] = $role->permissions->pluck('id')->toArray();
        $this->editForm['role_id'] = $role->id;
    }

    public function update()
    {
        $this->validate($this->rulesEdit);
        $role = Role::find($this->editForm['role_id']);
        $role->update([
            'name' => $this->editForm['name'],
        ]);
        $role->syncPermissions($this->editForm['permissions']);
        $this->reset('editForm');
        $this->emit('saved');
    }

    public function delete($id)
    {
        $role = Role::find($id);
        $role->delete();
    }

    public function render()
    {
        return view('livewire.admin.roles-component', ['roles' => Role::where('name', 'LIKE', "%{$this->search}%" )
        ->orderBy('name')
        ->paginate($this->perPage)])->layout('layouts.admin');
    }
}
