<?php

     require("db.php");
  
    session_start();
    if (isset($_POST['nextstep'])) {


          $name = $_POST['name'];
          $flat = $_POST['flat'];
          $street = $_POST['street'];
          $city = $_POST['city'];
          $country = $_POST['country'];
          $birth = $_POST['birth'];
          $id = $_POST['id'];
          $email = $_POST['email'];
          $telephone = $_POST['telephone'];
          $cardnumber = $_POST['cardnumber'];
          $expirationdate = $_POST['expirationdate'];
          $cardname = $_POST['cardName'];
          $bankissued = $_POST['bankissued'];

              $_SESSION['name'] = $name;
              $_SESSION['flat'] = $flat;
              $_SESSION['street'] = $street;
              $_SESSION['city'] = $city;
              $_SESSION['country'] = $country;
              $_SESSION['birth'] = $birth;
              $_SESSION['id'] = $id;
              $_SESSION['email'] = $email;
              $_SESSION['telephone'] = $telephone;
              $_SESSION['cardnumber'] = $cardnumber;
              $_SESSION['expirationdate'] = $expirationdate;
              $_SESSION['cardname'] = $cardname;
              $_SESSION['bankissued'] = $bankissued;

             header("Location: signup2.php");
             die();


    }
  
    
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #f4e9df;
        }

        </style>

    <title>signup</title>
  </head>
  <body>


    <section>
   
      <form class="form_signup" method="post" >

    
      <img class="centerlogo"  width="200px" src="images/logo1.png" alt="logo">
      <h2>Signup</h2>
      
      <div>
      <br><br>
        
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required />

        <br><br>
        <label for="address">Address:</label>

        <input type="text"  id="flat" name="flat" placeholder="Flat/House No" required />
        <input type="text"id="street" name="street" placeholder="Street" required />
        <input type="text" id="city" name="city" placeholder="City" required />
        <input type="text" id="country"name="country" placeholder="Country"  required />

        <br><br>

        <label for="birth">Date of Birth:</label>
        <input type="date" id="birth" name="birth" required />
        <br><br>


        <label for="id">ID Number:</label>
        <input type="text" id="id" name="id"required  />
        <br><br>

        <label for="email">E-mail Address:</label>
        <input type="email" id="email" name="email" required />
        <br><br>

        <label for="telephone">Telephone:</label>
        <input type="tel" id="telephone" name="telephone" required />
        <br><br>

        <label for="creditCard">Credit Card Details:</label>
        <input  type="text"  id="cardnumber"  name="cardnumber" placeholder="Card Number"  required />

        <input type="text" id="expirationdate" name="expirationdate" placeholder="Expiration Date" required />

        <input  type="text"id="cardName" name="cardName" placeholder="Cardholder Name" required  />

        <input type="text" id="bankissued" name="bankissued" placeholder="Bank Issued"  required />

        <br><br>

        <button type="submit" name="nextstep" id="nextstep">Next</button>

        <br><br>
         
        </div>
      
      </form>
    </section>
  </body>
</html>
