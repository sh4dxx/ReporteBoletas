<?php

require_once('../database/connection.php');

class Voucher extends Connection{     

    private $connection;

    public function getVoucherReport($from, $to)
    {
        
        $connection = $this->connect();

        $query = " SELECT 
        a.bol_fecha, suc_id, a.id As id_boleta ,bol_estado
        FROM bol_consumo_folio a 
        LEFT JOIN bol_empresa b USING(emp_rut) 
        LEFT JOIN sys_empresa c ON a.emp_rut=c.emp_rut 
        WHERE a.bol_fecha  BETWEEN '". $from ."' AND '". $to ."'
        AND a.emp_rut = '76427624-8'";

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