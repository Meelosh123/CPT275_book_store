<?php include ('header.php'); ?>
<main>
        <div class="w3-container w3-card-4 w3-border" style="width:50%; margin: auto; margin-top: 20px;">
        <header class="w3-center">
	<h1>Add Book to Cart</h1>
        </header>
	<form action="index.php" method="post"> 
		<input type="hidden" name="action" value="add_to_cart">

		<!--This is currently a dropdown list for textbook info-->
		<label><b>Title:</b></label>
		<select class="w3-select" name="textbook_id">
			<?php foreach ($textbooks as $t) : ?>
				<option value="<?php echo $t['textbookID']; ?>">
					<?php echo $t['courseID'] . ', ' .
					 $t['title'] . ', ' .
					 $t['author'] . ', ' .
					 $t['edition'] . ', ' .
					 $t['ISBN'] .' ($' .
					 $t['cost'] . ')' ?>
				</option>
			<?php endforeach; ?>
		</select><br>

		<!--This gets the quantity of books to add to cart -->
		<label><b>Quantity:</b></label><br>
		<input class="w3-input" type="text" name="quantity"><br>

		<label>&nbsp;</label>
		<input type="submit" class="w3-btn w3-grey" value="Add Book to Cart">
	</form>
        

	<!--link to view cart -->
	<p class="last_paragraph">
		<a href="?action=list_cart">View Cart</a>
	</p>
        </div>
</main>
<?php include ('footer.php'); ?>