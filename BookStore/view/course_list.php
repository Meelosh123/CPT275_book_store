<!-- the course_list page displays all the courses -->

<?php include 'header.php'; ?>
<main>
	<!--<h1>SELECT * FROM courses</h1>-->
	<section>
		<!-- table to list the query array -->
                <header class="w3-center">
		<h2>Courses</h2>
                </header>
                <div class="w3-responsive">
		<table class="w3-table-all w3-bordered">
			<tr>
				<th>Course ID</th>
				<th>User ID</th>
				<th>Instructor</th>
				<th>Course Name</th>
				<th>Course Code</th>
				<th>Semester</th>
				<th>Start Date</th>
			</tr>
			

			<?php foreach ($courses as $c) : ?>
			<tr>
				<td><?php echo $c['courseID']; ?></td>	
				<td><?php echo $c['userID']; ?></td>
				<td><?php echo $c['instructor']; ?></td>
				<td><?php echo $c['courseName']; ?></td>
				<td><?php echo $c['courseCode']; ?></td>
				<td><?php echo $c['semester']; ?></td>
				<td><?php echo $c['startDate']; ?></td>

				<!--the edit button, submits show_edit_form action to index -->
				<td><form action="." method="post">
					<input type="hidden" name="action"
						value="show_edit_course_form">
					<input type="hidden" name="course_id"
						value="<?php echo $c['courseID']; ?>">
					<input type="submit" class="w3-btn w3-grey" value="Edit">
				</form></td>
				<!-- end edit code -->

				<!--the delete button, submits delete_course action to index -->
				<td><form action="." method="post">
					<input type="hidden" name="action"
						value="delete_course">
					<input type="hidden" name="course_id"
						value="<?php echo $c['courseID']; ?>">
					<input type="submit" class="w3-btn w3-grey" value="Delete">
				</form></td>
				<!-- end delete code -->
			</tr>
			<?php endforeach; ?>
		</table>
                </div>

		<p class="last_paragraph">
			<a href="?action=show_add_course_form">Add Course</a>
		</p>

	</section>

</main>
<?php include ('footer.php'); ?>