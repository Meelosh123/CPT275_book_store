<?php include ('header.php'); ?>
<main>
        <div class="w3-container w3-card-4 w3-border" style="width:50%; margin: auto; margin-top: 20px;">
        <header class="w3-center">
	<h1>Your Cart</h1>
        </header>
	<?php if (empty($_SESSION['cart']) ||
			count($_SESSION['cart']) == 0) : ?>
		<p>There are no books in your cart.</p>
	<?php else : ?>
		<form action="index.php" method="post">
			<input type="hidden" name="action" value="update_cart">
			<table class="w3-table-all w3-bordered">
				<tr id="cart_header">
					<th>Book</th>
					<th>Quantity</th>
				</tr>

			<?php foreach($_SESSION['cart'] as $textbook_id => $item) : ?>
				<tr>
					<td>
						<?php echo $item['course_id'] . ', ' .
							$item['title'] . ', ' .
					 		$item['author'] . ', ' .
					 		$item['edition'] . ', ' .
					 		$item['ISBN']. ' ($' .
					 		$item['cost'] . ')' ?>
					</td>
					<td>
						<input type="text" class="cart_quantity w3-input w3-border"
							name="new_quantity[<?php echo $textbook_id; ?>]"
							value="<?php echo $item['quantity']; ?>">
					</td>
				</tr>
			<?php endforeach; ?>
				<tr>
					<td>
						<input type="submit" class="w3-btn w3-grey" value="Update Cart">
					</td>
				</tr>
			</table>
			<p>Click "Update Cart" to update quantities in your
				cart.  Enter a quantity of 0 to remove an item.
			</p>
		</form>

	<!-- Order Button -->
	<form action="." method="post">
		<input type="hidden" name="action"
						value="make_order">
		<input type="submit" class="w3-btn w3-grey" value="Make Order">
	</form>
	<?php endif; ?>
	<p><a href=".?action=show_add_cart_form">Add Book</a></p>
	<p><a href=".?action=empty_cart">Empty Cart</a></p>
        </div>
</main>
<?php include ('footer.php'); ?>