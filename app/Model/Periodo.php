<?php

class Periodo extends AppModel {

    public $belongsTo = 'Interessado';

    
     function beforeSave($options) {      
         
        if($this->passaPorNovembro($this->data['Periodo']['inicio'],$this->data['Periodo']['fim'])){
        
            $this->data['Periodo']['decimoTerceiro'] = "1";
                                    
            $this->data['Periodo']['meses']++;
            
            $this->data['Periodo']['diferenca'];
                    
            $this->data['Periodo']['restituicao'] = number_format(
                    str_replace(',', '.', $this->data['Periodo']['diferenca']) * $this->data['Periodo']['meses'],2,',','.');
            
            var_dump($this->data['Periodo']);
            
            
        }
        
    }
    

    protected function passaPorNovembro($di,$df){
        
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
    
    
}

?>
