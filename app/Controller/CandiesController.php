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
    'index', 'candy', 'add'
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
    $this->response( array(
      'error' => 'data is empty.'
    ));
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

function add(){
  if ( empty($this->request->query) ) {
    $this->response( array(
      'error' => 'Not candy to save'
    ));
    return;
  }
  if ( $this->Candy->save( $this->request->query ) ) {
    $this->response( array(
      'ok' => 'Candy Saved!'
    ));
    return;
  } else {
    $this->response( array(
        'error' => $this->Candy->invalidFields()
    ));
    return;
  }
}

}
