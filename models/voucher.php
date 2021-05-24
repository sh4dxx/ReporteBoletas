<?php

require_once('../database/connection.php');

class Voucher extends Connection{     

    private $connection;

    /**
     * Obtiene array de respuesta
     */
    public function getUrlResponse()
    {
        $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        $components = parse_url($url);
        parse_str($components['query'], $results);
        return $results;
    }

    /**
     * Realiza consulta de Boletas
     */
    public function getVoucherReport($rut, $from, $to, $status)
    {
        
        $connection = $this->connect();

        $filter = "";
        if ($status == 1) {$filter = "AND bol_estado ='ENVIADO'";}
        if ($status == 2) {$filter = "AND bol_estado ='PENDIENTE'";}

        $query = " SELECT 
        a.bol_fecha, suc_id, a.id As id_boleta ,bol_estado
        FROM bol_consumo_folio a 
        LEFT JOIN bol_empresa b USING(emp_rut) 
        LEFT JOIN sys_empresa c ON a.emp_rut=c.emp_rut 
        WHERE a.bol_fecha  BETWEEN '". $from ."' AND '". $to ."'
        AND a.emp_rut = '". $rut ."' ". $filter .";";

        $result = $connection->prepare($query);
        $result->execute();
        $data= $result->fetchAll(PDO::FETCH_ASSOC);
        $data = json_encode($data, true);
        //print_r($data. ' '. $query);
        print_r($data);
    }

    /**
     * Validaciones de datos
     */
    public function getQueryValidations($url_response)
    {   

        $validation = false;
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
        {
            //Verifica existencia de indices
            if ((isset($url_response['daterange'])) && (isset($url_response['rut'])) && (isset($url_response['status'])) ) {
                
                $validation = true;
            }
        }
        return $validation;
    }
}


//Instancia
$voucher = new Voucher();

//Obtiene valores AJAX
$url_response = $voucher->getUrlResponse();

//Validaciones
$validations = $voucher->getQueryValidations($url_response);
if (!$validations) {
    print_r([]);
    return true;
}

//Datos
$date_range = explode("to", $url_response['daterange']);
$from = $date_range[0];
$to = $date_range[1];
$business_rut = $url_response['rut'];
$status = $url_response['status'];

//Consulta
$voucher->getVoucherReport($business_rut, $from, $to, $status);