<?php
class UserDAO {
  function getUser($user){
    require_once('./utilities/connection.php');
    
    $sql = "SELECT first_name, last_name, username, user_id FROM user WHERE user_id =" . $user->getUserId();
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user->setFirstName($row["first_name"]);
        $user->setLastName($row["last_name"]);
        $user->setUsername($row["username"]);
    }
    } else {
        echo "0 results";
    }
    $conn->close();
  }

  function checkLogin($passedinusername, $passedinpassword){
    require 'setenv.php';

$SERVER_NAME = 'cs3620-team4finalproject.mysql.database.azure.com';
$DATABASE_USER = $_SESSION['SQLUSER'];
$DATABASE_PASS = $_SESSION['SQLPW'];
$DATABASE_NAME = 'team4project';

$conn = mysqli_connect($SERVER_NAME, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    $hashedPassword = hash("sha256", $passedinpassword);
    $user_id = 0;
    //echo "username: " . $passedinusername . " password: " .$hashedPassword;
    
    $sql = "SELECT user_id FROM team4project.user WHERE username ='" . $passedinusername . "' AND password ='" . $hashedPassword . "'";
    //echo " sql Statement: " . $sql;

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
      while($row = $result->fetch_assoc()) {
        $user_id = $row["user_id"];
      }
    }
    else {
        echo "0 results";
    }
    $conn->close();
    return $user_id;
  }

  function createUser($user){
    require_once('./utilities/connection.php');

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO team4project.user (`username`,
    `password`,
    `first_name`,
    `last_name`) VALUES (?, ?, ?, ?)");

    $un = $user->getUsername();
    $pw = $user->getPassword();
    $fn = $user->getFirstName();
    $ln = $user->getLastName();

    $stmt->bind_param("ssss", $un, $pw, $fn, $ln);
    $stmt->execute();
   
    $stmt->close();
    $conn->close();
    echo "User Created";
  }

  function deleteUser($un){
    require_once('./utilities/connection.php');
    
    $sql = "DELETE FROM team4project.user WHERE username = '" . $un . "';";
    
    echo $sql;
    $result = $conn->query($sql);

    $conn->close();
    echo "User Deleted";
  }

  
}
?>