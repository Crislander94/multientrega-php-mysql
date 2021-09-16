(function() {
    document.addEventListener('DOMContentLoaded', () => {
        const  register_account = document.getElementById('login_account_access');
        const desde_hora = parseInt(document.getElementById('desde_hora').value);
        const hasta_hora = parseInt(document.getElementById('hasta_hora').value);
        const min_desde = parseInt(document.getElementById('min_desde').value);
        const min_hasta = parseInt(document.getElementById('min_hasta').value);
        register_account.addEventListener('submit', e =>{
            validarLogin(e);
        });
        const validarLogin = (e) =>{
            e.preventDefault();
            const  user = document.getElementById('username');
            const  pass = document.getElementById('pass');
            const  nombres = document.getElementById('nombres');
            const  ruc = document.getElementById('ruc');
            const  correo = document.getElementById('correo');
            const  medio_transporte = document.getElementById('medio_transporte');
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
            if(document.getElementById('medio_transporte').value === ''){
                Swal.fire(
                    'Validate Form',
                    'Debe colocar un medio de transporte',
                    'warning'
                );
                return;
            }
            if(user.value === ''){
                Swal.fire(
                    'Validate Form',
                    'Debes ingresar un nombre de usuario',
                    'warning'
                );
                return;
            }
            if(pass.value.startsWith(' ') || pass.value.endsWith(' ')){
                Swal.fire(
                    'Validate Form',
                    'La contraseña no puede contener espacios',
                    'warning'
                );
                return;
            }
            if(pass.value === ''){
                Swal.fire(
                    'Validate Form',
                    'Debes ingresar una contraseña',
                    'warning'
                );
                return;
            }
            if(nombres.value === ''){
                Swal.fire(
                    'Validate Form',
                    'Debes ingresar un nombre',
                    'warning'
                );
                return;
            }
            if(ruc.value === ''){
                Swal.fire(
                    'Validate Form',
                    'Debes ingresar un RUC',
                    'warning'
                );
                return;
            }
            if(correo.value === ''){
                Swal.fire(
                    'Validate Form',
                    'Debes ingresar un correo',
                    'warning'
                );
                return;
            }
            if(medio_transporte.value === ''){
                Swal.fire(
                    'Validate Form',
                    'Debes ingresar un medio de transporte',
                    'warning'
                );
                return;
            }
            register_account.submit();
        }
    });
})();