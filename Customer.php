<?php

class Customer {

    private $name  ;
    
    private $flat;
    private $street;
    private  $city ;
    private $country ;
    private $birth ;
    private  $id ;
    private $email ;
    private $telephone ;
    private $cardnumber ;
    private $expirationdate;
    private  $cardname ;
    private  $bankissued ;
    private $username ;
    private $password ;

    

    public function __construct( $name, $flat, $street, $city, $country, $birth, $id, $email, $telephone, $cardnumber, $expirationdate, $cardname, $bankissued,  $username, $password){
        $this->name = $name;
        $this->flat = $flat;
        $this->street = $street;
        $this->city = $city;
        $this->country = $country;
        $this->birth = $birth;
        $this->id = $id;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->cardnumber = $cardnumber;
        $this->expirationdate = $expirationdate;
        $this->cardname = $cardname;
        $this->bankissued = $bankissued;
        $this->username = $username;
        $this->password = $password;

    }
    public function getName(){
        return $this->name;
    }
    public function getFlat(){
        return $this->flat;
    }
    public function getStreet(){
    return $this->street;
    }
    public function getCity(){
        return $this->city;
    }
    public function getCountry(){
        return $this->country;
    }
    public function getBirth(){
        return $this->birth;
    }
    public function getId(){
        return $this->id;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTelephone(){
        return $this->telephone;
    }
    public function getCardnumber(){
        return $this->cardnumber;
    }
    public function getExpirationdate(){
        return $this->expirationdate;
    }
    public function getCardname(){
        return $this->cardname;
    }
    public function getBankissued(){
        return $this->bankissued;
    }
   
    public function getUsername(){
        return $this->username;
    } 
    public function getPassword(){
        return $this->password;
    }


    public function setName($name) {
        $this->name = $name;
    }

    public function setFlat($flat) {
        $this->flat = $flat;
    }

    public function setStreet($street) {
        $this->street = $street;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function setBirth($birth) {
        $this->birth = $birth;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function setCardNumber($cardnumber) {
        $this->cardnumber = $cardnumber;
    }

    public function setExpirationDate($expirationdate) {
        $this->expirationdate = $expirationdate;
    }

    public function setCardName($cardname) {
        $this->cardname = $cardname;
    }

    public function setBankIssued($bankissued) {
        $this->bankissued = $bankissued;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }


  

}





?>