<?php
	require("header.php");
?>
        <h2 class="tips">Tips</h2>
        <main id="faq">
			<script src="tips.js"></script>
			<h3>To-do List for your pet</h3>
			
			<div id="list">
				<label for="todo_list">To-do List</label><br>
				<textarea id="todo_list" rows="8" cols="50"></textarea>
			</div>
			<label for="task">Task</label><br>
			<input type="text" name="task" id="task"><br>
			<input type="button" name="add_task" id="add_task" value="Add Task">
			<input type="button" name="delete_task" id="delete_task" value="Delete Task">
			<input type="button" name="clear_list" id="clear_list" value="Clear List">
        </main>
<?php
	require("header.php");
?>