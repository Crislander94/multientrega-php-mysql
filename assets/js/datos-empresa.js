document.addEventListener('DOMContentLoaded', () =>{
    const form_registrar_empresa = document.getElementById('form_registrar_empresa');
    form_registrar_empresa.addEventListener('submit', e =>{
        fillInputFormasPago();
        validacion(e);
    });
    const fillInputFormasPago = (e) =>{
        const filter_option_inner_inner = document.getElementsByClassName('filter-option-inner-inner');
        document.getElementById('strings_pagos').value = filter_option_inner_inner[1].textContent;
    }
    const validacion = (e) =>{
        e.preventDefault();
        const desde_hora = parseInt(document.getElementById('desde_hora').value);
        const hasta_hora = parseInt(document.getElementById('hasta_hora').value);
        const min_desde = parseInt(document.getElementById('min_desde').value);
        const min_hasta = parseInt(document.getElementById('min_hasta').value);
        if(document.getElementById('horarios').value === ''){
            Swal.fire(
                'Validate Form',
                'Debe seleccionar al menos un día de atención',
                'warning'
            );
            return;
        }
        if(desde_hora > hasta_hora ){
            Swal.fire(
                'Validate Form',
                'Verificar su horario de apertura con el de cierre',
                'warning'
            );
            return;
        }
        if(desde_hora === hasta_hora ){
            if(min_desde > min_hasta){
                Swal.fire(
                    'Validate Form',
                    'Verificar su horario de apertura con el de cierre',
                    'warning'
                );
                return;
            }
        }
        if(document.getElementById('min_desde').value === ''){
            Swal.fire(
                'Validate Form',
                'Verificar su horario de apertura con el de cierre',
                'warning'
            );
            return;
        }
        if(document.getElementById('min_hasta').value === ''){
            Swal.fire(
                'Validate Form',
                'Verificar su horario de apertura con el de cierre',
                'warning'
            );
            return;
        }
        if(document.getElementById('formaspago').value === ''){
            Swal.fire(
                'Validate Form',
                'Debe seleccionar al menos una opcion de metodo de Pago',
                'warning'
            );
            return;
        }
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
        form_registrar_empresa.submit();
    }
});