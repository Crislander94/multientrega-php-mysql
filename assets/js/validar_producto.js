document.addEventListener('DOMContentLoaded', () =>{
    const registar_producto = document.getElementById('registar_producto');
    registar_producto.addEventListener('submit', e =>{
        validarProducto(e);
    });
    const validarProducto = (e) =>{
        e.preventDefault();
        if(document.getElementById('tuscategorias').value ===''){
            Swal.fire(
                'Validate Form',
                'Debe escoger una categoria para el producto',
                'warning'
            );
            return;
        }
        if(document.getElementById('nom_product').value ===''){
            Swal.fire(
                'Validate Form',
                'Debe colocar un nombre para el producto',
                'warning'
            );
            return;
        }
        if(document.getElementById('precio').value ===''){
            Swal.fire(
                'Validate Form',
                'Debe colocar un precio para el producto',
                'warning'
            );
            return;
        }
        if(document.getElementById('disponibilidad').value === ''){
            Swal.fire(
                'Validate Form',
                'Debe colocar la disponibilidad del producto',
                'warning'
            );
            document.getElementById('disponibilidad').value = 10;
            return;
        }
        registar_producto.submit();
    }
});