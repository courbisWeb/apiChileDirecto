/*TRANSPORTISTA*/
SELECT CHILEDIRECTO.CREAR_USUARIO('111111111', 'TRANSPORTISTA', 'PRUEBA', 'PRUEBA','111111111', 'PRUEBA@GMAIL.COM',3,'PRUEBA') AS RETORNO;

/*PEDIDO*/
SELECT CHILEDIRECTO.CREAR_PEDIDO
(
'222222222'
,'CLIENTE'
,'PRUEBA'
,'PRUEBA'
,'222222222'
,'PRUEBACLIENTE@GMAIL.COM'
,1
,'ELICURA 6186'
,7
,23
,97
,'ÑUÑOA 4299'
,7
,23
,99
,'COSTO CENTRO'
,'09-09-2019'
,'10-09-2019'
,'11-09-2019'
,20000
) AS RETORNO;

/*REGIONES*/
CALL LISTAR_REGIONES();

/*PROVINCIAS*/
CALL LISTAR_PROVINCIAS(7);

/*COMUNAS*/
CALL LISTAR_COMUNAS(23);

/*PERSONA*/
CALL OBTENER_PERSONA(111111111);

/*ESTADOS*/
CALL EST_FILT_PEDIDO();

/*TRANSPORTISTAS*/
CALL LISTAR_TRANSPORTISTAS();