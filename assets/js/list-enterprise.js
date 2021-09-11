document.addEventListener('DOMContentLoaded', () => {
    $("#modal_enterprises").modal('show');
    const selectedEnterprise = document.getElementById('selectedEnterprise');
    //Traer Empresas Activas
    const getEnterpriseActive = () => {
        const form = new FormData();
        form.append("key", "listado");
        const ajax = new XMLHttpRequest();
        ajax.open('POST','endpoints/consumos-ajax-admin.php');
        ajax.onreadystatechange = () => {
            if(ajax.status === 200 && ajax.readyState === 4){
                const response = JSON.parse(ajax.responseText);
                const {data, codigo} = response;
                if(codigo === 200){
                    const myEnterprises = document.getElementById('myEnterprises');
                    data.forEach( enterprise=>{
                        const {cod_empresa,nom_empresa} = enterprise;
                        myEnterprises.innerHTML += `<option value="${cod_empresa}">${nom_empresa}</option>`;
                    });
                }else if(codigo === 204){
                    $("#modal_enterprises").modal('hide');
                }
            }
        }
        ajax.send(form);
    }
    const renderProductos = () => {
        const cod_empresa = (document.getElementById('myEnterprises').value != '') ? document.getElementById('myEnterprises').value : '';
        const form = new FormData();
        form.append("key", "list-products");
        form.append("cod_empresa", cod_empresa);
        const ajax = new XMLHttpRequest();
        ajax.open('POST','endpoints/consumos-ajax-admin.php');
        ajax.onreadystatechange = () => {
            if(ajax.status === 200 && ajax.readyState === 4){
                const response = JSON.parse(ajax.responseText);
                const {data, codigo} = response;
                myProducts.innerHTML = '';
                if(codigo === 200){
                    const myProducts = document.getElementById('myProducts');
                    data.forEach( (product, index)=>{
                        let {id,nom_producto,precio,fecha_creacion} = product;
                        fecha_creacion = transformCreatedDate(fecha_creacion);
                        myProducts.innerHTML += generateRowProduct(id, nom_producto,precio,fecha_creacion, index,cod_empresa);
                    });
                }else if(codigo === 204){
                    myProducts.innerHTML = notFoundItems();
                }
                $("#modal_enterprises").modal('hide');
            }
        }
        ajax.send(form);
    }
    const generateRowProduct = (id, nom_producto, precio, fecha_creacion, index,cod_empresa) => {
        return `
            <tr>
                <td>${(index+1)}</td>
                <td>${nom_producto}</td>
                <td>$${precio}</td>
                <td style="color:#12121; font-weight:bold;">${fecha_creacion}</td>
                <td>
                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                        <a href="admin.php?c=admin&a=getDetailsProduct&id=${id}&cod_empresa=${cod_empresa}"  data-toggle="tooltip" data-placement="top" title="Revisar producto" id="modificar1">
                            <button type="button" style="border-radius: 5px 0 0 5px;" class="btn btn-info">
                                <i style="color:#fff; font-size:16px !important;" class="fas fa-eye"></i>
                            </button>
                        </a>
                        <a href="admin.php?c=admin&a=approveProduct&id=${id}&cod_empresa=${cod_empresa}"  data-toggle="tooltip" data-placement="top" title="Aprobar producto" id="modificar1">
                            <button type="button" style="border-radius: 0px !important;" class="btn btn-success">
                                <i style="color:#fff; font-size:16px !important;" class="fas fa-check alt"></i>
                            </button>
                        </a>
                        <a href="admin.php?c=admin&a=disclaimerProduct&id=${id}&cod_empresa=${cod_empresa}" data-toggle="tooltip" data-placement="top"  title="" data-original-title="Cancelación producto" id="modificar1">
                            <button type="button" style="border-radius:0 5px 5px 0" class="btn btn-danger izquierdo" >
                                <i style="color:#fff; font-size:16px !important;" class="fas fa-times alt"></i>
                            </button>
                        </a>
                    </div>
                </td>
            </tr>`;
    }
    const notFoundItems = () => {
        return `<tr>
                    <td colspan="8" class="text-center py-4">
                        <div class="container_thumb_center d-flex justify-content-center mb-4">
                            <div class="thumb_lg">
                                <img src="assets/img/not_found.svg" alt="#Not Fount" class="img_thumb">
                            </div>
                        </div>
                        <span style="font-style:italic;">La empresa seleccionada no tiene productos pendientes de gestionar</span>
                    </td>
                </tr>`;
    }
    const transformCreatedDate = (fecha) =>{
        const array_month = ["Enero", "Febrero", "Marzo","Abril","Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre" , "Noviembre", "Diciembre"];
        let newFecha = fecha.split(" ")[0];
        newFecha = newFecha.split("-")[2]+"/"+array_month[fecha.split("-")[1] -1]+"/"+newFecha.split("-")[0];
        return newFecha;
    }
    selectedEnterprise.addEventListener('click', () => {
            renderProductos();
    });

    //Obtener las empresas por primera vez
    getEnterpriseActive();
})