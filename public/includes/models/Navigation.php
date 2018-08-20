<?php 

class Navigation extends Model {

  /* Table name */
  private $table = 'link';

  /* Properties */
  public $id;
  public $link;

  /* Constructor */
  public function __construct($db) {
    parent::__construct($db);
  }

//#region Querries


  /*  Queries 
        1. SELECT
        2. INSERT
        3. UPDATE
        4. DELETE
  */

  /*---------------------
  1. SELECT querries
  ----------------------- 
  */

  /**
   * Get all links for navigation
   * 
     * @function {function name}
     * @param  {type}  {description}
     * @return {type} {description}
  */

  public function all () {
    $sql = "SELECT * FROM $this->table WHERE deleted = 0;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    // Checking for any result
    return ($stmt->rowCount() > 0) ? $result : false;
  }

  public function find () {
    $sql = "SELECT * FROM $this->table WHERE linkID = :id AND deleted = 0;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $this->id]);
    $result = $stmt->fetch();
    // Checking for any result
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
    $sql = "INSERT INTO $this->table VALUES ('',':name');";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['name' => $this->$link]); // params
    return ($stmt->rowCount() === 1) ? true: false;
  }

  public function update () {
    $sql = "UPDATE $this->table SET ? = ? WHERE linkID = :id;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $this->id]);
    return ($stmt->rowCount() === 1) ? true : false; 
  }

  public function delete () {
    $sql = "UPDATE $this->table SET deleted = 1 WHERE linkID = :id;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $this->id]);
    return ($stmt->rowCount() === 1) ? true : false;  
  }

//#endregion
}