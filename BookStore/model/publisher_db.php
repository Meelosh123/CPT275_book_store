<?php

//gets all publishers
function get_publishers() {
	global $db;

	$query =	'SELECT *
				FROM publishers
				ORDER BY publisherID';

	$statement = $db->prepare($query);
	$statement->execute();

	//fills $publisher with array
	$publishers = $statement->fetchall();
	$statement->closeCursor();
	return $publishers;
}

//gets one publisher
function get_publisher_record($publisher_id) {
	global $db;

	$query =	'SELECT *
				FROM publishers
				WHERE publisherID = :publisher_id';

	$statement = $db->prepare($query);
	$statement->bindValue(':publisher_id', $publisher_id);
	$statement->execute();

	$publisher = $statement->fetch();
	$statement->closeCursor();
	return $publisher;

} 

//adds a publisher
function add_publisher($publisher_name, $publisher_address, $publisher_city,
				$publisher_state, $publisher_postal_code, $publisher_phone,
				$publisher_email_addr) {

	global $db;

	// add publisher record to database
	$query = 'INSERT INTO publishers
					(publisherName, address, city,
					state, postalCode, phone, emailAddr)
				VALUES
					(:publisher_name,
					:publisher_address, 
					:publisher_city,
					:publisher_state, 
					:publisher_postal_code, 
					:publisher_phone,
					:publisher_email_addr)';

		$statement = $db->prepare($query);
		$statement->bindValue(':publisher_name', $publisher_name);
		$statement->bindValue(':publisher_address', $publisher_address);
		$statement->bindValue(':publisher_city', $publisher_city);
		$statement->bindValue(':publisher_state', $publisher_state);
		$statement->bindValue(':publisher_postal_code', $publisher_postal_code);
		$statement->bindValue(':publisher_phone', $publisher_phone);
		$statement->bindValue(':publisher_email_addr', $publisher_email_addr);
		$statement->execute();
		$statement->closeCursor();
}

//deletes a publisher
function delete_publisher($publisher_id) {
	global $db;

	$query =	'DELETE FROM publishers
				WHERE publisherID = :publisher_id';

	$statement = $db->prepare($query);
	$statement->bindValue(':publisher_id', $publisher_id);
	$statement->execute();
	$statement->closeCursor();
}

//edits a publisher
function 	edit_publisher($publisher_id, $publisher_name, $publisher_address, $publisher_city,
				$publisher_state, $publisher_postal_code, $publisher_phone,
				$publisher_email_addr) {

	global $db;

	// edits publisher record in the database
	$query =	'UPDATE publishers
				SET publisherName = :publisher_name,
					address = :publisher_address, 
					city = :publisher_city,
					state = :publisher_state, 
					postalCode = :publisher_postal_code, 
					phone = :publisher_phone,
					emailAddr = :publisher_email_addr
				WHERE publisherID = :publisher_id';

		$statement = $db->prepare($query);
		$statement->bindValue(':publisher_id', $publisher_id);
		$statement->bindValue(':publisher_name', $publisher_name);
		$statement->bindValue(':publisher_address', $publisher_address);
		$statement->bindValue(':publisher_city', $publisher_city);
		$statement->bindValue(':publisher_state', $publisher_state);
		$statement->bindValue(':publisher_postal_code', $publisher_postal_code);
		$statement->bindValue(':publisher_phone', $publisher_phone);
		$statement->bindValue(':publisher_email_addr', $publisher_email_addr);
		$statement->execute();
		$statement->closeCursor();

}


?>