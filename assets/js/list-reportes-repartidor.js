document.addEventListener('DOMContentLoaded', () => {
    const busqueda_filtro = document.getElementById('busqueda_filtro');
    const cabecera = document.getElementById('cabecera');
    const body_pedidos_control = document.getElementById('body_pedidos_control');
    const filtros = {
        "completados": {columnas: " p.fecha_envio as fecha_creacion "},
        "cancelados" : {columnas: " p.fecha_cancelacion as fecha_creacion,  p.motivo_cancelacion "}
    }
    
    const renderPedidosTipo = (filtro) => {
        const form = new FormData();
        const {columnas} = filtros[filtro]; 
        form.append("key", "list-pedidos-filter");
        form.append("filtro", columnas);
        form.append("cod_usuario", cod_usuario);
        form.append("tipo", filtro);
        const ajax = new XMLHttpRequest();
        ajax.open("POST", "endpoints/consumos-ajax-repartidor.php");
        // <th>Motivo Cancelacion</th>
        ajax.onreadystatechange = () => {
            if(ajax.status === 200 && ajax.readyState === 4){
                let header = "";
                let colspan = 0;
                let total = 0;
                if(filtro === "cancelados"){
                    header = "<th>Motivo Cancelacion</th> <th style='text-align:center'>Pérdidas</th>";
                    color = '#DC2E3F';
                    colspan = 6;
                }else{
                    header = "<th style='text-align:center'>Importe</th>";
                    color = '#288F5A';
                    colspan = 5;
                }
                cabecera.innerHTML = `
                    <tr>
                        <td style="width:100%;text-align:center" colspan=7><h3>Control ${filtro}</h3></td>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Nombre Producto</th>
                        <th>Cliente</th>
                        <th>Fecha Creacion</th>
                        <th>Precio</th>
                        ${header}
                    </tr>`;
                const response = JSON.parse(ajax.responseText);
                const {data, codigo} = response;
                if(codigo === 200){
                    body_pedidos_control.innerHTML = '';
                    data.forEach((pedido,index) => {
                        const {precio,ganancia_repartidor,cliente,fecha_creacion,nom_producto} = pedido;
                        const nueva_fecha = transformCreatedDate(fecha_creacion);
                        let tmp_motivo ='';
                        if(filtro === "cancelados"){
                            const {motivo_cancelacion} = pedido;
                            tmp_motivo = `<td>${motivo_cancelacion}</td>`;
                        }
                        body_pedidos_control.innerHTML += `<tr>
                                                                <td>${index+1}</td>
                                                                <td>${nom_producto}</td>
                                                                <td>${cliente}</td>
                                                                <td>${nueva_fecha}</td>
                                                                <td>$${precio}</td>
                                                                ${tmp_motivo}
                                                                <td style="text-align:center">$${ganancia_repartidor}</td>
                                                            </tr>`;
                        total += parseFloat(ganancia_repartidor);
                    });
                    body_pedidos_control.innerHTML += `<td colspan = ${colspan} style="background:#f2f2f2;text-align:center; font-weight:bold; color:#000">TOTAL</td>
                        <td style="background:${color};color:#fff;text-align:center;font-weight:bold">$${total.toFixed(2)}</td>`;
                }else{
                    body_pedidos_control.innerHTML = notFoundItems();
                }
            }
        }
        ajax.send(form);
    }
    const renderPedidos = () => {
        const form = new FormData();
        form.append("key", "list-pedidos");
        form.append("cod_usuario", cod_usuario);
        const ajax = new XMLHttpRequest();
        ajax.open("POST", "endpoints/consumos-ajax-repartidor.php");
        // <th>Motivo Cancelacion</th>
        ajax.onreadystatechange = () => {
            if(ajax.status === 200 && ajax.readyState === 4){
                cabecera.innerHTML = `
                    <tr>
                        <td style="width:100%;text-align:center" colspan=7><h3>Control General</h3></td>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Nombre Producto</th>
                        <th>Cliente</th>
                        <th>Estado</th>
                        <th>Fecha Creacion</th>
                        <th>Precio</th>
                        <th>Empresa%</th>
                    </tr>`;
                const response = JSON.parse(ajax.responseText);
                const {data, codigo} = response;
                if(codigo === 200){
                    body_pedidos_control.innerHTML = '';
                    data.forEach((pedido,index) => {
                        const {precio,ganancia_repartidor,cliente,fecha_creacion,nom_producto,estado,color_estado} = pedido;
                        const nueva_fecha = transformCreatedDate(fecha_creacion);
                        body_pedidos_control.innerHTML += `<tr>
                                                                <td>${index+1}</td>
                                                                <td>${nom_producto}</td>
                                                                <td>${cliente}</td>
                                                                <td><span class="badge badge-${color_estado}">${estado}</span></td>
                                                                <td>${nueva_fecha}</td>
                                                                <td>${precio}</td>
                                                                <td>${ganancia_repartidor}</td>
                                                            </tr>`;
                    });
                }else{
                    body_pedidos_control.innerHTML = notFoundItems();
                }
            }
        }
        ajax.send(form);
    }
    busqueda_filtro.addEventListener('change', (e) => {
        console.log(e.target.value);
        if(e.target.value === ''){
            renderPedidos();
        }else{
            renderPedidosTipo(e.target.value);
        }
    })

    const notFoundItems = () => {
        return `<tr>
                    <td colspan="8" class="text-center py-4">
                        <div class="container_thumb_center d-flex justify-content-center mb-4">
                            <div class="thumb_lg">
                                <img src="assets/img/not_found.svg" alt="#Not Fount" class="img_thumb">
                            </div>
                        </div>
                        <span style="font-style:italic;">No existen aún pedidos para visualizar</span>
                    </td>
                </tr>`;
    }
    const transformCreatedDate = (fecha) =>{
        const array_month = ["Enero", "Febrero", "Marzo","Abril","Mayo","Junio", "Julio", "Agosto", "Septiembre", "Octubre" , "Noviembre", "Diciembre"];
        let newFecha = fecha.split(" ")[0];
        newFecha = newFecha.split("-")[2]+"/"+array_month[fecha.split("-")[1] -1]+"/"+newFecha.split("-")[0];
        return newFecha;
    }
    renderPedidos();
});