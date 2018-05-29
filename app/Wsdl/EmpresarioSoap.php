<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 5/28/18
 * Time: 10:47 PM
 */

namespace App\Wsdl;

trait EmpresarioSoap
{
    protected static $wsld = "http://10.1.10.84:8080/wsa/wsa1/wsdl?targetURI=WSShopping_mxqa";
    protected $cliente;

    public function init(){
        $this->cliente = new \SoapClient(self::$wsld);
    }

    public function consultaEmpresario($id_empresario){
        $this->init();
        $xml = "<xmlinput><process>WSDatosPersonales.r</process><parameters><IdEmpresario>$id_empresario</IdEmpresario></parameters></xmlinput>" ;
        $xml = new \SimpleXMLElement($xml);
        return $this->cliente->__soapCall('ejecuta_proceso', array('xmlINPUT' => $xml));
    }
}