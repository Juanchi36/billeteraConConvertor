<?php

class ApiDolar
{
    

    public function dameDolar()
    {
    $data_in = "http://ws.geeklab.com.ar/dolar/get-dolar-json.php";
    $data_json = @file_get_contents($data_in);
        if(strlen($data_json)>0)
        {
        $data_out = json_decode($data_json,true);
        return $data_out['libre'];
        }
    }
}



