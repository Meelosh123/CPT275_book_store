
<!--
This is the textbook_edit form, intended for admins?.
-->

<?php include 'header.php' ?>
<main>
        <div class="w3-container w3-card-4 w3-border" style="width:50%; margin: auto; margin-top: 20px;">
        <header class="w3-center">
	<h1>Edit Textbook</h1>
        </header>

	
	<!-- this form sends the hidden "action" to index, as well as field data -->
	<form action="index.php" method="post" id="edit_textbook_form"> <!-- CSS id, compare to class?-->
		<input type="hidden" name="action" value="edit_textbook">

	<!-- This primary key is disabled, so send the value by hidden -->
		<label>Textbook ID</label>
		<input class="w3-input w3-border" type="text" name="textbook_id" disabled
			value="<?php echo $textbook['textbookID']; ?>"><br>
                        
		<input type="hidden" name="textbook_id" value="<?php echo $textbook[textbookID]; ?>">

	<!-- Drop down list to choose publisher id, shows publisher_name -->
		<label>Publisher:</label>
		<select class="w3-input w3-border" name="publisher_id">
			<?php foreach ($publishers as $p) : ?>
		<!--trying to set default -->
				<option <?php if ($p['publisherID'] == $textbook['publisherID']) { echo 'selected';} ?>
					value="<?php echo $p['publisherID']; ?>">
					<?php echo $p['publisherName']; ?>
				</option>
			<?php endforeach; ?>
		</select><br>

	<!-- Drop down list to choose course -->
		<label>Course:</label>
		<select class="w3-input w3-border" name="course_id">
			<?php foreach ($courses as $c) : ?>
                <!--trying to set default -->
				<option <?php if ($c['courseID'] == $textbook['courseID']) { echo 'selected';} ?>
				value="<?php echo $c['courseID']; ?>">
					<?php echo $c['courseName']; ?>
				</option>
			<?php endforeach; ?>
		</select><br>

		<label>Title:</label>
		<input class="w3-input w3-border" type="text" name="textbook_title"
			value="<?php echo $textbook[title]; ?>"><br>

		<label>Author:</label>
		<input class="w3-input w3-border" type="text" name="textbook_author"
			value="<?php echo $textbook[author]; ?>"><br>

		<label>Edition:</label>
		<input class="w3-input w3-border" type="text" name="textbook_edition"
			value="<?php echo $textbook[edition]; ?>"><br>

		<label>ISBN:</label>
		<input class="w3-input w3-border" type="text" name="textbook_isbn"
			value="<?php echo $textbook[ISBN]; ?>"><br>

		<label>Cost:</label>
		<input class="w3-input w3-border" type="text" name="textbook_cost"
			value="<?php echo $textbook[cost]; ?>"><br>

		<label>&nbsp;</label>
		<input type="submit" class="w3-btn w3-grey" value="Modify Textbook"><br>

	</form>
	<p class="last_paragraph">
		<a href="?action=list_textbooks">View Textbook List</a>
	</p>
        </div>

</main>
<?php include 'footer.php'; ?>