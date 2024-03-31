
  <?php
  session_start();
  
  session_unset(); 
  session_destroy(); 
  session_start(); 
  include("db.php");

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $username = $_POST['username'];
      $password = $_POST['password'];


      if ($username == 'employees') {
          if ($password == 'employees') {
            header("Location: index_employees.php");  
              exit();
          
          }

      }
      $sql = "SELECT * FROM `customers` WHERE `username` = :username";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':username', $username);
      $stmt->execute();

      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($user) {
          
          if ($password === $user['password']) {
             
              $_SESSION['user_id'] = $user['id']; 
              $_SESSION['username'] = $user['username'];
              $_SESSION['flat'] = $user['flat'];
              $_SESSION['street'] = $user['street'];
              $_SESSION['city'] = $user['city'];
              $_SESSION['country'] = $user['country'];
              $_SESSION['telephone'] = $user['telephone'];
              $_SESSION['name'] = $user['name'];

              if (!empty($_SESSION['location'])) {
                header("Location:".$_SESSION['location']);  
                exit();
              }
 

              
              
              header("Location: index.php");  
              exit();
          } else {
              
              $error = "Incorrect password";
          }
      } else {
          
          $error = "Username not found";
      }
  }
?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <style>
            body{
              background-color: #f4e9df;
            }


    </style>
    <title>Document</title>
  </head>
  <body>



    <section>
    <form class="form_signup" method="post" action="login.php" >

    <img class="logo_login"   width="200px" src="images/logo1.png" alt="logo">
    <h2>Sign in to your account</h2>

    <br><br>

     

      <?php if (isset($error)) : ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            
        <input type="username" placeholder="Username" name="username" id="username" required />
        <input type="password" placeholder="Password" name="password"  id="password" required/>
    
      <button type="submit" name="btn_signin" id="btn_signin" class="btn_next">Sign in</button>

      
      
      <p class="signup-link"> No account?<a href="signup.php">Sign up</a><br><br><a href="login_emp.php">Employees account</a></p>
    </form>
  </section>
  </body>
</html>
