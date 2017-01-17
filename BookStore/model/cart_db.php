<?php
	//require ('textbook_db.php');

//Add item to cart
function add_item($textbook_id, $quantity) {
	global $db;

	if ($quantity < 1) return;

	// If item already exists in cart, update quantity
	if (isset($_SESSION['cart'][$textbook_id])) {
		$quantity += $_SESSION['cart'][$textbook_id]['quantity'];
		update_item($textbook_id, $quantity);
		return;
	}

	// Add item
	$textbook = get_textbook_record($textbook_id);
	$item = array(
		'textbook_id' => $textbook['textbookID'],
		'course_id' => $textbook['courseID'],
		'title' => $textbook['title'],
		'author' => $textbook['author'],
		'edition' => $textbook['edition'],
		'ISBN' => $textbook['ISBN'],
		'cost' => $textbook['cost'],
		'quantity' => $quantity
		);

	$_SESSION['cart'][$textbook_id] = $item;

}

function update_item($textbook_id, $quantity) {

	//not sure why this is here atm
	$quantity = (int) $quantity;

	// Checks to see if this book exists in the array
	if (isset($_SESSION['cart'][$textbook_id])) {
		if ($quantity <= 0) {
			//  removes the book from the array if the new quantity is zero
			unset($_SESSION['cart'][$textbook_id]);
		} else {
			//updates the quantity
			$_SESSION['cart'][$textbook_id]['quantity'] = $quantity;

		}
	}
}


function make_order() {
	global $db;
        //gets current users user ID
        $user_id = $_SESSION['userID'];

	//sets this order timestamp
	$current_date = date('Y-m-d H:i:s');

	//insert record into orders table, uses USER 1
	$query1 =	'INSERT INTO orders
					(userID,
					orderDate,
					timeStamps)
				VALUES (:user_id,
					:order_date,
					:time_stamps)';

	$statement1 = $db->prepare($query1);
	$statement1->bindValue(':user_id', $user_id);
	$statement1->bindValue(':order_date', $current_date);
	$statement1->bindValue(':time_stamps', $current_date);

	$statement1->execute();
	$statement1->closeCursor();

	//get order_id
	$order_id = get_order_id_at_time($current_date);


	$query2 =	'INSERT INTO orderLine
					(orderID,
					textbookID,
					orderStatus,
					orderQuantity)
				VALUES (:order_id,
					:textbook_id,
					:order_status,
					:order_quantity)';

	$statement2 = $db->prepare($query2);
	$statement2->bindValue(':order_id', $order_id);


	foreach ($_SESSION['cart'] as $textbook_id => $item) {
	
		$statement2->bindValue(':textbook_id', $textbook_id);
		$statement2->bindValue(':order_status', 'ordered');
		$statement2->bindValue(':order_quantity', $item['quantity']);

		$statement2->execute();
		
	}

	$statement2->closeCursor();
	
}




?>