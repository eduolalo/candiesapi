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
    'index'
  ));
}

function index(){
  $candies = $this->Candy->find( 'all', array(
    'recursive' => -1,
  ) );
  $this->response( $candies );
}

}
