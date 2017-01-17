
<!--
This is the user_edit form, intended for admins?
-->

<?php include 'header.php' ?>
<main>
        <div class="w3-container w3-card-4 w3-border" style="width:50%; margin: auto; margin-top: 20px;">
        <header class="w3-center">
	<h1>Edit User</h1>
        </header>
	
	<!-- this form sends the hidden "action" to index, as well as field data -->
	<form action="index.php" method="post" id="edit_user_form"> <!-- CSS id, compare to class?-->
		<input type="hidden" name="action" value="edit_user">

		<label>User ID:</label>
		<input type="hidden" name="user_id"
			value="<?php echo $user['userID']; ?>">
		<input type="text" class="w3-input w3-border" name="user_id" disabled
			value="<?php echo $user['userID']; ?>"><br>

		<label>User Name:</label>
		<input type="text" class="w3-input w3-border" name="user_name"
			value="<?php echo $user['userName']; ?>"><br>

		<label>Campus Name:</label>
		<input type="text" class="w3-input w3-border" name="user_campus_name"
			value="<?php echo $user['campusName']; ?>"><br>

		<label>First Name:</label>
		<input type="text" class="w3-input w3-border" name="user_first_name"
			value="<?php echo $user['firstName']; ?>"><br>

		<label>Last Name:</label>
		<input type="text" class="w3-input w3-border" name="user_last_name"
			value="<?php echo $user['lastName']; ?>"><br>

		<label>User Title:</label>
		<input type="text" class="w3-input w3-border" name="user_title"
			value="<?php echo $user['userTitle']; ?>"><br>

		<label>Phone:</label>
		<input type="text" class="w3-input w3-border" name="user_phone"
			value="<?php echo $user['phone']; ?>"><br>

		<label>Email Address:</label>
		<input type="text" class="w3-input w3-border" name="user_email_addr"
			value="<?php echo $user['emailAddr']; ?>"><br>

		<!--<label>Password:</label>
		<input type="password" class="w3-input w3-border" name="user_password"
			value="<?php echo $user['password']; ?>"><br>-->

		<label>User Access:</label>
		<input type="text" class="w3-input w3-border" name="user_user_access"
			value="<?php echo $user['userAccess']; ?>"><br>

		<label>&nbsp;</label>
		<input type="submit" class="w3-btn w3-grey" value="Edit User"><br>

	</form>
	<p class="last_paragraph">
		<a href="?action=list_users">View User List</a>
	</p>
        </div>
</main>
<?php include 'footer.php'; ?>