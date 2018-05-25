<?php
  require_once "./include/functions/displayData.php";
  require_once "./include/functions/displayAdminData.php";
?>
<?php
  
  try {

      $dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

      if (isset ($_SESSION['query'])){
          $query = $_SESSION['query'];
      }else{
              $query = "SELECT * FROM products";
      }

      /*** The SQL SELECT statement ***/
      $email=$_SESSION['email'];
      $sql=$dbh->query("SELECT * FROM users WHERE email='$email'");
      $row1 = $sql->fetch();
      $result = $dbh->query($query);
        if($row1['type']=='admin'){
          echo "<a href='web_dev.php?content=items/createProductForm.php'>Create</a>";
          displayAdminData($result);
        }else{
          displayData($result);
        }
  

      /*** close the database connection ***/

      $dbh = null;

  }

  catch(PDOException $e){

    print $e->getMessage();
    die();
  }

?>
