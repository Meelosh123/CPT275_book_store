<?php include ('header.php'); ?>

<main>
        <div class="w3-container w3-card-4 w3-border" style="width:50%; margin: auto; margin-top: 20px;">
        <header class="w3-center">
	<h1>Add User</h1>
        </header>
	
	<!-- this form sends the hidden "action" to index, as well as field data -->
	<form action="index.php" method="post" id="add_user_form"> <!-- CSS id, compare to class?-->
		<input type="hidden" name="action" value="add_user">

		<label>User Name:</label>
		<input type="text" class="w3-input w3-border" name="user_name"><br>

		<label>Campus Name:</label>
		<input type="text" class="w3-input w3-border" name="user_campus_name"><br>

		<label>First Name:</label>
		<input type="text" class="w3-input w3-border" name="user_first_name"><br>

		<label>Last Name:</label>
		<input type="text" class="w3-input w3-border" name="user_last_name"><br>

		<label>User Title:</label>
		<input type="text" class="w3-input w3-border" name="user_title"><br>

		<label>Phone:</label>
		<input type="text" class="w3-input w3-border" name="user_phone"><br>

		<label>Email Address:</label>
		<input type="text" class="w3-input w3-border" name="user_email_addr"><br>

		<label>Password:</label>
		<input type="password" class="w3-input w3-border" name="user_password"><br>

		<!--<label>User Access:</label>
		<input type="text" class="w3-input w3-border" name="user_user_access"><br>-->

		<label>&nbsp;</label>
		<input type="submit" class="w3-btn w3-grey" value="Add User"><br>

	</form>
	<p class="last_paragraph">
		<a href="?action=user_login">Go Back to Login Page</a>
	</p>
        </div>
</main>
<?php include 'footer.php'; ?>