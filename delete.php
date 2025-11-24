<?php 

SESSION_START();
include 'db.php';

if (isset($_GET['id'])) {
    
    $con_id = $_GET["id"];
    $user_id = $_SESSION["c_id"];
    
    $sql = $conn->prepare("delete from contacts where con_id = ? and c_user_id = ?");
    $sql->bind_param("ii",$con_id,$user_id);

    if ($sql->execute()) {
        
        echo"<script>
        alert('Contact Deleted');
        window.location='home.php';
        </script>";
        exit();
        
    }else{

        echo"<script>alert('Failed To Delete')</script>";
        exit();
    }

}

?>
