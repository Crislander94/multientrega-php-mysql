document.addEventListener('DOMContentLoaded', () => {
    const validarStatusEmpresa = () => {
        const estado_empresa = document.getElementById('estado_empresa');
        if(estado_empresa.value === 'P'){
            Swal.fire(
                'Status empresa',
                'Su empresa está pendiente de aprobación, sea paciente mientras los administradores realizan el proceso de admisión.',
                'info'
            );
            return;
        }
    }
    validarStatusEmpresa();
});