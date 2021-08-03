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


    if (!isset($_POST['name'])) {
        echo "<p>You have not entered a name.<br />
            Please go back and try again.</p>";
        exit;
    }

    // create short variable names
    $name=$_POST['name'];

    include('dbconnect.php');

    $db = @new mysqli($db_server, $db_username, $db_password, $db_name);

    if (mysqli_connect_errno()) {
        echo "<p>Error: Could not connect to database.<br/>
            Please try again later.</p>";
        exit;
    }

    $query = "DELETE FROM Merch_Inv WHERE Name = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $name);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo  "<p>Magazine deleted.</p>";
    } else {
        echo "<p>An error has occurred.<br/>
            The item was not deleted.</p>";
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