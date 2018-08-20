<?php

class Role extends Model {

  /* Table name */
  private $table = 'role';
  
  /* Properties */
  public $id;
  public $role;

  /* Constructor */

  public function __construct ($db) {
    parent::__constuct($db);
  }
}