
<?php
  session_start();
  // store to test if they *were* logged in
  $old_user = $_SESSION['valid_user'];
  unset($_SESSION['valid_user']);
  session_destroy();
?>
<?php
	require("header.php");
?>
<?php
  if (!empty($old_user))
  {
    echo '<p>You have been logged out.</p>';
  }
  else
  {
    // if they weren't logged in but came to this page somehow
    echo '<p>You were not logged in, and so have not been logged out.</p>';
  }
?>
<?php
	require("footer.php");
?>