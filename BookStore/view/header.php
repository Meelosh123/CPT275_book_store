<!-- header file --> 

<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
        <link rel="shortcut icon" href="favicon.ico"/ >
	<title>CCKB Bookstore Application</title>
	<!-- FUTURE:  create external CSS **********************  -->
        <!-- CSS links for W3.CSS **********************  -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
        
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<!-- the body section -->
<body>
	<header>
		<div class="w3-panel w3-card-4 w3-center w3-border" style="margin: auto; 
                text-shadow: 0 1px 0 #ccc, 
               0 2px 0 #c9c9c9,
               0 3px 0 #bbb,
               0 4px 0 #b9b9b9,
               0 5px 0 #aaa,
               0 6px 1px rgba(0,0,0,.1),
               0 0 5px rgba(0,0,0,.1),
               0 1px 3px rgba(0,0,0,.3),
               0 3px 5px rgba(0,0,0,.2),
               0 5px 10px rgba(0,0,0,.25),
               0 10px 10px rgba(0,0,0,.2),
               0 20px 20px rgba(0,0,0,.15);"><h1>CCKB Bookstore</h1></div>
	</header>

	<!--11/01/2016 -->
	<aside>
                <?php if ($_SESSION['userAccess'] == 0): ?>
                <ul class="w3-navbar w3-grey">
                        <li><a class="w3-hover-none w3-text-white w3-hover-text-light-blue" href="?action=logout">Log Out</a></li>
                </ul>
                <?php endif; ?>
                
                <?php if ($_SESSION['userAccess'] == 1): ?>
                <ul class="w3-navbar w3-grey">
                        <li><a class="w3-hover-none w3-text-white w3-hover-text-light-blue" href="?action=show_add_cart_form">Make an Order!</a></li>
                        <li><a class="w3-hover-none w3-text-white w3-hover-text-light-blue" href="?action=list_publishers">View Publisher List</a></li>
                        <li><a class="w3-hover-none w3-text-white w3-hover-text-light-blue" href="?action=list_textbooks">View Textbook List</a></li>
                        <li><a class="w3-hover-none w3-text-white w3-hover-text-light-blue" href="?action=list_courses">View Course List</a></li>
                        <li><a class="w3-hover-none w3-text-white w3-hover-text-light-blue" href="?action=list_inventory">View Inventory List</a></li>
                        <li><a class="w3-hover-none w3-text-white w3-hover-text-light-blue" href="?action=list_orders">View Orders List</a></li>
                        <?php if ($_SESSION['email_addr'] == 'cooperjm@my.gvltec.edu' || $_SESSION['email_addr'] == 'braggca@my.gvltec.edu' 
                        || $_SESSION['email_addr'] = 'testadmin@test.com'): ?>
                        <li><a class="w3-hover-none w3-text-white w3-hover-text-light-blue" href="?action=list_users">View Users List</a></li>
                        <?php endif; ?>
                        <li><a class="w3-hover-none w3-text-white w3-hover-text-light-blue" href="?action=logout">Log Out</a></li>
                 </ul>
                 <?php endif; ?>
                 
                 <?php if ($_SESSION['userAccess'] == 2): ?>
                 <ul class="w3-navbar w3-grey">
                        <li><a class="w3-hover-none w3-text-white w3-hover-text-light-blue" href="?action=show_add_cart_form">Make an Order!</a></li>
                        <li><a class="w3-hover-none w3-text-white w3-hover-text-light-blue" href="?action=list_orders">View Orders List</a></li>
                        <li><a class="w3-hover-none w3-text-white w3-hover-text-light-blue" href="?action=logout">Log Out</a></li>
                 </ul>
                 <?php endif; ?>
                 
                 <?php if ($_SESSION['userAccess'] == 3): ?>
                 <ul class="w3-navbar w3-grey">                        
                        <li><a class="w3-hover-none w3-text-white w3-hover-text-light-blue" href="?action=list_orders">View Orders List</a></li>
                        <li><a class="w3-hover-none w3-text-white w3-hover-text-light-blue" href="?action=list_inventory">View Inventory List</a></li>
                        <li><a class="w3-hover-none w3-text-white w3-hover-text-light-blue" href="?action=logout">Log Out</a></li>
                 </ul>
                 <?php endif; ?>
                 
	</aside>

<!-- end header.php -->