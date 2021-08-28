(function() {
    document.addEventListener('DOMContentLoaded', () => {
        const  login_account_access = document.getElementById('login_account_access');
        
        login_account_access.addEventListener('submit', e =>{
            validarLogin(e);
        });
        const validarLogin = (e) =>{
            e.preventDefault();
            const  user = document.getElementById('user');
            const  pass = document.getElementById('pass');
            if(user.value === ''){
                Swal.fire(
                    'Validate Form',
                    'Debes ingresar un correo',
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
            login_account_access.submit();
        }
    });
})();