<?php
	require("header.php");
?>
		<main>
			<script src="contact.js"></script>
			<form name="contact_form" id="contact_form" action="addmessage.php" method="post">
			<h2>Contact Me</h2>
					<br>
					<br>
						<label for="fName">Name:</label>
						<input type="text" name="name" id="fName"><span id="required">*</span>
					<br>
					<br>
						<label for="email">E-mail Address:</label>
						<input type="email" name="email" id="email"><span id="required">*</span>
					<br>
					<br>
						<label for="comments">Comment</label>
						<textarea name="comments" id="comments" rows="15" cols="25" ></textarea><span id="required">*</span>
					<br>
					<br>
					<input id="submit_form" type="submit" value="Submit">
			</form>
		</main>
<?php
	require("footer.php");
?>