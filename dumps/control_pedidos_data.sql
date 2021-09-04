/* ========================================
			PEDIDO COMPLEADO
===========================================*/
insert into control_pedidos
(producto, cliente, cod_empresa, 
fecha_envio, fecha_cancelacion, valor, 
valor_neto, ganancia_web, motivo_cancelacion, st_pedido, created_by)
values(1, 'Cesar', 1, '2021-09-03 10:00:30', null, 50,45,5, null, 'C', 1);
/* ========================================
			PEDIDOS CANCELADOS
===========================================*/
insert into control_pedidos
(producto, cliente, cod_empresa, 
fecha_envio, fecha_cancelacion, valor, 
valor_neto, ganancia_web, motivo_cancelacion, st_pedido, created_by)
values(2, 'Brigitte', 1, null, '2021-09-03 10:00:30', 100,90,10, 'Producto Defectuoso', 'X', 1);