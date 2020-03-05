<?php
   class customer{
	   private $customerId;
       private $name;
       private $phone;
       private $email;
       private $referrer;
       
       
       
       function __construct($customerId, $name,$phone,$email,$referrer){
		$this->setCustomerId($customerId);
        $this->setName($name);
        $this->setPhone($phone);
        $this->setEmail($email);
        $this->setReferrer($referrer);
       }
       
		function getCustomerId(){
		return $this->customerId;
		}
		public function setCustomerId($customerId){
		$this->customerId = $customerId;
		}
       function getName(){
        return $this->name;
       }
       
       function setName($name){
        $this->name = $name;
       }
    
       function getPhone(){
        return $this->phone;
       }
       
       function setPhone($phone){
        $this->phone = $phone;
       }
     
       function getEmail(){
        return $this->email;
       }
    
       function  setEmail($email){
        $this->email = $email;
       }
       
       function getReferrer(){
        return $this->referrer;
       }
    
       function setReferrer($referrer){
        $this->referrer = $referrer;
       }
    
    
    
   }