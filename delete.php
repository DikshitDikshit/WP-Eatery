<?php
require_once('dao/customerDAO.php'); 
?>
<?php
if(!isset($_GET['customerId']) || !is_numeric($_GET['customerId'])){
//Send the user back to the main page

header("Location: mailing_List.php");
exit;

} else{
    $customerDAO = new customerDAO();
    $customer = $customerDAO->getCustomer($_GET['customerId']);
    if($customer){
?>    
        
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Week 11 delete customer - <?php echo $customer->getName();?></title>
    </head>
    <body>
        
        <?php
        if(isset($_GET['recordsUpdated'])){
                if(is_numeric($_GET['recordsUpdated'])){
                    echo '<h3> '. $_GET['recordsUpdated']. ' Customer Record Updated.</h3>';
                }
        }
        if(isset($_GET['missingFields'])){
                if($_GET['missingFields']){
                    echo '<h3 style="color:red;"> Please enter all the information.</h3>';
                }
        }?>
        <h3>Edit Customer</h3>
        <form name="editCustomer" method="post" action="process_customer.php?action=edit">
			<input type="hidden" name="customerId" value="<?php echo $customer->getCustomerId();?>">
		
            <table>
                <tr>
                    <td>Name:</td>
					<td><input type="text" name="customerName" id="customerName"
					value="<?php echo $customer->getName();?>"></td>
                </tr>
                <tr>
                    <td>Phone number:</td>
                    <td><input type="text" name="phoneNumber" id="phoneNumber" 
					value="<?php echo $customer->getPhone();?>"></td>
                </tr>
                <tr>
                    <td>Email:</td>
					<td><input type="text" name="emailAddress" id="emailAddress"
					value="<?php echo $customer->getEmail();?>"></td>
                    
                </tr>
                <tr>
                    <td>referrer:</td>
                    <td>Newspaper<input type="radio" name="referral" id="referralNewspaper" value="newspaper">
						Radio<input type="radio" name='referral' id='referralRadio' value='radio'>
						TV<input type='radio' name='referral' id='referralTV' value='TV'>
                        Other<input type='radio' name='referral' id='referralOther' value='other'>
						<input type='text' name='referral' id='referralOther' value="<?php echo $customer->getReferrer();?>"></td>
                </tr>
                <tr>
                    <td cospan="2"><a href="process_customer.php?action=delete&customerId=<?php echo $customer->getCustomerId();?>">DELETE </a></td>
                </tr>
				<tr>
                    <td><input type="submit" name="btnSubmit" id="btnSubmit" value="Update Customer"></td>
                    <td><input type="reset" name="btnReset" id="btnReset" value="Reset"></td>
                </tr>
                
            </table>
        </form>
        <h4><a href="mailing_list.php">Back to main page</a></h4>
    </body>
</html>
<?php } else{
//Send the user back to the main page
header("Location: mailing_list.php");
exit;
}

} ?>