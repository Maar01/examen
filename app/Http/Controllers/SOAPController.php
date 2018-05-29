<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;

class SOAPController extends Controller
{
    private static $url_weather = ' http://www.thomas-bayer.com/axis2/services/BLZService?wsdl';

    public function index(){
        //phpinfo();
        $opts = array(
            'ssl' => array(
                'ciphers' => 'RC4-SHA',
                'verify_peer' => false,
                'verify_peer_name' => false
            )
        );
        // SOAP 1.2 client

        $params = array(
            'encoding' => 'UTF-8',
            'verifypeer' => false,
            'verifyhost' => false,
            'soap_version' => SOAP_1_2,
            'trace' => 1,
            'exceptions' => 1,
            'connection_timeout' => 180,
            'stream_context' => stream_context_create($opts)
        );

        $cliente_soap = new SoapClient(self::$url_weather, $params);
        dd($cliente_soap->__getTypes()); $cliente_soap->__soapCall('unafuncion');
    }
}
