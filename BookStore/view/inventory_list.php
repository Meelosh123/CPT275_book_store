<!-- the inventory_list page displays all the inventory -->

<?php include 'header.php'; ?>
<main>
	<!--<h1>SELECT * FROM inventory</h1>-->
	<section>
		<!-- table to list the query array -->
                <header class="w3-center">
		<h2>Inventory</h2>
                </header>
                <div class="w3-responsive">
		<table class="w3-table-all w3-bordered">
			<tr>
				<th>Inventory ID</th>
				<th>Textbook ID</th>
				<th>Category</th>
				<th>Description</th>
				<th>Stock Quantity</th>
				<th>Stock Ordered</th>
				<th>Reorder Status</th>
			</tr>
			

			<?php foreach ($inventory as $i) : ?>
			<tr>
				<td><?php echo $i['inventoryNumber']; ?></td>	
				<td><?php echo $i['textbookID']; ?></td>
				<td><?php echo $i['category']; ?></td>
				<td><?php echo $i['description']; ?></td>
				<td><?php echo $i['stockQuantity']; ?></td>
				<td><?php echo $i['stockOrdered']; ?></td>
				<td><?php echo $i['reorderStatus']; ?></td>

				<!--the edit button, submits show_edit_form action to index -->
				<td><form action="." method="post">
					<input type="hidden" name="action"
						value="show_edit_inventory_form">
					<input type="hidden" name="inventory_id"
						value="<?php echo $i['inventoryNumber']; ?>">
					<input type="submit" class="w3-btn w3-grey" value="Edit">
				</form></td>
				<!-- end edit code -->

				<!--the delete button, submits delete_course action to index -->
				<td><form action="." method="post">
					<input type="hidden" name="action"
						value="delete_inventory">
					<input type="hidden" name="inventory_id"
						value="<?php echo $i['inventoryNumber']; ?>">
					<input type="submit" class="w3-btn w3-grey" value="Delete">
				</form></td>
				<!-- end delete code -->
			</tr>
			<?php endforeach; ?>
		</table>
                </div>

		<p class="last_paragraph">
			<a href="?action=show_add_inventory_form">Add Inventory</a>
		</p>

	</section>

</main>
<?php include ('footer.php'); ?>