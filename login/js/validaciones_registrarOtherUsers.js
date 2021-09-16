(function() {
    document.addEventListener('DOMContentLoaded', () => {
        const  register_account = document.getElementById('login_account_access');
        register_account.addEventListener('submit', e =>{
            validarLogin(e);
        });
        const validarLogin = (e) =>{
            e.preventDefault();
            const  user = document.getElementById('username');
            const  pass = document.getElementById('pass');
            const  correo = document.getElementById('correo');
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
            if(correo.value === ''){
                Swal.fire(
                    'Validate Form',
                    'Debes ingresar un correo',
                    'warning'
                );
                return;
            }
            register_account.submit();
        }
    });
})();