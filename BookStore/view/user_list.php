
<!-- the user_list page displays all the users -->

<?php include 'header.php'; ?>
<main>
	<!--<h1>SELECT * FROM users</h1>-->
	<!-- put aside here, this should be a list of links on left side -->
	<aside></aside>

	<section>
		<!-- table to list the query array -->
                <header class="w3-center">
		<h2>Users</h2>
                </header>
                <div class="w3-responsive">
		<table class="w3-table-all w3-bordered">
			<tr>
				<th>ID</th>
				<th>User Name</th>
				<th>Campus</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Title</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Password</th>
				<th>Access Level</th>
			</tr>
			

			<?php foreach ($users as $user) : ?>
			<tr>
				<td><?php echo $user['userID']; ?></td>	
				<td><?php echo $user['userName']; ?></td>
				<td><?php echo $user['campusName']; ?></td>
				<td><?php echo $user['firstName']; ?></td>
				<td><?php echo $user['lastName']; ?></td>
				<td><?php echo $user['userTitle']; ?></td>
				<td><?php echo $user['phone']; ?></td>
				<td><?php echo $user['emailAddr']; ?></td>
				<td><?php echo $user['password']; ?></td>
				<td><?php echo $user['userAccess']; ?></td>

				<!--the edit button, submits show_edit_user_form action to index, sends Email and Password and UserID-->
				<td><form action="." method="post">
					<input type="hidden" name="action"
						value="show_edit_user_form">
					<input type="hidden" name="user_id"
						value="<?php echo $user['userID']; ?>">
					<input type="hidden" name="email"
						value="<?php echo $user['emailAddr']; ?>">
					<input type="hidden" name="password"
						value="<?php echo $user['password']; ?>">
					<input type="submit" class="w3-btn w3-grey" value="Edit">
				</form></td>
				<!-- end edit code -->

				<!--the delete button, submits delete_user action to index -->
				<td><form action="." method="post">
					<input type="hidden" name="action"
						value="delete_user">
					<input type="hidden" name="user_id"
						value="<?php echo $user['userID']; ?>">
					<input type="submit" class="w3-btn w3-grey" value="Delete">
				</form></td>
				<!-- end delete code -->
			</tr>
			<?php endforeach; ?>
		</table>

		<p class="last_paragraph">
			<a href="?action=show_add_user_form">Add User</a>
		</p>
                </div>

	</section>
</main>
<?php include 'footer.php'; ?>


