<?php
session_start();

$location = $_SESSION['location'] ? $_SESSION['location'] :'';
session_unset(); 
session_destroy(); 

if ($location != '') {

header('location:'.$location);

}

else {
    header('location:index.php');
}
?>