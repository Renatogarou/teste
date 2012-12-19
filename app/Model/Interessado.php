<?php

class Interessado extends AppModel {

    public $belongsTo = array('Situacao', 'Pensao','Recurso','Instituidor' => array('className' => 'Interessado',
            'foreignKey' => 'interessado_id',));
    
    public $hasMany = array(
        'Periodo' => array('order' => 'Periodo.inicio ASC'),
        'Beneficiario' => array('className' => 'Interessado',
            'foreignKey' => 'interessado_id',
            ));
    public $validate = array(
        'nome' => array(
            'rule' => 'notEmpty',
            'required' => true
        ),
        'matricula' => array(
            'numeric' => array(
                'rule' => 'numeric',),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Matrícula já cadastrada'
            ),
            ));

    
    function beforeSave($options) {

        $this->data['Interessado']['nome'] = mb_strtoupper($this->data['Interessado']['nome'], 'UTF-8');
        return true;
    }

    function afterFind($results, $primary = false) {
        foreach ($results as $key => $val) {
            if (isset($val['Interessado']['cep'])) {


                $results[$key]['Interessado']['cep'] = preg_replace('/[^0-9]/', '', $results[$key]['Interessado']['cep']);

                $cep = substr($results[$key]['Interessado']['cep'], 0, 5) . '-' . substr($results[$key]['Interessado']['cep'], 5, 7);
                
                $results[$key]['Interessado']['cep'] = $cep;
            };
        }
        return $results;
    }

}

?>
