
<!--
This is the publisher_add form, intended for admins?.
-->

<?php include 'header.php'; ?>
<main>
        <div class="w3-container w3-card-4 w3-border" style="width:50%; margin: auto; margin-top: 20px;">
        <header class="w3-center">
	<h1>Add Publisher</h1>
        </header>
	
	<!-- this form sends the hidden "action" to index, as well as field data -->
	<form action="index.php" method="post" id="add_publisher_form"> <!-- CSS id, compare to class?-->
		<input type="hidden" name="action" value="add_publisher">

		<label>Publisher Name:</label>
		<input class="w3-input w3-border" type="text" name="publisher_name"><br>

		<label>Address:</label>
		<input class="w3-input w3-border" type="text" name="publisher_address"><br>

		<label>City:</label>
		<input class="w3-input w3-border" type="text" name="publisher_city"><br>

		<label>State:</label>
		<input class="w3-input w3-border" type="text" name="publisher_state"><br>

		<label>Postal Code:</label>
		<input class="w3-input w3-border" type="text" name="publisher_postal_code"><br>

		<label>Phone:</label>
		<input class="w3-input w3-border" type="text" name="publisher_phone"><br>

		<label>Email:</label>
		<input class="w3-input w3-border" type="text" name="publisher_email_addr"><br>

		<label>&nbsp;</label>
		<input type="submit" class="w3-btn w3-grey" value="Add Publisher"><br>

	</form>
	<p class="last_paragraph">
		<a href="?action=list_publishers">View Publisher List</a>
	</p>
        </div>

</main>
<?php include 'footer.php'; ?>