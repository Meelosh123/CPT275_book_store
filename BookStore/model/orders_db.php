<?php

//gets all orders
function get_orders() {
	global $db;

	$query =	'SELECT *
				FROM orders
                                INNER JOIN users
                                ON orders.userID = users.userID
				ORDER BY orderID DESC';

		$statement = $db->prepare($query);
		$statement->execute();

	//fills $orders with array
	$orders = $statement->fetchAll();
		$statement->closeCursor();
	return $orders;
}

function get_orders_by_id($user_id) {
        global $db;

	$query =	'SELECT *
				FROM orders
                                INNER JOIN users
                                ON orders.userID = users.userID
                                WHERE orders.userID = :user_id
				ORDER BY orderID';

		$statement = $db->prepare($query);
                $statement->bindValue(':user_id', $user_id);
		$statement->execute();

	//fills $orders with array
	$orders = $statement->fetchAll();
		$statement->closeCursor();
	return $orders;
}

function get_order_id_at_time($date) {
	global $db;

	$query =	'SELECT *
				FROM orders
				WHERE orderDate = :order_date';

		$statement = $db->prepare($query);
		$statement->bindValue(':order_date', $date);
		$statement->execute();

	//fills $orders with array
	$order = $statement->fetch();
		$statement->closeCursor();
	return $order['orderID'];

}

function delete_orderl($order_id) {
	global $db;

 //Deletes order with $order_id
	//$query2 =	'DELETE FROM orders
           // WHERE orderID = :order_id';

		//$statement2 = $db->prepare($query2);
		//$statement2->bindValue(':order_id', $order_id);
		//$statement2->execute();
		//$statement2->closeCursor();
        
	//Deletes orderLine with $order_id
	$query1 =	'DELETE FROM orderLine
				        WHERE orderID = :order_id';

		$statement1 = $db->prepare($query1);
		$statement1->bindValue(':order_id', $order_id);
		$statement1->execute();
		$statement1->closeCursor();
}
	//Deletes order with $order_id
function delete_order($order_id) {	
        $query2 =	'DELETE FROM orders
                   WHERE orderID = :order_id';

		$statement2 = $db->prepare($query2);
		$statement2->bindValue(':order_id', $order_id);
		$statement2->execute();
		$statement2->closeCursor();

}

function delete_orderline($order_id, $textbook_id) {
	global $db;

	//Deletes orderLine with $order_id and $textbook_id
	$query1 =	'DELETE FROM orderLine
			WHERE orderID = :order_id
                                AND textbookID = :textbook_id';

		$statement1 = $db->prepare($query);
		$statement1->bindValue(':order_id', $order_id);
		$statement1->bindValue(':textbook_id', $textbook_id);
		$statement1->execute();
		$statement1->closeCursor();

}

function get_orderline($order_id) {
	global $db;

	$query =	'SELECT *
				FROM orderLine
                                INNER JOIN textbooks
                                ON orderLine.textbookID = textbooks.textbookID
				WHERE orderID = :order_id
                                ORDER BY orderID';

		$statement = $db->prepare($query);
		$statement->bindValue(':order_id', $order_id);
		$statement->execute();

	//fills $orderline with array
	$orderline = $statement->fetchall();
		$statement->closeCursor();
	return $orderline;
}

?>