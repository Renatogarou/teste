<?php

class PeriodosController extends AppController {

    public $helpers = array('Html', 'Form', 'Data');
    public $components = array('Session', 'DebugKit.Toolbar' => array(
            'panels' => array('timer' => false, 'autoRun' => true,)));

    public function add($id = null) {

        $this->set('interessado_id', $id);

        $this->loadModel('Interessado');

        $this->set('interessado', $this->Interessado->findById($id));

        //$this->set('interessado',$this->Interessado->);

        $this->set('periodos', $this->Periodo->find('all', array('conditions' => array('Periodo.Interessado_id' => $id),'order'=>'Periodo.inicio ASC')));

        if ($this->request->is('post')) {
           

            if ($this->Periodo->save($this->request->data)) {              
                
                $this->redirect(array('controller' => 'periodos', 'action' => 'add', $id));
            } else {
                $this->Session->setFlash('Não foi possível concluir o processo');
            }
        }
    }

    public function edit($id = null) {

        $this->Periodo->id = $id;

        if ($this->request->is('get')) {

            $this->request->data = $this->Periodo->read();
        } else {
            if ($this->Periodo->save($this->request->data)) {
                $this->Session->setFlash('A parada editou');
                $this->redirect(array('controller' => 'interessado', 'action' => 'index'));
            } else {
                $this->Session->setFlash('Não foi possível concluir o processo');
            }
        }
    }

    public function delete($id) {

        $id_interessado = $this->params['named']['id_interessado'];

        debug($this->params);
        
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException;
        }
        if ($this->Periodo->delete($id)) {
            $this->Session->setFlash('Registro deletado');
            
            $this->redirect(array('controller' => 'periodos', 'action' => 'add', $id_interessado));
        }
    }
    
   
}

?>
