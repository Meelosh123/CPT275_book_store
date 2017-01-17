
<!--
This is the publisher_edit form, intended for admins?.
-->

<?php include 'header.php'; ?>

<main>
        <div class="w3-container w3-card-4 w3-border" style="width:50%; margin: auto; margin-top: 20px;">
        <header class="w3-center">
	<h1>Edit Publisher</h1>
        </header>
	
	<!-- this form sends the hidden "action" to index, as well as field data -->
	<form action="index.php" method="post" id="edit_publisher_form"> <!-- CSS id, compare to class?-->
		<input type="hidden" name="action" value="edit_publisher">

		<!-- publisher ID is disabled.  send hidden type -->
		<label>Publisher ID:</label>
		<input type="text" name="publisher_id" disabled
			value="<?php echo $publisher[publisherID]; ?>"><br>
		<input type="hidden" class="w3-input w3-border" name="publisher_id" value="<?php echo $publisher[publisherID]; ?>">


		<label>Publisher Name:</label>
		<input type="text" name="publisher_name"
			class="w3-input w3-border" value="<?php echo $publisher[publisherName]; ?>"><br>

		<label>Address:</label>
		<input type="text" name="publisher_address"
			class="w3-input w3-border" value="<?php echo $publisher[address]; ?>"><br>

		<label>City:</label>
		<input type="text" name="publisher_city"
			class="w3-input w3-border" value="<?php echo $publisher[city]; ?>"><br>

		<label>State:</label>
		<input type="text" name="publisher_state"
			class="w3-input w3-border" value="<?php echo $publisher[state]; ?>"><br>

		<label>Postal Code:</label>
		<input type="text" name="publisher_postal_code"
			class="w3-input w3-border" value="<?php echo $publisher[postalCode]; ?>"><br>

		<label>Phone:</label>
		<input type="text" name="publisher_phone"
			class="w3-input w3-border" value="<?php echo $publisher[phone]; ?>"><br>

		<label>Email:</label>
		<input type="text" name="publisher_email_addr"
			class="w3-input w3-border" value="<?php echo $publisher[emailAddr]; ?>"><br>

		<label>&nbsp;</label>
		<input type="submit" class="w3-btn w3-grey" value="Modify Publisher"><br>

	</form>
	<p class="last_paragraph">
		<a href="?action=list_publishers">View Publisher List</a>
	</p>
        </div>
 
</main>
<?php include 'footer.php'; ?>