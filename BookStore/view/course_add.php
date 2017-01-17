<!-- This is the course add form, intended for admins?

-->

<?php include ('header.php'); ?>
<main>
        <div class="w3-container w3-card-4 w3-border" style="width:50%; margin: auto; margin-top: 20px;">
        <header class="w3-center">
	<h1>Add Course</h1>
        </header>

	<!--This form posts form data to the index, with the action equal to the hidden value
	-->
	<form action="index.php" method="post" id="add_course_form">
	<input type="hidden" name="action" value="add_course">

		<label>User ID:</label>
		<select class="w3-input w3-border" name="user_id">
			<?php foreach ($users as $u) : ?>
				<option value="<?php echo $u[userID]; ?>">
					<?php echo $u[userID]; ?>
				</option>
			<?php endforeach; ?>
		</select><br>

		<label>Instructor:</label>
		<input class="w3-input w3-border" type="text" name="course_instructor"><br>

		<label>Course Name:</label>
		<input class="w3-input w3-border" type="text" name="course_name"><br>

		<label>Course Code:</label>
		<input class="w3-input w3-border" type="text" name="course_code"><br>

		<label>Semester:</label>
		<input class="w3-input w3-border" type="text" name="course_semester"><br>

		<label>Start Date:</label>
		<input class="w3-input w3-border" type="text" name="course_start_date"><br>

		<label>&nbsp;</label>
		<input type="submit" class="w3-btn w3-grey" value="Add Course"><br>

	</form>

	<p class="last_paragraph">
		<a href="?action=list_courses">View Course List</a>
	</p>
        </div>

</main>
<?php include ('footer.php');