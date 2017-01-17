<?php
	
require ('model/database.php');
require ('model/publisher_db.php');
require ('model/textbook_db.php');
require ('model/course_db.php');
require ('model/user_db.php');
require ('model/inventory_db.php');
require ('model/orders_db.php');
require ('model/cart_db.php');
require ('model/crypt.php');



//starts session if there is none, creates cart
session_set_cookie_params(60 * 30, '/');
session_start();
if (empty($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}


// this gets the action
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
	$action = filter_input(INPUT_GET, 'action');
	if ($action == NULL) {
		$action = 'welcome';

	}
}

// if the user isn't logged in, force the user to login
if (!isset ($_SESSION['is_valid_user'])) {
	if ($action == 'show_add_user_form' ||
		$action == 'add_user') {
		//break;
	} else {
		$action = 'user_login';
	}
}

switch ($action) {
//*********************Login Actions*********************************
	case 'user_login':
		$email_addr = filter_input(INPUT_POST, 'email_addr', FILTER_VALIDATE_EMAIL);                
                $password = filter_input(INPUT_POST, 'password');
                $password = md5($password);
        if (is_valid_user($email_addr, $password)) {
        	$_SESSION['is_valid_user'] = true;
        //if it is a valid user, runs index again.
        	$action = 'welcome';
			header ("Location: index.php?action=$action");
                //Stores user info in session
                $user = get_user_by_email($email_addr);
                $_SESSION['userID'] = $user['userID'];
                $_SESSION['userName'] = $user['userName'];
                $_SESSION['firstName'] = $user['firstName'];
                $_SESSION['lastName'] = $user['lastName'];
                $_SESSION['userTitle'] = $user['userTitle'];
                $_SESSION['phone'] = $user['phone'];               
                $_SESSION['email_addr'] = $email_addr;
                $_SESSION['userAccess'] = $user['userAccess'];
                
        } else {
        	$login_message = 'You must login to view this page.';
        	include('view/user_login.php');
        }

        break;

    case 'show_add_user_form':
    	include('view/user_add.php');
    	break;

    case 'add_user':
    	$user_name = filter_input(INPUT_POST, 'user_name');
    	$user_campus_name = filter_input(INPUT_POST, 'user_campus_name');
    	$user_first_name = filter_input(INPUT_POST, 'user_first_name');
    	$user_last_name = filter_input(INPUT_POST, 'user_last_name');
    	$user_title = filter_input(INPUT_POST, 'user_title');
    	$user_phone = filter_input(INPUT_POST, 'user_phone');
    	$user_email_addr = filter_input(INPUT_POST, 'user_email_addr');
    	$user_password = filter_input(INPUT_POST, 'user_password');
    	//$user_user_access = filter_input(INPUT_POST, 'user_user_access');
        
        //*********Adding user info to session for emails********
        $_SESSION['user_campus_name'] = $user_campus_name;
        $_SESSION['user_first_name'] = $user_first_name;
        $_SESSION['user_last_name'] = $user_last_name;
        $_SESSION['user_title'] = $user_title;
        $_SESSION['user_phone'] = $user_phone;
        $_SESSION['user_email_addr'] = $user_email_addr;

    	//FUTURE: add validation here
		if(	$user_name == null ||
				$user_campus_name == null ||
				$user_first_name == null ||
				$user_last_name == null ||
				$user_title == null ||
				$user_phone == null ||
				$user_email_addr == null ||
				$user_password == null) {

			$error = "Invalid user data.  Check all fields and try again.";
			include('view/error.php');

		} else {
                        //encrypt password
                        $user_password = md5($user_password);
			//add_user method in user_db                        
			add_user($user_name,
				$user_campus_name,
				$user_first_name,
				$user_last_name,
				$user_title,
				$user_phone,
				$user_email_addr,
				$user_password);
                                
                        email_admins();
                        email_new_user();

		$login_message = "New User Added. Please Log In, $user_first_name.";
     	include('view/user_login.php');
		}
		break;

     case 'logout':
     	$_SESSION = array();
     	session_destroy();
     	$login_message = 'You have been logged out.';
     	include('view/user_login.php');
     	break;

	/*case 'user_login_form':
        include('view/user_login.php');
        break;
    case 'user_login':
                $email_Addr = filter_input(INPUT_POST, 'email_Addr', FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, 'password');
                $user = user_login($email_Addr, $password);
                
                
                if ($email_Addr == NULL || $email_Addr == '' &&
                        $password == NULL || $password == '') {
                    $error = "Email and Password required.";
                    include('view/error.php');
                } else if ($email_Addr == $user['emailAddr'] && $password == $user['password']) {
                    
                    $_SESSION['userAccess'] = $user['userAccess'];
                    $action = 'list_publishers';
                    header ("Location: index.php?action=$action");                    
                } else {
                        $error = "Invalid Email or Password. Please try again.";
                        include('view/error.php');
                }
                break;
                
         case 'user_logout':
                 $_SESSION= array();   //Clear all session data from memory
                 session_destroy();    //Clean up the session ID
                 $login_message = 'You have been logged out.';
                 include('view/user_login.php');
                 
                 break;
	*/

//****************** End Login Actions ****************************
//*****************Start User Actions ***********************

    //displays list of users
    case 'list_users':
    	//get_users method in user_db.php
    	$users = get_users();
    	include('view/user_list.php');
    	break;

    case 'show_edit_user_form':
    	//
    	$email = filter_input(INPUT_POST, 'email');
    	$password = filter_input(INPUT_POST, 'password');
    	$user = get_user_record($email, $password);
    	include ('view/user_edit.php');
    	break;

    case 'edit_user':
    	$user_id = filter_input(INPUT_POST, 'user_id');
    	$user_name = filter_input(INPUT_POST, 'user_name');
    	$user_campus_name = filter_input(INPUT_POST, 'user_campus_name');
    	$user_first_name = filter_input(INPUT_POST, 'user_first_name');
    	$user_last_name = filter_input(INPUT_POST, 'user_last_name');
    	$user_title = filter_input(INPUT_POST, 'user_title');
    	$user_phone = filter_input(INPUT_POST, 'user_phone');
    	$user_email_addr = filter_input(INPUT_POST, 'user_email_addr');
    	$user_password = filter_input(INPUT_POST, 'user_password');
    	$user_user_access = filter_input(INPUT_POST, 'user_user_access');

    	//FUTURE: add validation here
		if(	$user_id == null ||
				$user_name == null ||
				$user_campus_name == null ||
				$user_first_name == null ||
				$user_last_name == null ||
				$user_title == null ||
				$user_phone == null ||
				$user_email_addr == null ||
				$user_user_access == null ) {

			$error = "Invalid user data.  Check all fields and try again.";
			include('view/error.php');

		} else {
			//edit_user method in user_db
                        $user_password = md5($user_password);
			edit_user($user_id,
				$user_name,
				$user_campus_name,
				$user_first_name,
				$user_last_name,
				$user_title,
				$user_phone,
				$user_email_addr,
				$user_user_access);

			$action = 'list_users';
			header("Location: index.php?action=$action");
		}
		break;

	case 'delete_user':
		$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);

		if ($user_id == NULL || $user_id == FALSE) {
			$error = "Missing or incorrect user id.";
			include('view/error.php');
		} else {
			//runs the delete_publisher method in publisher_db.php
			delete_user($user_id);
			$action = 'list_users';
			header("Location: index.php?action=$action");
		}
		break;

//*************** Start Publisher Actions******************************
	//displays the list of publishers
	case 'list_publishers':
		//get_publishers method in the publisher_db
		$publishers = get_publishers();
		include('view/publisher_list.php');
		break;

	//displays the publisher_add form
	case 'show_add_publisher_form':
		include ('view/publisher_add.php');
		break;

	//runs the add_publisher method
	case 'add_publisher':
		// get publisher data from form
		$publisher_name = filter_input (INPUT_POST, 'publisher_name');
		$publisher_address = filter_input (INPUT_POST, 'publisher_address');
		$publisher_city = filter_input (INPUT_POST, 'publisher_city');
		$publisher_state = filter_input (INPUT_POST, 'publisher_state');
		$publisher_postal_code = filter_input (INPUT_POST, 'publisher_postal_code');
		$publisher_phone = filter_input (INPUT_POST, 'publisher_phone');
		$publisher_email_addr = filter_input (INPUT_POST, 'publisher_email_addr');

		//FUTURE: add validation here
		if(	$publisher_name == null ||
				$publisher_address == null ||
				$publisher_city == null ||
				$publisher_state == null ||
				$publisher_postal_code == null ||
				$publisher_phone == null ||
				$publisher_email_addr == null ) {

			$error = "Invalid publisher data.  Check all fields and try again.";
			include('view/error.php');

		} else {
			//add_publisher method in the publisher_db
			add_publisher($publisher_name, $publisher_address, $publisher_city,
				$publisher_state, $publisher_postal_code, $publisher_phone,
				$publisher_email_addr);

			$action = 'list_publishers';
			header("Location: index.php?action=$action");
		}
		break;

	//runs the delete_publisher method
	case 'delete_publisher':
		//get publisher_id
		$publisher_id = filter_input (INPUT_POST, 'publisher_id', FILTER_VALIDATE_INT);

		if ($publisher_id == NULL || $publisher_id == FALSE) {
			$error = "Missing or incorrect publisher id.";
			include('view/error.php');
		} else {
			//runs the delete_publisher method in publisher_db.php
			delete_publisher($publisher_id);
			$action = 'list_publishers';
			header("Location: index.php?action=$action");
		}
		break;

	case 'show_edit_publisher_form':
		$publisher_id = filter_input (INPUT_POST, 'publisher_id', FILTER_VALIDATE_INT);

		if ($publisher_id == NULL || $publisher_id == FALSE) {
			$error = "Missing or incorrect publisher id.";
			include('view/error.php');
		} else {
			$publisher = get_publisher_record($publisher_id);
			include ('view/publisher_edit.php');
		}
		break;

	case 'edit_publisher':

	// get publisher data from form
		$publisher_id = filter_input (INPUT_POST, 'publisher_id');
		$publisher_name = filter_input (INPUT_POST, 'publisher_name');
		$publisher_address = filter_input (INPUT_POST, 'publisher_address');
		$publisher_city = filter_input (INPUT_POST, 'publisher_city');
		$publisher_state = filter_input (INPUT_POST, 'publisher_state');
		$publisher_postal_code = filter_input (INPUT_POST, 'publisher_postal_code');
		$publisher_phone = filter_input (INPUT_POST, 'publisher_phone');
		$publisher_email_addr = filter_input (INPUT_POST, 'publisher_email_addr');

		//FUTURE: add validation here
		if(	$publisher_id == NULL ||
				$publisher_name == null ||
				$publisher_address == null ||
				$publisher_city == null ||
				$publisher_state == null ||
				$publisher_postal_code == null ||
				$publisher_phone == null ||
				$publisher_email_addr == null ) {

			$error = "Invalid publisher data.  Check all fields and try again.";
			include('view/error.php');

		} else {
			//edit_publisher method in the publisher_db
			edit_publisher($publisher_id, $publisher_name, $publisher_address, $publisher_city,
				$publisher_state, $publisher_postal_code, $publisher_phone,
				$publisher_email_addr);

			$action = 'list_publishers';
			header("Location: index.php?action=$action");
		}
		break;
//******************  End Publisher Actions ******************************

//****************** Start Textbook Actions ******************************
	case 'list_textbooks':
		//get_textbooks method in the textbook_db
		$textbooks = get_textbooks();
		include('view/textbook_list.php');
		break;

	case 'show_add_textbook_form':
		//get publishers and courses to fill drop down lists in form
		$publishers = get_publishers();
		$courses = get_courses();

		include ('view/textbook_add.php');
		break;

	case 'add_textbook':
		// get publisher data from form
		$publisher_id = filter_input (INPUT_POST, 'publisher_id');
		$course_id = filter_input (INPUT_POST, 'course_id');
		$textbook_title = filter_input (INPUT_POST, 'textbook_title');
		$textbook_author = filter_input (INPUT_POST, 'textbook_author');
		$textbook_edition = filter_input (INPUT_POST, 'textbook_edition');
		$textbook_isbn = filter_input (INPUT_POST, 'textbook_isbn');
		$textbook_cost = filter_input (INPUT_POST, 'textbook_cost');

		//FUTURE: add validation here
		if(	$publisher_id == null ||
				$course_id == null ||
				$textbook_title == null ||
				$textbook_author == null ||
				$textbook_edition == null ||
				$textbook_isbn == null ||
				$textbook_cost == null ) {

			$error = "Invalid TEXTBOOK data.  Check all fields and try again.";
			include('view/error.php');

		} else {
			//add_textbook method in the textbook_db
			add_textbook($publisher_id,
				$course_id,
				$textbook_title,
				$textbook_author, 
				$textbook_edition, 
				$textbook_isbn,
				$textbook_cost);

			$action='list_textbooks';
			header("Location: index.php?action=$action");
		}
		break;

	case 'delete_textbook':
		//get textbook_id
		$textbook_id = filter_input (INPUT_POST, 'textbook_id', FILTER_VALIDATE_INT);

		if ($textbook_id == NULL || $textbook_id == FALSE) {
			$error = "Missing or incorrect textbook id.";
			include('view/error.php');
		} else {
			//runs the delete_textbook method in textbook_db.php
			delete_textbook($textbook_id);
			$action = 'list_textbooks';
			header("Location: index.php?action=$action");
		}
		break;

	case 'show_edit_textbook_form':
		$textbook_id = filter_input (INPUT_POST, 'textbook_id', FILTER_VALIDATE_INT);


		if ($textbook_id == NULL || $textbook_id == FALSE) {
			$error = "Missing or incorrect textbook ID.";
			include('view/error.php');
		} else {
			$textbook = get_textbook_record($textbook_id);
			$publishers = get_publishers();
			$courses = get_courses();
			include ('view/textbook_edit.php');
		}
		break;

	case 'edit_textbook':

	//get textbook data from textbook_edit_form
		$textbook_id = filter_input (INPUT_POST, 'textbook_id', FILTER_VALIDATE_INT);
		$publisher_id = filter_input (INPUT_POST, 'publisher_id');
		$course_id = filter_input (INPUT_POST, 'course_id');
		$textbook_title = filter_input (INPUT_POST, 'textbook_title');
		$textbook_author = filter_input (INPUT_POST, 'textbook_author');
		$textbook_edition = filter_input (INPUT_POST, 'textbook_edition');
		$textbook_isbn = filter_input (INPUT_POST, 'textbook_isbn');
		$textbook_cost = filter_input (INPUT_POST, 'textbook_cost');

		//FUTURE: add validation here
		if($textbook_id == null || $textbook_id == FALSE ||
				$publisher_id == null ||
				$course_id == null ||
				$textbook_title == null ||
				$textbook_author == null ||
				$textbook_edition == null ||
				$textbook_isbn == null ||
				$textbook_cost == null ) {

			$error = "Invalid TEXTBOOK data.  Check all fields and try again.";
			include('view/error.php');
		} else {
			edit_textbook($textbook_id, 
						$publisher_id,
						$course_id,
						$textbook_title,
						$textbook_author,
						$textbook_edition,
						$textbook_isbn,
						$textbook_cost);

			$action='list_textbooks';
			header("Location: index.php?action=$action");
		}
		break;
//*********END Textbook Actions***************************************

//*********Start Course Actions***************************************
	case 'list_courses':
		//get_courses method in course_db.php
		$courses = get_courses();
		include ('view/course_list.php');
		break;

	case 'show_add_course_form':
		//get users?  May need to change course table structure
		$users = get_users();
		include ('view/course_add.php');
		break;

	case 'add_course':
		//get course data from add_course form
		$user_id = filter_input(INPUT_POST, 'user_id');
		$course_instructor = filter_input(INPUT_POST, 'course_instructor');
		$course_name = filter_input(INPUT_POST, 'course_name');
		$course_code = filter_input(INPUT_POST, 'course_code');
		$course_semester = filter_input(INPUT_POST, 'course_semester');
		$course_start_date = filter_input(INPUT_POST, 'course_start_date');

		//Validation
		if ($user_id == NULL ||
			$course_instructor == NULL ||
			$course_name == NULL ||
			$course_code == NULL ||
			$course_semester == NULL ||
			$course_start_date == NULL ) {

			$error = "Invalid COURSE data.  Check all fields and try again.";
			include('view/error.php');
		} else {
			//runs the add_course method in course_db.php
			add_course($user_id,
				$course_instructor,
				$course_name,
				$course_code,
				$course_semester,
				$course_start_date );

			$action = 'list_courses';
			header ("Location: index.php?action=$action");

		}
		break;

	case 'delete_course':

		$course_id = filter_input (INPUT_POST, 'course_id');

		if ($course_id == NULL) {
			$error = "Missing or incorrect course_id.";
			include('view/error.php');
		} else {
			//runs the delete_course method in course_db.php
			delete_course($course_id);

			$action = 'list_courses';
			header("Location: index.php?action=$action");
		}
		break;

	case 'show_edit_course_form':
		$course_id = filter_input (INPUT_POST, 'course_id');


		if ($course_id == NULL) {
			$error = "Missing or incorrect course_id.";
			include('view/error.php');
		} else {
			$course = get_course_record($course_id);
			$users = get_users();

			include ('view/course_edit.php');
		}
		break;

	case 'edit_course':
		//get course data from edit_course form
		$course_id = filter_input(INPUT_POST, 'course_id');
		$user_id = filter_input(INPUT_POST, 'user_id');
		$course_instructor = filter_input(INPUT_POST, 'course_instructor');
		$course_name = filter_input(INPUT_POST, 'course_name');
		$course_code = filter_input(INPUT_POST, 'course_code');
		$course_semester = filter_input(INPUT_POST, 'course_semester');
		$course_start_date = filter_input(INPUT_POST, 'course_start_date');

		//Validation
		if ($course_id == NULL ||
			$user_id == NULL ||
			$course_instructor == NULL ||
			$course_name == NULL ||
			$course_code == NULL ||
			$course_semester == NULL ||
			$course_start_date == NULL ) {

			$error = "Invalid COURSE data.  Check all fields and try again.";
			include('view/error.php');
		} else {
			//runs the edit_course method in course_db.php
			edit_course($course_id,
				$user_id,
				$course_instructor,
				$course_name,
				$course_code,
				$course_semester,
				$course_start_date );

			$action = 'list_courses';
			header ("Location: index.php?action=$action");

		}
		break;

//*********End Course Actions***************************************

//*********Start Inventory Actions***************************************

	case 'list_inventory':
		//get_inventory method in inventory_db.php
		$inventory = get_inventory();
		include ('view/inventory_list.php');
		break;

	case 'show_add_inventory_form':
		//get_textbooks from textbook_db.php
		$textbooks = get_textbooks();
		include ('view/inventory_add.php');
		break;

	case 'add_inventory':
		//get inventory data from add_inventory form
		$textbook_id = filter_input(INPUT_POST, 'textbook_id');
		$inventory_category = filter_input(INPUT_POST, 'inventory_category');
		$inventory_description = filter_input(INPUT_POST, 'inventory_description');
		$inventory_stock_quantity = filter_input(INPUT_POST, 'inventory_stock_quantity');
		$inventory_stock_ordered = filter_input(INPUT_POST, 'inventory_stock_ordered');
		$inventory_reorder_status = filter_input(INPUT_POST, 'inventory_reorder_status');

		//Validation
		if ($textbook_id == NULL ||
			$inventory_category == NULL ||
			$inventory_description == NULL ||
			$inventory_stock_quantity == NULL ||
			$inventory_stock_ordered == NULL ||
			$inventory_reorder_status == NULL ) {

			$error = "Invalid inventory data.  Check all fields and try again.";
			include('view/error.php');
		} else {
			//runs the add_inventory method in inventory_db.php
			add_inventory($textbook_id,
				$inventory_category,
				$inventory_description,
				$inventory_stock_quantity,
				$inventory_stock_ordered,
				$inventory_reorder_status );

			$action = 'list_inventory';
			header ("Location: index.php?action=$action");

		}
		break;

		case 'delete_inventory':
		//gets inventory_id from inventory_list.php
		$inventory_id = filter_input (INPUT_POST, 'inventory_id');

		if ($inventory_id == NULL) {
			$error = "Missing or incorrect inventory_id.";
			include('view/error.php');
		} else {
			//runs the delete_inventory method in inventory_db.php
			delete_inventory($inventory_id);

			$action = 'list_inventory';
			header("Location: index.php?action=$action");
		}
		break;

		case 'show_edit_inventory_form':
		$inventory_id = filter_input (INPUT_POST, 'inventory_id');

		if ($inventory_id == NULL) {
			$error = "Missing or incorrect inventory_id.";
			include('view/error.php');
		} else {
			$inventory = get_inventory_record($inventory_id);
			$textbooks = get_textbooks();

			include ('view/inventory_edit.php');
		}
		break;

		case 'edit_inventory':
		//get inventory data from add_inventory form
		$inventory_id = filter_input(INPUT_POST, 'inventory_id');
		$textbook_id = filter_input(INPUT_POST, 'textbook_id');
		$inventory_category = filter_input(INPUT_POST, 'inventory_category');
		$inventory_description = filter_input(INPUT_POST, 'inventory_description');
		$inventory_stock_quantity = filter_input(INPUT_POST, 'inventory_stock_quantity');
		$inventory_stock_ordered = filter_input(INPUT_POST, 'inventory_stock_ordered');
		$inventory_reorder_status = filter_input(INPUT_POST, 'inventory_reorder_status');

		//Validation
		if ($inventory_id == NULL ||
			$textbook_id == NULL ||
			$inventory_category == NULL ||
			$inventory_description == NULL ||
			$inventory_stock_quantity == NULL ||
			$inventory_stock_ordered == NULL ||
			$inventory_reorder_status == NULL ) {

			$error = "Invalid inventory data.  Check all fields and try again.";
			include('view/error.php');
		} else {
			//runs the add_inventory method in inventory_db.php
			edit_inventory($inventory_id,
				$textbook_id,
				$inventory_category,
				$inventory_description,
				$inventory_stock_quantity,
				$inventory_stock_ordered,
				$inventory_reorder_status );

			$action = 'list_inventory';
			header ("Location: index.php?action=$action");

		}
		break;

//*********EndInventory Actions***************************************

//*********Start Orders Actions***************************************

	case 'list_orders':
		//get_orders method in orders_db.php
		if($_SESSION['userAccess'] == 1 || $_SESSION['userAccess'] == 3) {
                $orders = get_orders();
		include ('view/orders_list.php');
                }
                else {
                $orders = get_orders_by_id($_SESSION['userID']);
                include ('view/orders_list.php');
                }
		break;
                
	case 'delete_order':
		$order_id = filter_input(INPUT_POST, 'order_id');
  $order_id2 = $order_id;
  delete_orderl($order_id);
		delete_order($order_id2);

		$action = 'list_orders';
			header("Location: index.php?action=$action");
		break;

	case 'delete_orderline':
		$order_id = filter_input(INPUT_POST, 'order_id');
		$textbook_id = filter_input(INPUT_POST, 'textbook_id');
		delete_orderline($order_id, $textbook_id);

		$action = 'list_orderline';
			header("Location: index.php?action=$action");
		break;

//*********End Orders Actions***************************************
//*********Start OrderLine Actions**************************

	case 'list_orderline':
		$order_id = filter_input(INPUT_POST, 'order_id');
		$orderline = get_orderline($order_id);
		include ('view/orderline_list.php');
		break;

	case 'add_reorder_to_cart':
		$order_id = filter_input(INPUT_POST, 'order_id');
		$orderline = get_orderline($order_id);
		foreach ($orderline as $o) {
			add_item($o['textbookID'], $o['orderQuantity']);
		}
		include ('view/cart_list.php');
		break;

//************End OrderLine Actions***************************

//****************************************************************
//********Start Shopping Cart Actions**************

	case 'show_add_cart_form':
		$textbooks = get_textbooks_ordered_by_course_code();
		include('view/cart_add.php');
		break;

	case 'add_to_cart':
		$textbook_id = filter_input(INPUT_POST, 'textbook_id');
		$quantity = filter_input(INPUT_POST, 'quantity');
		add_item($textbook_id, $quantity);
		include ('view/cart_list.php');
		break;

	case 'update_cart':
		$new_qty_list = filter_input(INPUT_POST, 'new_quantity',
				FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
		foreach($new_qty_list as $textbook_id => $quantity) {
			if ($_SESSION['cart'][$textbook_id]['quantity'] != $quantity) {
				update_item($textbook_id, $quantity);
			}
		}
		include ('view/cart_list.php');
		break;

	case 'list_cart':
		include ('view/cart_list.php');
		break;

	case 'empty_cart':
		unset($_SESSION['cart']);
		include ('view/cart_list.php');
		break;
	
	case 'make_order':
		make_order();
                
		$action = 'list_orders';
			header ("Location: index.php?action=$action");
                        
                $email_addr = $_SESSION['email_addr'];
                email_user($email_addr);
                
		break;



//**********Welcome Screen***************************************

        case 'welcome':
                include ('view/welcome.php');
} //end switch

?>