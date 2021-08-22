@push('script')    
<script>
    Livewire.on('actualizar', pivot =>{   
                
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
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

</script>

<script>
    Livewire.on('validacion', mensaje =>{                           
        Swal.fire({
            
            icon: 'warning',
            title: mensaje,
            showConfirmButton: false,
            timer: 2000
        })                     
        
    })

</script>
@endpush
{{-- <script>
    @if(session('info-create'))
        Swal.fire({
            
            type: 'success',
            title: 'Creado Correctamente',
            showConfirmButton: false,
            timer: 2000
        })             
    @endif  
    
    @if(session('info-update'))
        Swal.fire({
            
            type: 'success',
            title: 'Actualizado Correctamente',
            showConfirmButton: false,
            timer: 2000
        })             
    @endif  

    @if(session('info-validate'))
        Swal.fire({
            
            type: 'success',
            title: 'Revisar los datos ingresados',
            showConfirmButton: false,
            timer: 2000
        })             
    @endif  

    @if(session('info-delete'))
        Swal.fire({
            
            type: 'success',
            title: 'Eliminado Correctamente',
            showConfirmButton: false,
            timer: 2000
        })             
    @endif

    @if(session('info-role'))
        Swal.fire({
            
            type: 'success',
            title: 'Asignado Correctamente',
            showConfirmButton: false,
            timer: 2000
        })             
    @endif 
</script> --}}
{{-- <script>
    Livewire.on('deletePivot', pivot =>{            
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
        })
    })

</script> --}}