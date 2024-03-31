<!-- footer.php -->

<footer>

    <?php
       

        
        // $name = $_SESSION['name'];
        // $flat = $_SESSION['flat'];
        // $street = $_SESSION['street'];
        // $city = $_SESSION['city'];
        // $country = $_SESSION['country'];
        // $telephone = $_SESSION['telephone'];
        
            // session_start() ;
       

        $name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
        $flat = isset($_SESSION['flat']) ? $_SESSION['flat'] : '';
        $street = isset($_SESSION['street']) ? $_SESSION['street'] : '';
        $city = isset($_SESSION['city']) ? $_SESSION['city'] : '';
        $country = isset($_SESSION['country']) ? $_SESSION['country'] : '';
        $id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
        $telephone = isset($_SESSION['telephone']) ? $_SESSION['telephone'] : '';

            
    
    ?>



    
        <div class="footer-content">
        <!-- <img src="images/logo.png" alt="logo" class="logo"> -->
        <p>&copy; <?php echo date("Y"); ?> Your Website. All rights reserved.</p>
        <p>Address: flat <?php echo $flat; ?>, Street: <?php echo $street; ?></p>
        <p>City: <?php echo $city; ?>, Country: <?php echo $country; ?></p>
        <p> Telephone: <?php echo $telephone; ?></p>
        <a href="contact-us.php">Contact Us</a>
    </div>
</footer>