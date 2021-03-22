<?php
include_once '../database/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//$consulta = "SELECT a.emp_rut,suc_id,bol_fecha,b.emp_nombre,emp_nro_sucursales,c.emp_nombre,boleta_activa FROM bol_consumo_folio a LEFT JOIN bol_empresa b USING(emp_rut) LEFT JOIN sys_empresa  c ON a.emp_rut=c.emp_rut WHERE bol_estado='PENDIENTE' ORDER BY bol_fecha";

$consulta = "SELECT * FROM gne_facturas";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
?>