
<!--
This is the inventory_add form, intended for admins?.
-->

<?php include 'header.php'; ?>
<main>
        <div class="w3-container w3-card-4 w3-border" style="width:50%; margin: auto; margin-top: 20px;">
        <header class="w3-center">
	<h1>Add Inventory</h1>
        </header>
	
	<!-- this form sends the hidden "action" to index, as well as field data -->
	<form action="index.php" method="post" id="add_inventory_form"> <!-- CSS id, compare to class?-->
		<input type="hidden" name="action" value="add_inventory">

	<!-- Drop down list to choose textbook_id, shows title, isbn -->
		<label>Textbook:</label>
		<select name="textbook_id" class="w3-input w3-border">
			<?php foreach ($textbooks as $t) : ?>
				<option value="<?php echo $t[textbookID]; ?>">
					<?php echo $t[title]; ?>, 
					<?php echo $t[ISBN]; ?>
				</option>
			<?php endforeach; ?>
		</select><br>

		<label>Category:</label>
		<input type="text" class="w3-input w3-border" name="inventory_category"><br>

		<label>Description:</label>
		<input type="text" class="w3-input w3-border" name="inventory_description"><br>

		<label>Stock Quantity:</label>
		<input type="text" class="w3-input w3-border" name="inventory_stock_quantity"><br>

		<label>Stock Ordered:</label>
		<input type="text" class="w3-input w3-border" name="inventory_stock_ordered"><br>

		<label>Reorder Status:</label>
		<input type="text" class="w3-input w3-border" name="inventory_reorder_status"><br>

		<label>&nbsp;</label>
		<input type="submit" class="w3-btn w3-grey" value="Add Inventory"><br>

	</form>
	<p class="last_paragraph">
		<a href="?action=list_inventory">View Inventory List</a>
	</p>
        </div>

</main>
<?php include 'footer.php'; ?>