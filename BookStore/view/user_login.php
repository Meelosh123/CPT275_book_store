<?php
session_start();

/*switch ($_SESSION['userAccess']) {
  case '1':
    include 'header_Admin.php';
    break;

  default:
    include 'header_Login.php';
    break;
}
 */ 
?>
<!-- CSS links for W3.CSS **********************  -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<main>
    <div class="w3-panel w3-card-4 w3-center" style="margin: auto;"><h2><?php echo $login_message; ?></h2></div>

    <div class="w3-container w3-center " id="user_login_form" style="width: 350px; margin: 10% auto;">
        
        <div class="w3-card-4" id="user_login_form">
            <div class="w3-container w3-blue-grey">
                <h2>Login</h2>
            </div>
            
            <form class="w3-container w3-center" action="./index.php" method="post">
                <input type="hidden" name="action" value="user_login">
                     
                <label>Email Address:</label></br>
                <input class="w3-input" type="text" id="login"  
                       name="email_addr" />
        
                <label>Password:</label>
                <input class="w3-input" type="password" id="login" 
                       name="password" /></br>
        
                <button class="w3-btn w3-ripple w3-grey" name="subject" type="submit" 
                        style="width:135px" value="Login">Login</button></br>
                        <br>
            </form>
        </div>  
    
    <a href="?action=show_add_user_form">Add New User</a>
</main>
<?php include 'footer.php'; ?>