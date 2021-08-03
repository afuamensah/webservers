<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password']))
{
  // if the user has just tried to log in
  $username = $_POST['username'];
  $password = $_POST['password'];

  $db_conn = new mysqli('afuamensah.db.7456864.e36.hostedresource.net', 'afuamensah', 'Bison51#', 'afuamensah');

  if (mysqli_connect_errno()) {
    echo 'Connection to database failed:'.mysqli_connect_error();
    exit();
  }
  $password = sha1($password);

  $query = "SELECT * from Admins where 
            Username = '$username' and 
            Password = '$password'";

  $result = $db_conn->query($query);
  if ($result->num_rows)
  {
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $username;
  }
  $db_conn->close();
}
require('header.php');
?>
<?php
  if (isset($_SESSION['valid_user']))
  {
    echo '<p>You are logged in as: '.$_SESSION['valid_user'].' <br />';
    echo '<a href="logout.php">Log out</a></p>';
    echo '<p><a href="admin-only.php">Change Database</a></p>';
  }
  else
  {
    if (isset($username))
    {
      // if they've tried and failed to log in
      echo '<p>Could not log you in.</p>';
    }
    else
    {
      // they have not tried to log in yet or have logged out
      echo '<p>You are not logged in.</p>';
    }

    // provide form to log in
    echo '<br/>';
    echo '<form action="admin.php" method="post">';
    echo '<h1>Please Log In</h1>';
    echo '<p><label for="username">Username:</label>';
    echo '<input type="text" name="username" id="username" size="30"/></p>';
    echo '<p><label for="password">Password:</label>';
    echo '<input type="password" name="password" id="password" size="30"/></p>'; 
    echo '<input type="submit" name="login" value="Login">';
    echo '</form>';

  }
?>
<?php
	require("footer.php");
?>