<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Spatie\Permission\Models\Role;

use Livewire\WithPagination;



use Livewire\Component;
use Spatie\Permission\Models\Permission;

class UserComponent extends Component
{
    use WithPagination;
    public $search;
    public $open = false;
    public $usuario;    
    public $user;
    public $permisos;
    public $permisosEdit;
    public $permisosCreate;
    public $permisosList;
    public $rol=[];
    public $usuarioName;
    public $permisosDelete;
    public $permisosDashbor;
    public $permisosAcceso;
    public $permisospublicar;

    
    public $createForm = [                  
        'roles' =>[]
    ];

    public $editForm = [                  
        'roles' =>[]
    ];

    

    public function updatedSearch(){
        $this->resetPage();
    }

    public function getPermissions(){
        $this->permisos = Permission::orderBy('id','asc')->get();

        $this->permisosList = Permission::where('description','like','%'.'Ver'.'%')->get();
        $this->permisosCreate = Permission::where('description','like','%'.'Crear'.'%')->get();
        $this->permisosEdit = Permission::where('description','like','%'.'editar'.'%')->get();
        $this->permisosDelete = Permission::where('description','like','%'.'eliminar'.'%')->get();
        $this->permisosDashbor = Permission::where('description','like','%'.'dash'.'%')->get();
        $this->permisosAcceso = Permission::where('description','like','%'.'accesos'.'%')->get();
        $this->permisospublicar = Permission::where('description','like','%'.'publicar'.'%')->get();
        
    }

    public function mount(){
        $this->getPermissions();
    }

    public function edit(User $user){
        $this->createForm['roles'] = $user->permissions->pluck('id');
        
        /* $this->rol = $user->roles->pluck('id');   */  

        $this->open = true;           
        $this->usuario = User::find($user->id);
        $this->usuarioName = $this->usuario->name;
        /* $this->user= $user; */
        /* $this->usuario = $user->name; */
        /* $this->usuario = $this->user; */
                    
    }

    public function updatedEditFormRoles(){
        /* $this->createForm['roles'] = $this->$this->createForm['roles']; */
    }

    
    public function update(){                       

        $this->usuario->givePermissionTo($this->createForm['roles']);             
        $this->reset('open','rol');

        $this->getPermissions();
        /* $this->usuario->permissions()->attach($this->createForm['roles']); */

    }

    public function render()
    {
        
        $users = User::where('name','LIKE','%'.$this->search.'%')
                     ->orWhere('email','LIKE','%'.$this->search.'%')
                     ->paginate();
        return view('livewire.admin.user-component',compact('users'))->layout('layouts.admin');
    }
}
