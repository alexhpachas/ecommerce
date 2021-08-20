<script>
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
</script>