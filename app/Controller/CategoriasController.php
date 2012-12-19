<?php

App::uses('AppController', 'Controller');

/**
 * Categorias Controller
 *
 * @property Categoria $Categoria
 */
class CategoriasController extends AppController {

    public function index() {

        $this->set('categorias', $this->Categoria->read());
    }

}
