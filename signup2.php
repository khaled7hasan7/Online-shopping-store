
<?php
    session_start();
    include("db.php"); 

        $name = $_SESSION['name'];
        $flat = $_SESSION['flat'];
        $street = $_SESSION['street'];
        $city = $_SESSION['city'];
        $country = $_SESSION['country'];
        $birth = $_SESSION['birth'];
        $id = $_SESSION['id'];
        $email = $_SESSION['email'];
        $telephone = $_SESSION['telephone'];
        $cardnumber = $_SESSION['cardnumber'];
        $expirationdate = $_SESSION['expirationdate'];
        $cardname = $_SESSION['cardname'];
        $bankissued = $_SESSION['bankissued'];


        $allinfo =$name .'/n'.$flat ;
        $error='' ;

    if (isset($_POST['nextstep2'])) {
       
        $username = $_POST['username'];
        $password = $_POST['password'];

         $confpassword= $_POST['confirmPassword'];

         if ( $password == $confpassword) {

            
             session_unset();
             session_destroy();
            try {
            $sql = "INSERT INTO `customers` 
                    (`name`, `flat`, `street`, `city`, `country`, `birth`, `id`, `email`, `telephone`, `cardnumber`, `expirationdate`, `cardname`, `bankissued`, `username`, `password`) 
                    VALUES (:name, :flat, :street, :city, :country, :birth, :id, :email, :telephone, :cardnumber, :expirationdate, :cardname, :bankissued, :username, :password)";
            $stmt = $conn->prepare($sql);
            
            // Bind parameters
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':flat', $flat);
            $stmt->bindParam(':street', $street);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':birth', $birth);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':cardnumber', $cardnumber);
            $stmt->bindParam(':expirationdate', $expirationdate);
            $stmt->bindParam(':cardname', $cardname);
            $stmt->bindParam(':bankissued', $bankissued);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            
            $stmt->execute();  

            header("Location: login.php");
            exit();
            
            
            }   catch (PDOException $e) {
            
                echo "<section>";
                echo "<h2>Error</h2>";
                echo "<p>There was an error inserting your data into the database. Please try again.</p>";
                echo "<p>Error Message: " . $e->getMessage() . "</p>";
                echo "</section>";
            
            
                }

         }
        else {
            $error= '<h6 class="error_pass">Check the password if it matches</h6>' ;


         }

    }


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">


    <style>
        body{

            background-color: #f4e9df;
        }

    </style>
    <title>Signup_2</title>
</head>
<body>
    


    
    <section>
    
     
        
         <form method="post" class="form_signup" >



                <img class="logo_login"   width="200px" src="images/logo1.png" alt="logo">
                <h2>Signup</h2> 
                <br><br>
                
                <div>
                <label ><?php echo $error ;?> </label>
                <label for="username">Username </label>
                <input type="text" id="username" name="username" pattern=".{6,13}" placeholder="between 6 - 13" required>

                <label for="password">Password :</label>
                <input type="password" id="password" name="password" pattern=".{8,12}" placeholder=" between 8 - 12 " required>

                <label for="confirmPassword">Confirm Password: </label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>

                <button type="submit"   id="nextstep"  name="nextstep2"  onclick="return confirm('Are you sure about this information ?')" >Next</button>
                


                </div>
             </form>
    </section>

</body>
</html>