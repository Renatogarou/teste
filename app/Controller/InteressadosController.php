<?php

class InteressadosController extends AppController {

    public $helpers = array('Html', 'Form', 'Estados', 'Data');
    public $components = array('Session', 'Mpdf', 'Monetary', 'DebugKit.Toolbar' => array(
            'panels' => array('timer' => false, 'autoRun' => true,)));
    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'Interessado.nome' => 'desc'
        )
    );

    public function index() {

        $where = array();


        if (isset($this->request->query['interessado'])) {
            $interessado = $this->request->query['interessado'];

            if (is_numeric($interessado)) {
                $where = array('AND' => array('Interessado.matricula =' => "$interessado"));
            } else {
                $where = array('AND' => array('Interessado.nome LIKE' => trim($interessado) . "%"));
            }
        }

//        if (isset($this->request->query['instituidor'])) {
//            $instituidor = $this->request->query['instituidor'];
//            $where = array('AND' => array('Interessado.interessado_id =' => $instituidor));
//        }

        $data = $this->paginate('Interessado', $where);
        $this->set('interessados', $data);
    }

    public function findInstituidor($matricula = null) {
        $this->layout = null;
        $this->set('instituidor', $this->Interessado->find('first', array(
                    'conditions' => array('Interessado.matricula' => $matricula),
                    'fields' => array('Interessado.id', 'Interessado.nome')
                )));
    }

    public function add() {

        $this->set('situacoes', $this->Interessado->Situacao->find('list', array('fields' => array('Situacao.id', 'Situacao.situacao'))));
        $this->set('recursos', $this->Interessado->Recurso->find('list', array('fields' => array('Recurso.id', 'Recurso.Recurso'))));
//$this->set('teste',$this->Estado->select('teste'));

        $this->set('label', 'Interessado');

        if ($this->request->is('post')) {

            if ($this->Interessado->save($this->request->data)) {
                $this->Session->setFlash('Foi');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Deu ruim');
            }
        }
    }

    public function edit($id = null) {

        $this->Interessado->id = $id;

        $this->set('label', 'Editar Interessado');

        $this->set('situacoes', $this->Interessado->Situacao->find('list', array('fields' => array('Situacao.id', 'Situacao.situacao'))));
        $this->set('recursos', $this->Interessado->Recurso->find('list', array('fields' => array('Recurso.id', 'Recurso.Recurso'))));

        if ($this->request->is('get')) {

            $this->request->data = $this->Interessado->read();
        } else {
            if ($this->Interessado->save($this->request->data)) {
                $this->Session->setFlash('A parada editou');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Deu ruim em algum lugar ai');
            }
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException;
        }
        if ($this->Interessado->delete($id)) {
            $this->Session->setFlash('Registro deletado.');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function pdf($id = null) {


        if ($id == null) {
            $this->set('interessados', $this->Interessado->find('all'));
        } else {
            $this->set('interessado', $this->Interessado->findById($id));
        }

        $layout = $this->layout;
        $this->layout = null;

        $this->Mpdf->init();

        /* $this->Mpdf->SetHTMLHeader('            
          <div style="text-align: right;font-weight:bold;">
          Fls. N&ordm;_____________<br/>
          <span>Minist. Sa&uacute;de</span>
          </div>'); */

        $this->Mpdf->SetHTMLFooter('');

//$this->Mpdf->SetWatermarkText('CÓPIA');
        $this->Mpdf->showWatermarkText = true;
        $this->set('pdf', $this->Mpdf);

// can call any mPDF method via $this->Mpdf->pdf 

        $this->Mpdf->WriteHTML(utf8_encode(controller::render()));

        $this->Mpdf->Output();
    }

    public function declaracao($id = null) {


        if ($id == null) {
            $this->set('interessados', $this->Interessado->find('all'));
        } else {
            $this->set('interessado', $this->Interessado->findById($id));
        }

//        $interessado = $this->Interessado->read('id',$id);
//        $this->Interessado->set('recurso_id',3);
//        $this->Interessado->save();
//        
        @$this->Interessado->id = $id; // This avoids the query performed by read()
        @$this->Interessado->saveField('recurso_id', 2);


        $layout = $this->layout;
        $this->layout = null;

        $this->Mpdf->init();

        /* $this->Mpdf->SetHTMLHeader('            
          <div style="text-align: right;font-weight:bold;">
          Fls. N&ordm;_____________<br/>
          <span>Minist. Sa&uacute;de</span>
          </div>'); */

        $this->Mpdf->SetHTMLFooter('');

//$this->Mpdf->SetWatermarkText('CÓPIA');
        $this->Mpdf->showWatermarkText = true;
        $this->set('pdf', $this->Mpdf);

// can call any mPDF method via $this->Mpdf->pdf 

        $this->Mpdf->WriteHTML(utf8_encode(controller::render()));

        $this->Mpdf->Output();
    }

}

?>
