<?php

class PdfsController extends AppController {

    public $helpers = array('Html', 'Form','Data');
    public $components = array('Mpdf');

    public function testpdf($id = null) {

        $layout = $this->layout;
        $this->layout = 'pdf';

        $this->Mpdf->init();

        // can call any mPDF method via $this->Mpdf->pdf 

        $this->Mpdf->WriteHTML(utf8_encode(controller::render()));

        $this->Mpdf->Output();
        
    }

}

?> 