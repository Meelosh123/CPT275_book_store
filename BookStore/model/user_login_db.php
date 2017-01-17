<?php
//checks for user creds
function user_login($email_Addr, $password) {
	global $db;

	$query = 'SELECT * FROM users
		  WHERE emailAddr = :email_Addr
                  AND password = :password';

	$statement = $db->prepare($query);
	$statement->bindValue(':email_Addr', $email_Addr);
        $statement->bindValue(':password', $password);
	$statement->execute();

	$user = $statement->fetch();
	$statement->closeCursor();
	return $user;
}