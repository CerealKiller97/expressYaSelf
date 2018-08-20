<?php

class MetaTag extends Model {

  /* Table name */
  private $table = 'meta';

  /* Properties */
  public $id;
  public $name;
  public $description;
  public $keywords;

  /* Constructor */
  public function __construct($db) {
    parent::__construct($db);
  }

  /* Querries */
  
  public function all () {
    $sql = "SELECT * FROM $this->table WHERE deleted = 0;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(); // try/catch ?
    $result = $stmt->fetchAll();
    // Checking for results
    return ($stmt->rowCount() > 0) ? $result : false;
  }

  public function find () {
    $sql = "SELECT * FROM $this->table WHERE page = :page AND deleted = 0;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['page' => $this->name]); // try/catch ?
    $result = $stmt->fetch();
    // Checking for results
    return ($stmt->rowCount() === 1) ? $result : false;
  }

  public function count () {
    $sql = "SELECT COUNT(*) FROM $this->table;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    // Checking for results
    return ($stmt->rowCount() === 1) ? $result : false;
  }

  public function create () {
    $sql = "INSERT INTO $this->table VALUES (0, 2);";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([]); // params
    return ($stmt->rowCount() === 1) ? true: false;
  }

  public function update () {
    $sql = "UPDATE $this->table SET ? = ? WHERE metaID = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' =>$this->id]);
    return ($stmt->rowCount() === 1)? true : false;
  }

  public function delete () {
    $sql = "UPDATE $this->table SET deleted = 1 WHERE metaID = :id;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $this->id]);
    return ($stmt->rowCount() === 1) ? true : false;  
  }
}