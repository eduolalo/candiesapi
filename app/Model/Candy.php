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
        'message' => 'This URL is already taken',
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
