document.addEventListener('DOMContentLoaded', () =>{
    const form_modificar_registro = document.getElementById('form_modificar_registro');
    form_modificar_registro.addEventListener('submit', e =>{
        validacionModificacion(e);
    });
    const validacionModificacion = (e) =>{
        e.preventDefault();
        if(document.getElementById('nom_empresa').value ===''){
            Swal.fire(
                'Validate Form',
                'Debe colocar un nombre de la empresa',
                'warning'
            );
            return;
        }
        if(document.getElementById('ruc').value ===''){
            Swal.fire(
                'Validate Form',
                'Debe colocar un RUC de la empresa',
                'warning'
            );
            return;
        }
        if(document.getElementById('correo').value ===''){
            Swal.fire(
                'Validate Form',
                'Debe colocar un Correo de la empresa',
                'warning'
            );
            return;
        }
        if(document.getElementById('telefono').value ===''){
            Swal.fire(
                'Validate Form',
                'Debe colocar un Correo de la empresa',
                'warning'
            );
            return;
        }
        if(document.getElementById('direccion').value ===''){
            Swal.fire(
                'Validate Form',
                'Debe colocar una Direccion',
                'warning'
            );
            return;
        }
        form_modificar_registro.submit();
    }
});