<?php
  session_start();
    require('header.php');
?>

<?php

if (isset($_SESSION['valid_user']))
{
  echo '<p>You are logged in as '.$_SESSION['valid_user'].'</p>';
  echo '<a href="logout.php">Log out</a></p>';
  echo '<a href="admin-only.php">Go back to admin page</a></p>';


    $searchterm=$_POST['search'];

    if (!$searchterm) {
        echo '<p>You have not entered search details.<br/>
        Please go back and try again.</p>';
        exit;
     }

     include('dbconnect.php');

     $db = @new mysqli($db_server, $db_username, $db_password, $db_name);

    if (mysqli_connect_errno()) {
       echo "<p>Error: Could not connect to database.<br/>
             Please try again later.</p>";
       exit;
    }

    $query = "SELECT Name, Price, Quantity FROM Merch_Inv WHERE Name = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $searchterm);  
    $stmt->execute();
    $stmt->store_result();
  
    $stmt->bind_result($name, $price, $quantity);

    echo "<p>Number of results found: ".$stmt->num_rows."</p>";

    while($stmt->fetch()) {
      echo "<p><strong>Title: ".$name."</strong>";
      echo "<br />Price: \$".number_format($price,2)."<br/>";
      echo "Quantity: ".$quantity."</p>";
    }

    $stmt->free_result();
    $db->close();
}
else
  {
    echo '<p>You are not logged in.</p>';
    echo '<p>Only logged in members may see this page.</p>';
  }

  ?>
<?php
    require('footer.php');
?>