<?php
require_once('config/connection.php');
    session_start();
    //when user is logged in with session
    if (isset($_SESSION['username'])) {
        
    }else if(isset($_COOKIE['username'])){ //when user is logged with cookies
        
    }else{ //when user is not loggedin
        header("Location: logout.php");
        exit();
    }



$id_conta = $_GET['id'];
$id_cond = $_GET['cond'];
// sql to delete a record
$sql_rmv_conta = "DELETE FROM conta WHERE id_conta='$id_conta'";

if (mysqli_query($conn, $sql_rmv_conta)) {
    header('Location: condominio?id='.$id_cond); 
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>