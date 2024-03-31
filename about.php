<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about us</title>
    <link rel="stylesheet" href="styles.css">
</head>


<body>

<?php
    include 'header.php';
    session_start();
    $_SESSION['location']="about.php";
?>
    
    
   


    <main class="about">
        <img class="about-img" src="images/khaled.jpg" alt="Khaled Hasan Omar Image">

           

        </div>
        
        <div class="about-text">
            
            <h2>Khaled Hasan Omar</h2>

                <br><br><br>

            

            <p>My name is Khaled Hassan. I study at Birzeit University, specializing in computer science. I am interested in creating projects for the web: html, css, php, and other programming languages. You can contact me via Facebook or Instagram, or you can view some private projects on the GitHub platform at the end of the page.</p>
            <p>I am in charge of the project alone, including its pages and features .</p>
            <p>I am the one responsible for the project alone, including its pages and features. This project is considered the final project for COMP 334. I hope you liked it.</p>





            <div class="layout_send_email">


                    <form class="send_email_form" method="post" action="send_email.php">
                        <h3 class="Contact_h3" >Send Message</h3>

                        <label for="email_to_send">Email Adress</label>
                        <input name="email_to_send" type="email" required > 
                        <br><br>
                        <label for="message_to_send">Message</label>
                        <textarea required name="message_to_send" ></textarea>  


                        <button type="submit"  name="btn_to_send_email" id="btn_to_send_email" class="btn_to_send_email">Submit</button>


                    </form>


            </div>

            








            
                <div class="links">

                <a href="https://www.facebook.com/profile.php?id=100003128722409&mibextid=LQQJ4d"><img src="images/facebook-logo.png" alt="facebook-logo"></a> 

                <a href="https://www.instagram.com/khaled7hasan7/?fbclid=IwAR3vHCpHKLOD14C8nwktymileXYeUaSAjea4-Zwdv9qSb8jK619u4lfo3sk"><img src="images/instagram.png" alt="facebook-logo"></a> 

                <a href="https://github.com/khaled7hasan7"><img src="images/gethub-logo.png" alt="facebook-logo"></a>


                </div>


        </div>
        
        
  












  </main>




    <?php
        include 'footer.php';
    ?>




</body>
</html>