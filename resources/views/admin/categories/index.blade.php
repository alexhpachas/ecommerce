<x-admin-layout>
    <div class="container py-12">
        <div>
            @livewire('admin.create-category')
        </div>
    </div>

@push('script')
    
    <script>
        Livewire.on('deleteCategory', categorySlug =>{            
                    Swal.fire({
                    title: 'Desea Eliminar el Producto?',
                    text: "No podra recuperar el registro!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, Eliminar!'
                    }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.create-category','delete',categorySlug)
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Eliminado Correctamente',
                        showConfirmButton: false,
                        timer: 1500
                        })
                    }
                    })
                })
    </script>
@endpush
    
</x-admin-layout>