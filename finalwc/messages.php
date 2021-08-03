<?php
    // Create Database connection
    session_start();
    require("header.php");

    if (isset($_SESSION['valid_user']))
        {
          echo '<p>You are logged in as '.$_SESSION['valid_user'].'</p>';
          echo '<a href="logout.php">Log out</a></p>';
          echo '<a href="admin-only.php">Go back to admin page</a></p>';

        @ $db = new mysqli('afuamensah.db.7456864.e36.hostedresource.net', 'afuamensah', 'Bison51#', 'afuamensah');
        if (!$db) {
            die('Could not connect to db: ' .mysql_error());
        }

        $query = "SELECT * from Contact";
        $result = $db->query($query);

        // Create SimpleXMLElement object
        $xml= new SimpleXMLElement('<xml/>');

        // Add each colum value a node of the XML object
        while($row=$result->fetch_assoc()) {
        $mydata = $xml->addChild('mydata');
        $mydata->addChild('ContactID',$row['ContactID']);
        $mydata->addChild('Name',$row['Name']);
        $mydata->addChild('Email',$row['Email']);
        $mydata->addChild('Comment',$row['Comment']);
        }

        $db->close();

        //Create the xml file
        @ $fp=fopen("messages.xml","ab");

        //Write the xml nodes
        fwrite($fp,$xml->asXML());

        //Close the database connection
        fclose($fp);
        echo '<p>File created.   <a href="messages.xml" target="_blank">View message file</a></p>';

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

