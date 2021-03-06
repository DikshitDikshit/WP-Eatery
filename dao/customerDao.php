<?php
require_once ('abstractDao.php');
require_once ('./model/customer.php');

 class customerDao extends abstractDao {
    
    function __construct() {
        try{
             parent::__construct() ;
        } catch (mysqli_sql_exception $e){
            throw $e;
        }        
    }
 
   public function getCustomers(){
    $result = $this->mysqli->query('SELECT * FROM mailinglist');
    $customers = array();
    
    if($result->num_rows >= 1){
        while( $row = $result->fetch_assoc()){
            $customer = new customer($row['_id'],$row['customerName'],$row['phoneNumber'],$row['emailAddress'],$row['referrer']);
            $customers[] = $customer;
        }
        $result->free();
        return $customers;
    }
    
        $result->free();
        return false;    
   }
   
   
   public function getID(){
      $result = $this->mysqli->query('SELECT * FROM mailinglist');
      $ID = array();
      
      if($result->num_rows >= 1){
        while( $row = $result->fetch_assoc()){
           $id=$row['_id'];
           $ID[]=$id;
        }           
        $result->free();
        return $ID;
    }
        $result->free();
        return false;
   }
 
   
   public function getCustomer($id){
    $query = 'SELECT * FROM mailinglist WHERE _id = ?';
    $stmt = $this->mysqli->prepare($query);
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 1){
        $temp = $result->fetch_assoc();
        $customer = new customer($temp['_id'],$temp['customerName'],$temp['phoneNumber'],$temp['emailAddress'],$temp['referrer']);
        $result->free();
        return $customer;
    }
        $result->free();
        return false;   
   }
   
   
   
   public function addCustomer($customer){
      if(!$this->mysqli->connect_errno){
        $query = 'INSERT INTO mailinglist (customerName,phoneNumber,emailAddress,referrer) values (?,?,?,?)';
        $stmt = $this->mysqli->prepare($query);
        $name=$customer->getName();
        $phone=$customer->getPhone();
        $email=$customer->getEmail();
        $ref=$customer->getReferrer();
        $stmt->bind_param('ssss',$name,$phone,$email,$ref);
        //$stmt->bind_param('siss',$customer->getName(),$customer->getPhone(),$customer->getEmail(),$customer->getReferrer());
        $stmt->execute();
        if($stmt->error){
            return $stmt->error;
        }else {
            return '<span style=\'color:red\'>' . $customer->getName().' signed up successfully' . '</span>';
            //return echo '<h3>'.'Signed up successfully'.'</h3>';
        }
      }else{
        return 'Could not connect to Database.';
      }
   }
   
   	public function deleteCustomer($_id){
        if(!$this->mysqli->connect_errno){
            $query = 'DELETE FROM mailingList WHERE _id = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('i', $_id);
            $stmt->execute();
            if($stmt->error){
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
    public function editCustomer($_id, $customerName, $phoneNumber, $emailAddress, $referrer){
        if(!$this->mysqli->connect_errno){
            $query = 'UPDATE mailingList SET customerName = ?, phoneNumber = ?, emailAddress = ?, referrer = ? WHERE _id = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('ssssi', $customerName, $phoneNumber, $emailAddress, $referrer, $_id);
            $stmt->execute();
            if($stmt->error){
                return false;
            } else {
                return $stmt->affected_rows;
            }
        } else {
            return false;
        }
    }
   
   public function duplicateEmail($emailAddress){     
      if(!$this->mysqli->connect_errno){
         $result = $this->mysqli->query('SELECT emailAddress FROM mailinglist');
         $email = array();   
         if($result->num_rows >= 1){
            while( $row = $result->fetch_assoc()){
               $email[] = $row['emailAddress'];
            }
            $result->free();
         }
        foreach( $email as $value){
          $hash = $value;
          if(password_verify($emailAddress,$hash)){
            return true;
          } 
        }
          return false;
       }
       return false;
   }

 
 
 }