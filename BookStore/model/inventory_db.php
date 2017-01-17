<?php

//gets all textbooks
function get_inventory() {
	global $db;

	$query =	'SELECT *
				FROM inventory
				ORDER BY inventoryNumber';

		$statement = $db->prepare($query);
		$statement->execute();

	//fills $textbooks with array
	$inventory = $statement->fetchAll();
		$statement->closeCursor();
	return $inventory;
}

function get_inventory_record($inventory_id) {
	global $db;

	$query =	'SELECT *
				FROM inventory
				WHERE inventoryNumber = :inventory_id';

		$statement = $db->prepare($query);
		$statement->bindValue(':inventory_id', $inventory_id);
		$statement->execute();
	$inventory = $statement->fetch();
		$statement->closeCursor();
	return $inventory;

}

function add_inventory($textbook_id,
				$inventory_category,
				$inventory_description,
				$inventory_stock_quantity,
				$inventory_stock_ordered,
				$inventory_reorder_status ) {

	global $db;

	$query =	'INSERT INTO inventory
					(textbookID,
					category,
					description,
					stockQuantity,
					stockOrdered,
					reorderStatus)
				VALUES (:textbook_id,
					:inventory_category,
					:inventory_description,
					:inventory_stock_quantity,
					:inventory_stock_ordered,
					:inventory_reorder_status)';

		$statement = $db->prepare($query);
		$statement->bindValue(':textbook_id', $textbook_id);
		$statement->bindValue(':inventory_category', $inventory_category);
		$statement->bindValue(':inventory_description', $inventory_description);
		$statement->bindValue(':inventory_stock_quantity', $inventory_stock_quantity);
		$statement->bindValue(':inventory_stock_ordered', $inventory_stock_ordered);
		$statement->bindValue(':inventory_reorder_status', $inventory_reorder_status);
		$statement->execute();
		$statement->closeCursor();
}

function delete_inventory($inventory_id) {
	global $db;

//inventoryID in DB is called inventoryNumber for some stupid reason
	$query =	'DELETE FROM inventory
				WHERE inventoryNumber = :inventory_id';
		$statement = $db->prepare($query);
		$statement->bindValue(':inventory_id', $inventory_id);
		$statement->execute();
		$statement->closeCursor();
}

function edit_inventory($inventory_id,
				$textbook_id,
				$inventory_category,
				$inventory_description,
				$inventory_stock_quantity,
				$inventory_stock_ordered,
				$inventory_reorder_status ) {

	global $db;

	$query =	'UPDATE inventory
				SET textbookID = :textbook_id,
					category = :inventory_category,
					description = :inventory_description,
					stockQuantity = :inventory_stock_quantity,
					stockOrdered = :inventory_stock_ordered,
					reorderStatus = :inventory_reorder_status
				WHERE inventoryNumber = :inventory_id';

		$statement = $db->prepare($query);
		$statement->bindValue(':inventory_id', $inventory_id);
		$statement->bindValue(':textbook_id', $textbook_id);
		$statement->bindValue(':inventory_category', $inventory_category);
		$statement->bindValue(':inventory_description', $inventory_description);
		$statement->bindValue(':inventory_stock_quantity', $inventory_stock_quantity);
		$statement->bindValue(':inventory_stock_ordered', $inventory_stock_ordered);
		$statement->bindValue(':inventory_reorder_status', $inventory_reorder_status);
		$statement->execute();
		$statement->closeCursor();
}

?>