<?php
App::uses('AppModel', 'Model');
/**
 * Candy Model
 *
 * @property User $User
 */
class Candy extends AppModel {

/**
 * Display field
 *
 * @var string
 */
  public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
  public $validate = array(
    'name' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        'message' => 'Fill',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
      'isUnique' => array(
        'rule' => 'isUnique',
        'message' => 'This Name is already taken',
      ),
    ),
    'url' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        'message' => 'Fill',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
      'isUnique' => array(
        'rule' => 'isUnique',
        'message' => 'This repo is already registered',
      ),
      'website' => array(
        'rule' => 'ValidURL',
        'message' => 'Insert a valir url format: http or https'
      ),
      'Exist' => array(
        'rule' => 'existURL',
        'message' => 'This URL does not exist.'
      ),
    ),
    'description' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        'message' => 'Fill',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'version' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        'message' => 'Fill',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
  );

public function ValidURL() {
  $url = $this->data['Candy']['url'];
  if (filter_var($url, FILTER_VALIDATE_URL)){
    return true;
  }
  return false;
}

public function existURL() {
  $url = $this->data['Candy']['url'];
  if (filter_var($url, FILTER_VALIDATE_URL)){
    $getUrl = curl_init($url);
    curl_setopt($getUrl,  CURLOPT_RETURNTRANSFER, TRUE);
    curl_exec($getUrl);
    $httpCode = curl_getinfo($getUrl, CURLINFO_HTTP_CODE);
    if($httpCode == 404 || $httpCode == 401 || $httpCode == 400 || $httpCode == 403 || $httpCode == 500) {
      return false;    
    }
    return true;
  }
  return false;
}

  //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
  public $belongsTo = array(
    'User' => array(
      'className' => 'User',
      'foreignKey' => 'user_id',
      'conditions' => '',
      'fields' => '',
      'order' => ''
    )
  );
}
