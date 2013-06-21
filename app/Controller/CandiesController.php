<?php
App::uses('AppController', 'Controller');
/**
 * Candies Controller
 *
 */
class CandiesController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
  public $scaffold;

public function beforeFilter() {
  parent::beforeFilter();
  $this->Auth->allow( array(
    'index', 'get'
  ));
}

function index(){
  $candies = $this->Candy->find( 'all', array(
    'recursive' => -1,
  ) );
  $this->response( $candies );
}

function get( $name ) {
  if( empty( $name ) || !is_string($name)){
    $this->response( array(
      'error' => 'data is empty or is not string.'
    ));
    return;
  }
  $candy = $this->Candy->find( 'first', array(
    'conditions' => array(
      'Candy.name' => $name
    ),
    'recursive' => -1
  ));
  $this->response( $candy );
}

}
