<?php 
SESSION_START();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"]==="POST") {
    
    $i_user_id = $_SESSION["c_id"];
    $f_name = $_POST["fname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];

    $sql = $conn->prepare("insert into contacts(c_user_id, full_name, phone_no, email_add, address) values(?,?,?,?,?)");
    $sql->bind_param("issss",$i_user_id,$f_name,$phone,$email,$address);

    if($sql->execute()){
        echo("<script>
        alert('Contact Inserted Succesfully');
        window.location='home.php';
        </script>");
        
        exit();
    }else {
        echo("<script>alert('Failed to add contact')</script>");
    }


}


?>