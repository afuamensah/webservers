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

		echo '<form action="insert.php" method="post">
                <h2>Add Merch</h2>
                <label>Name: <input type="text" name="name" size="20"/></label>
                <label>Price: <input type="text" name="price" size="5"/></label>
                <label>Quantity: <input type="text" name="quantity" size="3"/></label>
                <input id="submit" type="submit" value="Add"/>
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