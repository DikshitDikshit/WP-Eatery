<?phprequire_once('dao/customerDAO.php');?>	<?php	if(isset($_GET['action'])){			if($_GET['action'] == "edit"){        if(isset($_POST['customerId']) &&                 isset($_POST['customerName']) &&                 isset($_POST['phoneNumber'])&&				isset($_POST['emailAddress'])&&				isset($_POST['referral'])){                if(is_numeric($_POST['customerId']) &&                ($_POST['customerName'] != "") &&                ($_POST['phoneNumber'] != "") &&				($_POST['emailAddress'] != "") &&				($_POST['referral'] != ""))				{                                   $customerDAO = new customerDAO();                $result = $customerDAO->editCustomer($_POST['customerId'],                         $_POST['customerName'], 						$_POST['phoneNumber'], 						$_POST['emailAddress'], 						$_POST['referral']);                                if($result > 0){                    header('Location:delete.php?recordsUpdated='.$result.'&customerId=' . $_POST['customerId']);                } else {                    header('Location:delete.php?customerId=' . $_POST['customerId']);                }            } else {                header('Location:delete.php?missingFields=true&customerId=' . $_POST['customerId']);            }        } else {            header('Location:delete.php?error=true&customerId=' . $_POST['customerId']);        }    }		if($_GET['action'] == "delete"){        if(isset($_GET['customerId']) && is_numeric($_GET['customerId'])){            $customerDAO = new customerDAO();            $success = $customerDAO->deleteCustomer($_GET['customerId']);			            if($success){                header('Location:mailing_list.php?deleted=true');            } else {                header('Location:mailing_list.php?deleted=false');            }        }	}}