<?php


include_once('header.php');
include_once('dao/customerDAO.php');
require_once('./websiteUser.php');

session_start();
session_regenerate_id(false);

if(isset($_SESSION['AdminID'])){
   if(!$_SESSION['websiteUser']->isAuthenticated()){
      header('Location:login.php'); 
    }
} else {
    header('Location:login.php');
}
$customerDAO = new customerDAO;
$customers = $customerDAO->getCustomers();

echo '<div>'.'SessionID: ' . session_id() .'</div>';
echo '<div>'.'Session AdminID: ' . $_SESSION['AdminID'].'</div>';
if($_SESSION['websiteUser']->getDate()!=null){
echo '<div>'.'Last login date: ' . $_SESSION['websiteUser']->getDate().'</div>';
}else{
echo '<div>'.'The first time to log in' .'</div>';  
}
echo("<button onclick=\"location.href='logout.php'\">Logout!</button>");

if ($customers) {
    echo '<table width = "100%" border = \'2\'>';
    echo '<tr>';
    echo '<th>customer</th>';
    echo '<th>phone number</th>';
    echo '<th>email address</th>';
    echo '<th>referrer</th>';
    echo '</tr>';


    foreach ($customers as $customer) {
        echo '<tr>';
        echo '<td><a href=\'delete.php?customerId='. $customer->getCustomerId() . '\'>'. $customer->getName().'</a></td>';
        echo '<td>' . $customer->getPhone() . '</td>';
        echo '<td>' . $customer->getEmail() . '</td>';
        echo '<td>' . $customer->getReferrer() . '</td>';   
        echo '</tr>';
	}
	
    echo '</table>';
}
else{
		echo '<h3>'.'There is no customer data in the list '.'</h3>';
}

?>

<?php include 'footer.php';?>