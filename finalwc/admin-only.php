<?php
  session_start();
  require('header.php');
?>
<?php
  // check session variable
  if (isset($_SESSION['valid_user']))
  {
    echo '<p>You are logged in as '.$_SESSION['valid_user'].'</p>';
    echo '<a href="logout.php">Log out</a></p>';
    echo "<main>
    <ul>
        <li><a href=\"search.php\">Search Merchandise</a></li>
        <li><a href=\"addmerch.php\">Add Merchandise</a></li>
        <li><a href=\"price.php\">Change Price of Merch</a></li>
        <li><a href=\"deletemerch.php\">Delete Merchandise</a></li>
        <li><a href=\"messages.php\">Create XML File of Messages</a></li>
    </ul>
</main>";
  }
  else
  {
    echo '<p>You are not logged in.</p>';
    echo '<p>Only logged in members may see this page.</p>';
  }
?>
<?php
	require("footer.php");
?>
