document.addEventListener('DOMContentLoaded', () => {
    const tipo = document.getElementById('tipo');
    const cabecera = document.getElementById('cabecera');
    const myResponseReports = document.getElementById('myResponseReports');
    const consultas = {
        "cliente"     : {
                    header: ' <th style="text-align:center">Nombre Cliente</th> <th style="text-align:center">Identificacion</th>',
                    columnas: ' c.nombres as nombre,c.identificacion as identificacion',
                    inner: ' inner join clientes c on c.cod_cliente = p.cliente ',
                    group: ' group by c.nombres '},
        "repartidor"  : {
                    header: ' <th style="text-align:center">Nombre Repartidor</th> <th style="text-align:center">RUC</th>',
                    columnas: ' rp.nombres as nombre, rp.RUC as identificacion ',
                    inner: ' inner join repartidores rp on rp.cod_repartidor = p.cod_repartidor ' ,
                    group: ' group by rp.nombres '},
        "empresa"     : {
                    header: ' <th style="text-align:center">Nombre Empresa</th> <th style="text-align:center">RUC</th>',
                    columnas: ' emp.nom_empresa as nombre, emp.ruc as identificacion ', 
                    inner: ' inner join productos pr on p.producto = pr.id inner join empresa emp on pr.cod_empresa = emp.cod_empresa ', 
                    group: ' group by emp.nom_empresa '},
        "producto"    : {
                    header: '<th style="text-align:center">Nombre Producto</th> ',
                    columnas: ' pr.nom_producto as nombre ', 
                    inner:' inner join productos pr on p.producto = pr.id ',
                    group: ' group by pr.nom_producto '},
        "categoria"    : {
                    header: '<th style="text-align:center">Categoria</th>',
                    columnas: ' cat.descripcion as nombre ', 
                    inner:' inner join productos pr on p.producto = pr.id inner join categorias cat on cat.id = pr.categoria ',
                    group: ' group by cat.descripcion '},
    }

    const renderTableDataByFilter = (tipo) => {
        let total = 0;
        let colspan = 0;
        const form = new FormData();
        const ajax = new XMLHttpRequest();
        ajax.open("POST", 'endpoints/consumos-ajax-admin.php');
        const {columnas, group, inner, header} = consultas[tipo];
        console.log(columnas,group, inner);
        form.append("columnas" , columnas);
        form.append("group", group);
        form.append("inner", inner);
        form.append("key", 'list-reportes-by-filter');
        ajax.onreadystatechange = () => {
            if(ajax.readyState === 4 && ajax.status === 200){
                const response = JSON.parse(ajax.responseText);
                const {codigo,data, status} = response;
                myResponseReports.innerHTML = '';
                console.log(response);
                if(codigo === 200){
                        colspan = 6;
                        if(tipo !== "producto" && tipo !== "categoria")colspan = 7
                        cabecera.innerHTML = `
                        <tr>
                            <td style="width:100%;text-align:center" colspan=${colspan+1}><h3>Reporte ${tipo}</h3></td>
                        </tr>
                        <tr>
                            <th style="text-align:center">#</th>
                            ${header}
                            <th style="text-align:center">Cantidad Pedidos</th>
                            <th style="text-align:center">Ganancia Repartidor</th>
                            <th style="text-align:center">Ganancia Empresa</th>
                            <th style="text-align:center">Ganancia Dueños</th>
                            <th style="text-align:center">Ventas</th>
                        </tr>`;
                        data.forEach( (reporte,index) => {
                            const {total_ventas, cantidadPedidos,ganancia_duenios, ganancia_empresa, ganancia_repartidor, nombre} = reporte;
                            if(cantidadPedidos != 0){
                                let tmp_identificacion = '';
                                if(tipo !== "producto" && tipo !== "categoria"){
                                    const {identificacion} = reporte;
                                    tmp_identificacion = `<td style="text-align:center">${identificacion}</td>`
                                } 
                                myResponseReports.innerHTML += `
                                <tr>
                                    <td style="text-align:center">${index+1}</td>
                                    <td style="text-align:center">${nombre}</td>
                                    ${tmp_identificacion}
                                    <td style="text-align:center">${cantidadPedidos}</td>
                                    <td style="text-align:center">$${ganancia_repartidor}</td>
                                    <td style="text-align:center">$${ganancia_empresa}</td>
                                    <td style="text-align:center">$${ganancia_duenios}</td>
                                    <td style="text-align:center">$${total_ventas}</td>
                                </tr>`;
                                total += parseFloat(total_ventas).toFixed(2);
                            }else{
                                myResponseReports.innerHTML = notFoundItems();
                                return;
                            }
                        });
                        // total = ''+total;
                        // total = (total.indexOf('.') != -1)? total: total+'.00'
                        myResponseReports.innerHTML += `<td colspan = ${colspan} style="background:#f2f2f2;text-align:center; font-weight:bold; color:#000">TOTAL</td>
                        <td style="background:#282a35;color:#fff;text-align:center;font-weight:bold">$${total}</td>`;
                    
                }else{
                    myResponseReports.innerHTML = notFoundItems();
                }
            }
        }
        ajax.send(form);
    }
    const renderAllData = () => {
        const form = new FormData();
        const ajax = new XMLHttpRequest();
        ajax.open("POST", 'endpoints/consumos-ajax-admin.php');
        form.append("key", "list-reportes");
        ajax.onreadystatechange = () => {
            if(ajax.readyState === 4 && ajax.status === 200){
                const response = JSON.parse(ajax.responseText);
                const {data, codigo} = response;
                if(codigo === 200){
                    myResponseReports.innerHTML = '';
                    const {total_ventas, cantidadPedidos,ganancia_duenios, ganancia_empresa, ganancia_repartidor} = data[0];
                    if(cantidadPedidos !== '0'){
                        cabecera.innerHTML = `
                                    <tr>
                                        <td style="width:100%;text-align:center" colspan=6><h3>Reporte General</h3></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:center">#</th>
                                        <th style="text-align:center">Cantidad Pedidos</th>
                                        <th style="text-align:center">Ganancia Repartidor</th>
                                        <th style="text-align:center">Ganancia Empresa</th>
                                        <th style="text-align:center">Ganancia Dueños</th>
                                        <th style="text-align:center">Total Ventas</th>
                                    </tr>`;
                        myResponseReports.innerHTML += `
                        <tr>
                            <td style="text-align:center">1</td>
                            <td style="text-align:center">${cantidadPedidos}</td>
                            <td style="text-align:center">$${ganancia_repartidor}</td>
                            <td style="text-align:center">$${ganancia_empresa}</td>
                            <td style="text-align:center">$${ganancia_duenios}</td>
                            <td style="text-align:center">$${total_ventas}</td>
                        <tr>`;
                    }else{
                        myResponseReports.innerHTML = notFoundItems();
                    }
                }else{
                    myResponseReports.innerHTML = notFoundItems();
                }
            }
        }
        ajax.send(form);
    } 
    tipo.addEventListener('change', (e) => {
        if(e.target.value !== ''){
            renderTableDataByFilter(e.target.value)
        }else{
            renderAllData();
        }
    });

    const notFoundItems = () => {
        return `<tr>
                    <td colspan="8" class="text-center py-4">
                        <div class="container_thumb_center d-flex justify-content-center mb-4">
                            <div class="thumb_lg">
                                <img src="assets/img/not_found.svg" alt="#Not Fount" class="img_thumb">
                            </div>
                        </div>
                        <span style="font-style:italic;">No existen aún pedidos que nos proporcionen reportes</span>
                    </td>
                </tr>`;
    }

    renderAllData();
});