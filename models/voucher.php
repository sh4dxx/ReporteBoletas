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

    public function getUrlResponse()
    {
        $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        $components = parse_url($url);
        parse_str($components['query'], $results);

        return $results;
    }
}

$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$components = parse_url($url);
parse_str($components['query'], $results);
//print_r($results);
//$url_response = getUrlResponse();
//print_r($url_response)

$date_range = explode("to", $results['daterange']);
$from = $date_range[0];
$to = $date_range[1];
//print_r( $from);
//print_r( $to);
//print_r( $form . " a rango ".  $to);


//print_r($results['daterange']);


$voucher = new Voucher();
$voucher->getVoucherReport($from, $to);