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
    'index', 'candy'
  ));
}

function index(){
  $candies = $this->Candy->find( 'all', array(
    'recursive' => -1,
  ) );
  $this->response( $candies );
}

function candy( $name ) {
  if( empty( $name ) ){
    $this->response( array() );
    return;
  }
  $candy = $this->Candy->find( 'first', array(
    'conditions' => array(
      'Candy.name' => $name
    ),
    'recursive' => -1,
  ));
  $this->response( $candy );
}

}
