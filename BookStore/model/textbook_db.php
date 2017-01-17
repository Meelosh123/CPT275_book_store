<?php

//gets all textbooks
function get_textbooks() {
	global $db;

	$query =	'SELECT *
				FROM textbooks
				ORDER BY textbookID';

	$statement = $db->prepare($query);
	$statement->execute();

	//fills $textbooks with array
	$textbooks = $statement->fetchAll();
	$statement->closeCursor();
	return $textbooks;
}

//gets all textbooks
function get_textbooks_ordered_by_course_code() {
	global $db;

	$query =	'SELECT *
				FROM textbooks JOIN courses
                                        ON textbooks.courseID = courses.courseID
				ORDER BY courses.courseCode';

	$statement = $db->prepare($query);
	$statement->execute();

	//fills $textbooks with array
	$textbooks = $statement->fetchAll();
	$statement->closeCursor();
	return $textbooks;
}

function add_textbook($publisher_id,
				$course_id,
				$textbook_title,
				$textbook_author, 
				$textbook_edition, 
				$textbook_isbn,
				$textbook_cost) {
	global $db;

	$query =	'INSERT INTO textbooks
					(publisherID, courseID, title,
					author, edition, ISBN, cost)
				VALUES (:publisher_id,
						:course_id,
						:textbook_title,
						:textbook_author, 
						:textbook_edition, 
						:textbook_isbn,
						:textbook_cost)';
		$statement = $db->prepare($query);
		$statement->bindValue(':publisher_id', $publisher_id);
		$statement->bindValue(':course_id', $course_id);
		$statement->bindValue(':textbook_title', $textbook_title);
		$statement->bindValue(':textbook_author', $textbook_author);
		$statement->bindValue(':textbook_edition', $textbook_edition);
		$statement->bindValue(':textbook_isbn', $textbook_isbn);
		$statement->bindValue(':textbook_cost', $textbook_cost);
		$statement->execute();
		$statement->closeCursor();

}

function delete_textbook($textbook_id) {
	global $db;

	$query =	'DELETE FROM textbooks
				WHERE textbookID = :textbook_id';
		$statement = $db->prepare($query);
		$statement->bindValue(':textbook_id', $textbook_id);
		$statement->execute();
		$statement->closeCursor();
}

function get_textbook_record($textbook_id) {
	global $db;

	$query =	'SELECT *
				FROM textbooks
				WHERE textbookID = :textbook_id';

	$statement = $db->prepare($query);
	$statement->bindValue(':textbook_id', $textbook_id);
	$statement->execute();

	$textbook = $statement->fetch();
	$statement->closeCursor();
	return $textbook;
}

function get_textbook_record_with_course_code($textbook_id) {
	global $db;

	$query =	'SELECT textbooks.textbookID,
                                textbooks.publisherID,
                                textbooks.courseID,
                                textbooks.title,
                                textbooks.author,
                                textbooks.edition,
                                textbooks.ISBN,
                                textbooks.cost,
                                courses.courseCode
        
			FROM textbooks JOIN courses
                                ON textbooks.courseID = courses.courseID
			WHERE textbookID = :textbook_id';

	$statement = $db->prepare($query);
	$statement->bindValue(':textbook_id', $textbook_id);
	$statement->execute();

	$textbook = $statement->fetch();
	$statement->closeCursor();
	return $textbook;
}

function edit_textbook($textbook_id,
				$publisher_id,
				$course_id,
				$textbook_title,
				$textbook_author, 
				$textbook_edition, 
				$textbook_isbn,
				$textbook_cost) {
	global $db;

	$query =	'UPDATE textbooks
				SET publisherID = :publisher_id,
					courseID = :course_id,
					title = :textbook_title,
					author = :textbook_author, 
					edition = :textbook_edition, 
					isbn = :textbook_isbn,
					cost = :textbook_cost
				WHERE textbookID = :textbook_id';

		$statement = $db->prepare($query);
		$statement->bindValue(':textbook_id', $textbook_id);
		$statement->bindValue(':publisher_id', $publisher_id);
		$statement->bindValue(':course_id', $course_id);
		$statement->bindValue(':textbook_title', $textbook_title);
		$statement->bindValue(':textbook_author', $textbook_author);
		$statement->bindValue(':textbook_edition', $textbook_edition);
		$statement->bindValue(':textbook_isbn', $textbook_isbn);
		$statement->bindValue(':textbook_cost', $textbook_cost);
		$statement->execute();
		$statement->closeCursor();
}

?>