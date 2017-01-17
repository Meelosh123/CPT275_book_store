<?php

//Gets all users
function get_users() {
	global $db;

	$query =	'SELECT *
				FROM users
				ORDER BY userID';

		$statement = $db->prepare($query);
		$statement->execute();
	$users = $statement->fetchAll();
		$statement->closeCursor();

	return $users;
}

function get_user_record($email_addr, $password) {
	global $db;

	$query = 	'SELECT * FROM users
		  		WHERE emailAddr = :email_addr
                AND password = :password';

		$statement = $db->prepare($query);
		$statement->bindValue(':email_addr', $email_addr);
        $statement->bindValue(':password', $password);
		$statement->execute();
	$user = $statement->fetch();
		$statement->closeCursor();
	return $user;
}

function is_valid_user($email_addr, $password) {
	global $db;

	$query =	'SELECT userID
				FROM users
				WHERE emailAddr = :email_addr
					AND password = :password';

		$statement = $db->prepare($query);
		$statement->bindValue(':email_addr', $email_addr);
		$statement->bindValue(':password', $password);
		$statement->execute();
	$valid = ($statement->rowCount() == 1);
		$statement->closeCursor();
	return $valid;	
}

function add_user($user_name,
				$user_campus_name,
				$user_first_name,
				$user_last_name,
				$user_title,
				$user_phone,
				$user_email_addr,
				$user_password) {

	global $db;

	$query = 'INSERT INTO users
				(userName, 
				campusName, 
				firstName, 
				lastName, 
				userTitle, 
				phone, 
				emailAddr, 
				password)
			VALUES
				(:user_name, 
				:user_campus_name, 
				:user_first_name, 
				:user_last_name, 
				:user_title, 
				:user_phone, 
				:user_email_addr, 
				:user_password)';

		$statement = $db->prepare($query);
		$statement->bindValue(':user_name', $user_name);
		$statement->bindValue(':user_campus_name', $user_campus_name);
		$statement->bindValue(':user_first_name', $user_first_name);
		$statement->bindValue(':user_last_name', $user_last_name);
		$statement->bindValue(':user_title', $user_title);
		$statement->bindValue(':user_phone', $user_phone);
		$statement->bindValue(':user_email_addr', $user_email_addr);
		$statement->bindValue(':user_password', $user_password);
		
		$statement->execute();
		$statement->closeCursor();

}

function edit_user($user_id,
				$user_name,
				$user_campus_name,
				$user_first_name,
				$user_last_name,
				$user_title,
				$user_phone,
				$user_email_addr,
				$user_user_access) {

	global $db;

	$query =	'UPDATE users
				SET userName = :user_name,
					campusName = :user_campus_name,
					firstName = :user_first_name,
					lastName = :user_last_name,
					userTitle = :user_title,
					phone = :user_phone,
					emailAddr = :user_email_addr,
					userAccess = :user_user_access
				WHERE userID = :user_id';

	$statement = $db->prepare($query);
		$statement->bindValue(':user_id', $user_id);
		$statement->bindValue(':user_name', $user_name);
		$statement->bindValue(':user_campus_name', $user_campus_name);
		$statement->bindValue(':user_first_name', $user_first_name);
		$statement->bindValue(':user_last_name', $user_last_name);
		$statement->bindValue(':user_title', $user_title);
		$statement->bindValue(':user_phone', $user_phone);
		$statement->bindValue(':user_email_addr', $user_email_addr);
		$statement->bindValue(':user_user_access', $user_user_access);
		$statement->execute();
		$statement->closeCursor();

}

function delete_user($user_id) {
	global $db;

	$query = 'DELETE FROM users
                  WHERE userID = :user_id';

	$statement = $db->prepare($query);
	$statement->bindValue(':user_id', $user_id);
	$statement->execute();
	$statement->closeCursor();

}

function get_user_by_email($email_addr) {
        global $db;
        
        $query = 'SELECT * 
                  FROM users
                  WHERE emailAddr = :email_addr';
                  
        $statement = $db->prepare($query);
        $statement->bindValue(':email_addr', $email_addr);
        $statement->execute();
        $user = $statement->fetch();
        $statement->closeCursor();
	return $user;
}

function email_user($email_addr) {
        $to = $email_addr;
        $subject = "Bookstore Receipt";
        $body = 'Thank you, ' . $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] . '.<br>
                 Your order has been received! <br><br> 
                 Thank you for using the CCKB Bookstore.' ;
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8\r\n";
        $headers .= "From: BookStore <bookstore@cpt275seniorproject.atwebpages.com>\r\n";

        mail($to,$subject,$body,$headers);
        
}

function get_admin() {
        global $db;
        $query = 'SELECT *
                  FROM users
                  WHERE userAccess = 1';
        $statement = $db->prepare($query);
        $statement->execute();
        $admins = $statement->fetchAll();
        $statement->closeCursor();
        return $admins;
}

function email_admins() {
        /*$admins = get_admin();
        foreach($admins as $admin) {
                $to = $admin['emailAddr'];
                $subject = "NEW USER";
                $body = "A new account has been made by <br><br>
                         Name- " . $_SESSION['user_first_name'] . " " . $_SESSION['user_last_name'] . "<br>
                         Title- " . $_SESSION['user_title'] . "<br>
                         Campus- " . $_SESSION['user_campus_name'] . "<br>
                         Phone- " . $_SESSION['user_phone'] . "<br>
                         E-mail Address- " . $_SESSION['user_email_addr'] . "<br><br>
                         Please validate and set user access accordingly.";
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8\r\n";
                $headers .= "From: BookStore <bookstore@cpt275seniorproject.atwebpages.com>\r\n";

                mail($to,$subject,$body,$headers);
        }*/
                //$to = "cooperjm@my.gvltec.edu, braggca@my.gvltec.edu";
                $to = "cankurtse@my.gvltec.edu";
                $subject = "NEW USER";
                $body = "A new account has been made by <br><br>
                         Name- " . $_SESSION['user_first_name'] . " " . $_SESSION['user_last_name'] . "<br>
                         Title- " . $_SESSION['user_title'] . "<br>
                         Campus- " . $_SESSION['user_campus_name'] . "<br>
                         Phone- " . $_SESSION['user_phone'] . "<br>
                         E-mail Address- " . $_SESSION['user_email_addr'] . "<br><br>
                         Please validate and set user access accordingly.";
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8\r\n";
                $headers .= "From: BookStore <bookstore@cpt275seniorproject.atwebpages.com>\r\n";

                mail($to,$subject,$body,$headers);
}

function email_new_user() {
        $to = $_SESSION['user_email_addr'];
        $subject = "CCKB Bookstore Account";
        $body = 'Thank you, ' . $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] . '.<br>
                 Your new account request has been received! <br>
                 Please wait while your account is validated. <br><br>
                 Thank you for using the CCKB Bookstore.' ;
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8\r\n";
        $headers .= "From: BookStore <bookstore@cpt275seniorproject.atwebpages.com>\r\n";

        mail($to,$subject,$body,$headers);
}

?>