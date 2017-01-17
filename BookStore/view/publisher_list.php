
<!-- the publisher_list page displays all the publishers -->

<?php include 'header.php'; ?>
<main>
	<!--<h1>SELECT * FROM Publisher</h1>-->
	<!-- put aside here, this should be a list of links on left side -->
	<aside></aside>

	<section>
		<!-- table to list the query array -->
                <header class="w3-center">
		<h2>Publishers</h2>
                </header>
                <div class="w3-responsive">
		<table class="w3-table-all w3-bordered">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Address</th>
				<th>City</th>
				<th>State</th>
				<th>Postal Code</th>
				<th>Phone</th>
				<th>Email</th>
			</tr>
			

			<?php foreach ($publishers as $publisher) : ?>
			<tr>
				<td><?php echo $publisher['publisherID']; ?></td>	
				<td><?php echo $publisher['publisherName']; ?></td>
				<td><?php echo $publisher['address']; ?></td>
				<td><?php echo $publisher['city']; ?></td>
				<td><?php echo $publisher['state']; ?></td>
				<td><?php echo $publisher['postalCode']; ?></td>
				<td><?php echo $publisher['phone']; ?></td>
				<td><?php echo $publisher['emailAddr']; ?></td>

				<!--the edit button, submits show_edit_form action to index -->
				<td><form action="." method="post">
					<input type="hidden" name="action"
						value="show_edit_publisher_form">
					<input type="hidden" name="publisher_id"
						value="<?php echo $publisher['publisherID']; ?>">
					<input type="submit" class="w3-btn w3-grey" value="Edit">
				</form></td>
				<!-- end edit code -->

				<!--the delete button, submits delete_publisher action to index -->
				<td><form action="." method="post">
					<input type="hidden" name="action"
						value="delete_publisher">
					<input type="hidden" name="publisher_id"
						value="<?php echo $publisher['publisherID']; ?>">
					<input type="submit" class="w3-btn w3-grey" value="Delete">
				</form></td>
				<!-- end delete code -->
			</tr>
			<?php endforeach; ?>
		</table>
                </div>

		<p button class="last_paragraph w3-btn w3-grey" style="margin-left: 20px;">
			<a href="?action=show_add_publisher_form">Add Publisher</a>
		</p>

	</section>
</main>
<?php include 'footer.php'; ?>


