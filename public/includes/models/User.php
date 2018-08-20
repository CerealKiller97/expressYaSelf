<?php
  
class User extends Model { // da polja budu private a getter-setter ?
  
  /* Table name */
  
  private $table = 'user';
  
  /* Properties */

  public $id;
  public $firstName;
  public $lastName;
  public $username;
  public $email;
  public $password;
  public $avatar;
  public $token;
  public $active;
  public $deleted;
  public $memberSince;
  public $lastOnline;

  /* Constructor */

  public function __construct($db) {
    parent::__construct($db);
  }

  /* Querries */

  /*********** 
   * SELECT 
   **********/

  public function all () {
    $sql = "SELECT * 
            FROM $this->table u 
            INNER JOIN role r
            ON u.roleID = r.roleID
            WHERE deleted = 0;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetchAll();
    // Check if there is only one user
    return ($stmt->rowCount() > 0) ? $user : false;
  }

  public function find () {
   $sql = "SELECT * 
            FROM $this->table u 
            INNER JOIN role r
            ON u.roleID = r.roleID
            WHERE userID = :id AND deleted = 0;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $this->id]);
    $user = $stmt->fetch();
    // Check if there is only one user
    return ($stmt->rowCount() === 1) ? $user : false;
  }

  public function count () {
    $sql = "SELECT COUNT(*) AS allUsers FROM $this->table;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    // Checking for results
    return ($stmt->rowCount() === 1) ? $result : false;
  }

  /**
   * Register an user
   * 
   * @function create
   * @return boolean
   * 
   */

  public function create () {
    $sql = "INSERT INTO $this->table VALUES ('', :firstName, :lastName, :username, :email, :pass, :token,:member, ':lastOnline', 2);";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
      'firstName'  => $this->firstName,
      'lastName'   => $this->lastName,
      'username'   => $this->username,
      'email'      => $this->email,
      'pass'       => $this->password,
      'token'      => $this->token,
      'member'     => $this->memberSince,
      'lastOnline' => $this->lastOnline,
    ]); 
    return ($stmt->rowCount() === 1) ? true: false;
  }

  public function update () {
    $sql = "UPDATE $this->table SET ? = ? WHERE userID = :id;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $this->id]);
    return ($stmt->rowCount() === 1) ? true : false;
  }

  public function delete () {
    $sql = "UPDATE $this->table SET deleted = 1 WHERE userID = :id;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id' => $this->id]);
    return ($stmt->rowCount() === 1) ? true : false;  
  }

  /* Specific querries */
  
  public function login () {
    $sql = "SELECT * 
            FROM $this->table u
            INNER JOIN role r
            ON u.roleID = r.roleID
            WHERE email = :email AND password = :pass AND active = 1;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
      'email' => $this->email,
      'pass' => $this->password
    ]);
    $user = $stmt->fetch();
    // Return user is there is only one
    return (($stmt->rowCount() === 1) && password_verify($this->password, $hashedPwd)) ? $user : false;
  }

  function fetchHashPass () {
    $sql = "SELECT * FROM $this->table WHERE email = :email AND deleted = 0;";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['email' => $this->email]);
    $row = $stmt->fetch();
    // Return hashed password from user to compare (verify) them
    return $row->password;  
  }

}