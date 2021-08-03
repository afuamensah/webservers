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


    if (!isset($_POST['name']) || !isset($_POST['price']) || !isset($_POST['quantity'])) {
       echo "<p>You have not entered all the required details.<br />
             Please go back and try again.</p>";
       exit;
    }

    // create short variable names
    $name=$_POST['name'];
    $price=$_POST['price'];
    $price = doubleval($price);
    $quantity = $_POST['quantity'];

    include('dbconnect.php');

    $db = @new mysqli('afuamensah.db.7456864.e36.hostedresource.net', $db_username, $db_password, $db_name);

    if (mysqli_connect_errno()) {
       echo "<p>Error: Could not connect to database.<br/>
             Please try again later.</p>";
       exit;
    }

    $query = "INSERT INTO Merch_Inv VALUES (null, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('sdi', $name, $price, $quantity);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo  "<p>Merchandise inserted into the database.</p>";
    } else {
        echo "<p>An error has occurred.<br/>
              The item was not added.</p>";
    }
  
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