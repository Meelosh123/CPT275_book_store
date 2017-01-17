
<!--
This is the inventory_edit form, intended for admins?.
-->

<?php include 'header.php' ?>
<main>
        <div class="w3-container w3-card-4 w3-border" style="width:50%; margin: auto; margin-top: 20px;">
        <header class="w3-center">
	<h1>Edit Inventory</h1>
        </header>

	
	<!-- this form sends the hidden "action" to index, as well as field data -->
	<form action="index.php" method="post" id="edit_inventory_form"> <!-- CSS id, compare to class?-->
		<input type="hidden" name="action" value="edit_inventory">

	<!-- This primary key is disabled, so send the value by hidden -->
		<label>Inventory ID</label>
		<input type="text" class="w3-input w3-border" name="inventory_id" disabled
			value="<?php echo $inventory['inventoryNumber']; ?>"><br>
                        
		<input type="hidden" name="inventory_id" value="<?php echo $inventory['inventoryNumber']; ?>">

	<!-- Drop down list to choose textbook id, shows textbook title, ISBN -->
		<label>Textbook:</label>
		<select name="textbook_id" class="w3-input w3-border">
			<?php foreach ($textbooks as $t) : ?>
		<!--trying to set default -->
				<option <?php if ($t['textbookID'] == $inventory['textbookID']) { echo 'selected';} ?>
					value="<?php echo $t['textbookID']; ?>">
					<?php echo $t['title']; ?>,
					<?php echo $t['ISBN']; ?>
				</option>
			<?php endforeach; ?>
		</select><br>

		<label>Category:</label>
		<input type="text" class="w3-input w3-border" name="inventory_category"
			value="<?php echo $inventory[category]; ?>"><br>

		<label>Description:</label>
		<input type="text" class="w3-input w3-border" name="inventory_description"
			value="<?php echo $inventory[description]; ?>"><br>

		<label>Stock Quantity:</label>
		<input type="text" class="w3-input w3-border" name="inventory_stock_quantity"
			value="<?php echo $inventory[stockQuantity]; ?>"><br>

		<label>Stock Ordered:</label>
		<input type="text" class="w3-input w3-border" name="inventory_stock_ordered"
			value="<?php echo $inventory[stockOrdered]; ?>"><br>

		<label>Reorder Status:</label>
		<input type="text" class="w3-input w3-border" name="inventory_reorder_status"
			value="<?php echo $inventory[reorderStatus]; ?>"><br>

		<label>&nbsp;</label>
		<input type="submit" class="w3-btn w3-grey" value="Modify Inventory"><br>

	</form>
	<p class="last_paragraph">
		<a href="?action=list_inventory">View Inventory List</a>
	</p>
        </div>

</main>
<?php include 'footer.php'; ?>