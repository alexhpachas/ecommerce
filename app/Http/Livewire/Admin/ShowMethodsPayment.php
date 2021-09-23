<?php

namespace App\Http\Livewire\Admin;

use App\Models\Utility;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

use Livewire\WithFileUploads;

class ShowMethodsPayment extends Component
{
    use WithFileUploads;
    public $method;
    public $name;
    public $description;
    public $celular;
    public $status=false;
    public $qr;
    public $rand;

    public $editImage;

    public $open = false;

    public $editForm = [   
        'open' => false,
        'name' => null,       
        'description' => null,
        'celular' => null,
        'status' => false,  
        'qr'=>null      
    ];

    public function mount(Utility $method){
        $this->method = $method;
        $this->rand= rand();
        /* $this->name=$method->name;
        $this->description = $method->description;
        $this->celular = $method->celular;
        $this->status = $method->status;
        $this->qr = $method->qr; */
    }

    public function edit(Utility $method){
        $this->reset('editImage');
        $this->editForm['open'] = true;
        $this->editForm['name'] = $method->name;
        $this->editForm['description'] = $method->description;
        $this->editForm['celular'] = $method->celular;
        $this->editForm['status'] = $method->status;    
        $this->editForm['qr'] = $method->qr;    
        $this->rand = rand();
    }

    public function update(){
        $rules = [
            'editForm.name' =>'required',
            'editForm.description' =>'required',
            'editForm.celular' =>'required',
            'editForm.status' => 'required',
            'editForm.qr' => 'required',
        ];

        $this->validate($rules);
        
        if ($this->editImage) {

            $rules['editImage']= 'image|max:1024';                        
        }

        $this->validate($rules);

        if ($this->editImage) {
            Storage::delete($this->editForm['qr']);
            $this->editForm['qr'] = $this->editImage->store('codigos');            
        }

        $this->method->update($this->editForm);
        $this->emit('update','El Metodo de pago fue actualizado');

        $this->reset('editForm','editImage');

        $this->emitTo('methods-payment','render');

        $this->rand = rand();

        return redirect()->route('admin.methods.index');

        
    }

    public function cancelar(){
        $this->rand = rand();
        $this->reset('editForm','editImage');
        $this->resetValidation();
    }

    public function render()
    {
        
        return view('livewire.admin.show-methods-payment');
    }
}
