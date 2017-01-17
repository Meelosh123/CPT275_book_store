<!-- the textbook_list page displays all the textbooks -->

<?php include 'header.php'; ?>
<main>
	<!--<h1>SELECT * FROM textbooks</h1>-->
	<section>
		<!-- table to list the query array -->
                <header class="w3-center">
		<h2>Textbooks</h2>
                </header>
		<table class="w3-table-all w3-bordered">
			<tr>
				<th>TextbookID</th>
				<th>PublisherID</th>
				<th>CourseID</th>
				<th>Title</th>
				<th>Author</th>
				<th>Edition</th>
				<th>ISBN</th>
				<th>Cost</th>
			</tr>
			

			<?php foreach ($textbooks as $textbook) : ?>
			<tr>
				<td><?php echo $textbook['textbookID']; ?></td>	
				<td><?php echo $textbook['publisherID']; ?></td>
				<td><?php echo $textbook['courseID']; ?></td>
				<td><?php echo $textbook['title']; ?></td>
				<td><?php echo $textbook['author']; ?></td>
				<td><?php echo $textbook['edition']; ?></td>
				<td><?php echo $textbook['ISBN']; ?></td>
				<td><?php echo $textbook['cost']; ?></td>

				<!--the edit button, submits show_edit_form action to index -->
				<td><form action="." method="post">
					<input type="hidden" name="action"
						value="show_edit_textbook_form">
					<input type="hidden" name="textbook_id"
						value="<?php echo $textbook['textbookID']; ?>">
					<input type="submit" class="w3-btn w3-grey" value="Edit">
				</form></td>
				<!-- end edit code -->

				<!--the delete button, submits delete_publisher action to index -->
				<td><form action="." method="post">
					<input type="hidden" name="action"
						value="delete_textbook">
					<input type="hidden" name="textbook_id"
						value="<?php echo $textbook['textbookID']; ?>">
					<input type="submit" class="w3-btn w3-grey" value="Delete">
				</form></td>
				<!-- end delete code -->
			</tr>
			<?php endforeach; ?>
		</table>

		<p class="last_paragraph">
			<a href="?action=show_add_textbook_form">Add Textbook</a>
		</p>

	</section>
</main>
<?php include 'footer.php'; ?>


