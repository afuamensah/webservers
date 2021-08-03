<?php
    require('header.php');
?>

<?php

    if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['comments'])) {
       echo "<p>You have not entered all the required details.<br />
             Please go back and try again.</p>";
       exit;
    }

    // create short variable names
    $name=$_POST['name'];
    $email=$_POST['email'];
    $comments = $_POST['comments'];

    include('dbconnect.php');

    $db = @new mysqli($db_server, $db_username, $db_password, $db_name);

    if (mysqli_connect_errno()) {
       echo "<p>Error: Could not connect to database.<br/>
             Please try again later.</p>";
       exit;
    }

    $query = "INSERT INTO Contact VALUES (null, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('sss', $name, $email, $comments);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo  "<p>Message sent.</p>";
    } else {
        echo "<p>An error has occurred.<br/>
              The message was not sent.</p>";
    }
  
    $db->close();
  ?>
<?php
    require('footer.php');
?>