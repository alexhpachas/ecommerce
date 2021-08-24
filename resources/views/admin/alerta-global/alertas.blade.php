@push('script')    
    <script>
        /* ALERTA PARA ACTUALIZAR */
        Livewire.on('actualizar', pivot =>{   
                    
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })        
            Toast.fire({
            icon: 'success',
            title: 'Actualizado Correctamente'        
            })                
        })

        /* ALERTA PARA ELIMINAR */
        Livewire.on('eliminar', mensaje =>{   
                    
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'center',
                    showConfirmButton: false,
                    timer: 2000,
                    
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })        
                    Toast.fire({
                    icon: 'success',
                    title: mensaje,    
                    })                
                })

    </script>


@endpush
