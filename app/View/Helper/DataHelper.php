<?php

App::uses('AppHelper', 'View/Helper');

class DataHelper extends AppHelper {

    public $lista_meses = array(
        1 => 'janeiro',
        2 => 'fevereiro',
        3 => 'março',
        4 => 'abril',
        5 => 'maio',
        6 => 'junho',
        7 => 'julho',
        8 => 'agosto',
        9 => 'setembro',
        10 => 'outubro',
        11 => 'novembro',
        12 => 'dezembro');

    public function mesAno($data = null) {

        if ($data != NULL) {

            list($a, $m, $d) = explode('-', $data);

            $m = (int) $m;

            return $this->lista_meses[$m] . '/' . $a;
        }
    }

    public function extrairMes($data){
        
        list($a,$m,$d) = explode('-',$data);
        
        return (int) $m;
        
    } 
    
    
    public function passaPorNovembro($di,$df){
        
        list($ai,$mi,$di) = explode('-',$di);
        
        list($af,$mf,$df) = explode('-',$df);
        
        if($af > $ai){
            
            $mf = (int)  $mf +12;
           
        }
                        
        if($mi == 12 && $mf < 23 ){
            
            return false;
        }
        
        if($mf >= 11) {
            
            return true;
        }
        
        
        
    }
    
    public function mes($mes = null) {

        $mes = (int) $mes;

        if ($mes != NULL) {

            return $this->lista_meses[$mes];
        }
    }

}
