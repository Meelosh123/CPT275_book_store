<!-- the orders_list page displays all the orders -->

<?php include 'header.php'; ?>
<main>
	<!--<h1>SELECT * FROM orders</h1>-->
	<section>
		<!-- table to list the query array -->
                <header class="w3-center">
		<h2>Orders</h2>
                </header>
                <div class="w3-responsive">
		<table class="w3-table-all w3-bordered">
			<tr>
				<th>Order ID</th>
				<th>User ID</th>
                                <th>User Name</th>
                                <th>User Title</th>
                                <th>Campus</th>
				<th>Order Date</th>
				<th>Time Stamp</th>
			</tr>
			

			<?php foreach ($orders as $o) : ?>
			<tr>
				<td><?php echo $o['orderID']; ?></td>	
				<td><?php echo $o['userID']; ?></td>
                                <td><?php echo $o['firstName'] . ' ' . $o['lastName']; ?></td>
                                <td><?php echo $o['userTitle']; ?></td>
                                <td><?php echo $o['campusName']; ?></td>
				<td><?php echo $o['orderDate']; ?></td>
				<td><?php echo $o['timeStamps']; ?></td>

				<!--the edit button, submits show_edit_form action to index -->
                               <!-- <?php if ($_SESSION['userAccess'] != 3): ?>
				<td><form action="." method="post">
					<input type="hidden" name="action"
						value="show_edit_order_form">
					<input type="hidden" name="order_id"
						value="<?php echo $o['orderID']; ?>">
					<input type="submit" class="w3-btn w3-grey" value="Edit">
				</form></td>
                                <?php endif; ?>-->
				<!-- end edit code -->

				<!--the delete button, submits delete_order action to index -->
                                <?php if ($_SESSION['userAccess'] != 3): ?>
				<!--<td><form action="." method="post">
					<input type="hidden" name="action"
						value="delete_order">
					<input type="hidden" name="order_id"
						value="<?php echo $o['orderID']; ?>">
					<input type="submit" class="w3-btn w3-grey" value="Delete">
				</form></td>
                                <?php endif; ?>
				<!-- end delete code -->

				<td><form action="." method="post">
					<input type="hidden" name="action"
						value="list_orderline">
					<input type="hidden" name="order_id"
						value="<?php echo $o['orderID']; ?>">
					<input type="submit" class="w3-btn w3-grey" value="View Order Details">
				</form></td>
			</tr>
			<?php endforeach; ?>
		</table>
                </div>

		<p class="last_paragraph">
			<a href="?action=show_add_order_form">Add Order</a>
		</p>

	</section>

</main>
<?php include ('footer.php'); ?>