<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('add');
}

  public function login() {
    $this->response( $this->request );
  }

/**
 * index method
 *
 * @return void
 */
  public function index() {
    $this->User->recursive = 1;
    
    $this->response( $this );
  }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function view($id = null) {
    if (!$this->User->exists($id)) {
      throw new NotFoundException(__('Invalid user'));
    }
    $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
    $this->set('user', $this->User->find('first', $options));
  }

/**
 * add method
 *
 * @return void
 */
  public function add() {
    $request = $this->getData( $this->request );
    if ( empty($request) ) {
      $this->response( array() );
      return;
    }
    $error = false;
    foreach ($request as $key => $value) {
      if ( empty($value) ) {
        $error = array(
          'error' => array(
            $key => 'fill: ' . $key
          )
        );
        break;
      }
    }
    if ( $error ){
      $this->response( $error );
      return;
    }
    $this->request->data[ 'User' ][ 'password' ] = $request[ 'password' ];
    $this->request->data[ 'User' ][ 'email' ] = $request[ 'email' ];
    $this->request->data[ 'User' ][ 'user' ] = $request[ 'user' ];
    $this->request->data[ 'User' ][ 'name' ] = $request[ 'user' ];
    if ( $this->User->save( $this->request->data ) ) {
      $data = array(
        'id' => $this->User->id
      );
    } else {
      $data = array(
        'error' => $this->User->invalidFields()
      );
    }
    $this->response( $data );
    return;
  }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function edit($id = null) {
    if (!$this->User->exists($id)) {
      throw new NotFoundException(__('Invalid user'));
    }
    if ($this->request->is('post') || $this->request->is('put')) {
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash(__('The user has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
      $this->request->data = $this->User->find('first', $options);
    }
  }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function delete($id = null) {
    $this->User->id = $id;
    if (!$this->User->exists()) {
      throw new NotFoundException(__('Invalid user'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->User->delete()) {
      $this->Session->setFlash(__('User deleted'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Session->setFlash(__('User was not deleted'));
    $this->redirect(array('action' => 'index'));
  }
}
