<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Spatie\Permission\Models\Role;

use Livewire\WithPagination;



use Livewire\Component;

class UserComponent extends Component
{
    use WithPagination;
    public $search;
    public $open = false;
    public $usuario;    
    public $user;
    public $roles;
    public $rol=[];
    
    public $createForm = [                  
        'roles' =>[]
    ];

    public $editForm = [                  
        'roles' =>[]
    ];

    

    public function updatedSearch(){
        $this->resetPage();
    }

    public function getRoles(){
        $this->roles = Role::all();
    }

    public function mount(){
        $this->getRoles();
    }

    public function edit(User $user){
        
        $this->rol = $user->roles->pluck('id');    

        $this->open = true;                        
        $this->usuario = User::find($user->id);
        /* $this->user= $user; */
        /* $this->usuario = $user->name; */
        /* $this->usuario = $this->user; */
                    
    }

    public function updatedEditFormRoles(){
        $this->createForm['roles'] = $this->rol;
    }

    
    public function update(){                       

        
        $this->usuario->roles()->sync($this->rol);
        /* $user->assignRole($this->editForm['roles']); */
        $this->reset('open','rol');

        $this->getRoles();
        /* $this->category->brands()->sync($this->editForm['brands']); */

        /* $this->reset(['editForm','editImage']);

        $this->getCategories(); */
    }

    public function render()
    {
        
        $users = User::where('name','LIKE','%'.$this->search.'%')
                     ->orWhere('email','LIKE','%'.$this->search.'%')
                     ->paginate();
        return view('livewire.admin.user-component',compact('users'))->layout('layouts.admin');
    }
}
