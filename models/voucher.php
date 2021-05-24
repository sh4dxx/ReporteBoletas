<?php

require_once('../database/connection.php');

class Voucher extends Connection{     

    private $connection;

    public function getVoucherReport($from, $to)
    {
        
        $connection = $this->connect();

        $query = "SELECT 
        a.emp_rut,
        a.bol_fecha,
        b.emp_nombre,
        COUNT(a.id) AS bol_cantidad,
        bol_estado
        FROM bol_consumo_folio a 
        LEFT JOIN bol_empresa b USING(emp_rut) 
        LEFT JOIN sys_empresa  c ON a.emp_rut=c.emp_rut
        WHERE bol_estado ='PENDIENTE'
        AND a.bol_fecha <= '". $from ."'
        AND a.bol_fecha >= '". $to   ."'
        GROUP BY a.emp_rut, bol_fecha, bol_estado";   

        $result = $connection->prepare($query);
        $result->execute();
        $data= $result->fetchAll(PDO::FETCH_ASSOC);
        $data = json_encode($data, true);
        print_r($data);   
    }
}

$voucher = new Voucher();

$from = $_GET['from'];
$to = $_GET['to'];
//print_r($from); 
//print_r($to); 
//print_r($from .' - ' . $to); 
$voucher->getVoucherReport($from, $to);