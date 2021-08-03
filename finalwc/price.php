<?php
    session_start();
    require('header.php');
?>
		<main>
        <?php
        if (isset($_SESSION['valid_user']))
        {
          echo '<p>You are logged in as '.$_SESSION['valid_user'].'</p>';
          echo '<a href="logout.php">Log out</a></p>';
          echo '<a href="admin-only.php">Go back to admin page</a></p>';
        
		  echo	'<form action="update.php" method="post">
                <h2>Update Merch Price</h2>
                <label>Inventory Name: <input type="text" name="name" size="20"/></label>
                <label>New Price: <input type="text" name="price" size="5"/></label>
                <input id="submit" type="submit" value="Update"/>
            </form>';
        }
        else
        {
            echo '<p>You are not logged in.</p>';
            echo '<p>Only logged in members may see this page.</p>';
        }
        ?>
		</main>
<?php
	require('footer.php');
?>