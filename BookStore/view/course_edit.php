
<!--
This is the course_edit form, intended for admins?.
-->

<?php include 'header.php' ?>
<main>
        <div class="w3-container w3-card-4 w3-border" style="width:50%; margin: auto; margin-top: 20px;">
        <header class="w3-center">
	<h1>Edit Course</h1>
        </header>

	
	<!-- this form sends the hidden "action" to index, as well as field data -->
	<form action="index.php" method="post" id="edit_course_form">
	<input type="hidden" name="action" value="edit_course">

	<!-- This primary key is disabled, so send the value by hidden -->
		<label>Course ID</label>
		<input type="text" name="course_id" disabled
			class="w3-input w3-border" value="<?php echo $course[courseID]; ?>"><br>
                        
		<input type="hidden" name="course_id" value="<?php echo $course[courseID]; ?>">

	<!-- Drop down list to choose user id -->
		<label>User ID:</label>
		<select name="user_id" class="w3-input w3-border">
			<?php foreach ($users as $u) : ?>
		<!--trying to set default -->
				<option <?php if ($u[userID] == $course[userID]) { echo 'selected';} ?>
					value="<?php echo $u[userID]; ?>">
					<?php echo $u[userID]; ?>
				</option>
			<?php endforeach; ?>
		</select><br>

		<label>Instructor:</label>
		<input type="text" class="w3-input w3-border" name="course_instructor"
			value="<?php echo $course[instructor]; ?>"><br>

		<label>Course Name:</label>
		<input type="text" class="w3-input w3-border" name="course_name"
			value="<?php echo $course[courseName]; ?>"><br>

		<label>Course Code:</label>
		<input type="text" class="w3-input w3-border" name="course_code"
			value="<?php echo $course[courseCode]; ?>"><br>

		<label>Semester:</label>
		<input type="text" class="w3-input w3-border" name="course_semester"
			value="<?php echo $course[semester]; ?>"><br>

		<label>Start Date:</label>
		<input type="text" class="w3-input w3-border" name="course_start_date"
			value="<?php echo $course[startDate]; ?>"><br>

		<label>&nbsp;</label>
		<input type="submit" class="w3-btn w3-grey" value="Modify Course"><br>

	</form>
	<p class="last_paragraph">
		<a href="?action=list_courses">View Course List</a>
	</p>
        </div>

</main>
<?php include 'footer.php'; ?>