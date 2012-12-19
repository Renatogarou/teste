<?php
App::uses('AppModel', 'Model');
/**
 * Categoria Model
 *
 */
class Categoria extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'categoria';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'categoria' => array(
			'q' => array(
				'rule' => array('q'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descricao' => array(
			'q' => array(
				'rule' => array('q'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
