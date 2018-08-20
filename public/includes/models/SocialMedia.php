<?php 

class SocialMedia extends Model {

  /* Table name */
  private $table = 'socialmedia';

  /* Properties */

  public $id;
  public $name;
  public $icon;
  public $url;

  /* Constructor */

  public function __construct($db) {
    parent::__construct($db);
  }

  /* Querries */

  /**
   * 
   * Get all social media infos
   * 
   * @param none
   * @return arr[obj]||false
  */

  public function all () {
    $sql = "SELECT * FROM $this->table WHERE deleted = 0;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    // Checking for some results
    return ($stmt->rowCount() > 0) ? $result : false;
  }

  public function find () {
    $sql = "SELECT * FROM $this->table WHERE social-mediaID = :id AND deleted = 0;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $this->id]);
    $result = $stmt->fetch();
    // Checking for some results
    return ($stmt->rowCount() === 1) ? $result : false;
  }

  public function count () {
    $sql = "SELECT COUNT(*) AS count FROM $this->table;";
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
    $sql = "UPDATE $this->table SET active = 1 WHERE token = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$token]);
    return ($stmt->rowCount() === 1)? true : false;
  }

  public function delete () {
    $sql = "UPDATE $this->table SET deleted = 1 WHERE social-mediaID = :id;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $this->id]);
    return ($stmt->rowCount() === 1) ? true : false;  
  }

}