<!-- the orderline_list page displays all the order details -->

<?php include 'header.php'; ?>
<main>
	<!--<h1>SELECT * FROM orderLine</h1>-->
	<section>
		<!-- table to list the query array -->
                <header class="w3-center">
		<h2>Orders Details</h2>
                </header>
                <div class="w3-responsive">
		<table class="w3-table-all w3-bordered">
			<tr>
				<th>Order ID</th>
				<th>Textbook ID</th>
                                <th>Textbook Title</th>
                                <th>ISBN</th>
				<th>Order Status</th>
				<th>Order Quantity</th>
			</tr>
			

			<?php foreach ($orderline as $o) : ?>
			<tr>
				<td><?php echo $o['orderID']; ?></td>	
				<td><?php echo $o['textbookID']; ?></td>
                                <td><?php echo $o['title']; ?></td>
                                <td><?php echo $o['ISBN']; ?></td>
				<td><?php echo $o['orderStatus']; ?></td>
				<td><?php echo $o['orderQuantity']; ?></td>

				<!--the edit button, submits show_edit_form action to index -->
                                <?php if ($_SESSION['userAccess'] != 3): ?>
				<!--<td><form action="." method="post">
					<input type="hidden" name="action"
						value="show_edit_orderline_form">
					<input type="hidden" name="order_id"
						value="<?php echo $o['orderID']; ?>">
					<input type="hidden" name="textbook_id"
						value="<?php echo $o['textbookID']; ?>">
					<input type="submit" class="w3-btn w3-grey" value="Edit">
				</form></td>
                                <?php endif; ?>
				<!-- end edit code -->

				<!--the delete button, submits delete_orderline action to index -->
                                <?php if ($_SESSION['userAccess'] != 3): ?>
				<!--<td><form action="." method="post">
					<input type="hidden" name="action"
						value="delete_orderline">
					<input type="hidden" name="order_id"
						value="<?php echo $o['orderID']; ?>">
					<input type="hidden" name="textbook_id"
						value="<?php echo $o['textbookID']; ?>">
					<input type="submit" class="w3-btn w3-grey" value="Delete">
				</form></td>
                                <?php endif; ?>
				<!-- end delete code -->

			<?php endforeach; ?>
		
		</table>
                </div>
                <?php if ($_SESSION['userAccess'] != 3): ?>
		<p>Click "Reorder to Cart" to add these items to a new cart</p>

	<!--Re order button -->
		<form action="." method="post">
			<input type="hidden" name="action"
				value="add_reorder_to_cart">
			<input type= "hidden" name="order_id"
				value="<?php echo $order_id; ?>">
			<input type="submit" class="w3-btn w3-grey" value="Reorder to Cart">
		</form>

		<p class="last_paragraph">
		<!--<a href="?action=show_add_order_form">Add Order</a>-->
		</p>
                <?php endif; ?>
	</section>

</main>
<?php include ('footer.php'); ?>