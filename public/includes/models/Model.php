<?php

 abstract class Model {
  /* Property */
  protected $conn;

  /* Constructor */
  
  public function __construct ($db) {
    $this->conn = $db;
  }

  /* Basic querries */

  public abstract function all(); // SELECT *
  public abstract function find(); // SELECT by ID
  public abstract function count(); // SELECT count (*)
  public abstract function create(); // INSERT
  public abstract function delete(); // DELETE --soft
  public abstract function update(); // UPDATE
}