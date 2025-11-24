<?php 

SESSION_START();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"]==="POST") {
    
    $user_id =  $_SESSION["c_id"];
    $con_id = $_GET["id"];
    $fullname = $_POST["name"];
    $phone_no = $_POST["phone_no"];
    $email = $_POST["email"];
    $address = $_POST["address"];

    $sql = $conn->prepare("update contacts set full_name=?, phone_no=?, email_add=?, address=? where con_id = ? and c_user_id = ?");
    $sql->bind_param("ssssii",$fullname,$phone_no,$email,$address,$con_id,$user_id);

    if ($sql->execute()) {
        
        echo"<script>
        alert('Contact Updated');
        window.location='home.php';
        </script>";
        
    }else{

        echo"<script>alert('Failed To Update')</script>";

    }

}

?>


<!doctype html>
<html lang="en">
    <head>
        <title>Update</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->

            <nav
                class="navbar navbar-expand-sm navbar-light bg-dark p-4"
             >
                <div class="container">
                    <a class="navbar-brand text-success" href="home.php">Contact Manager</a>
                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                </div>
             </nav>

        </header>
        <main>

        <div
            class="container p-3 my-2 text-center"
        >
            <h2>Update Contact</h2>
        </div>
        

        <div
            class="container p-3 my-3 text-center bg-dark col-6 rounded"
        >
        
        <form method="post">

        <div class="form-floating mb-3">
            <input
                type="text"
                class="form-control"
                name="name"
                placeholder=""
                required
            />
            <label for="name">Full Name</label>
        </div>
        
        <div class="form-floating mb-3">
            <input
                type="number"
                class="form-control"
                name="phone_no"
                placeholder=""
                required
            />
            <label for="formId1">Phone Number</label>
        </div>

        <div class="form-floating mb-3">
            <input
                type="text"
                class="form-control"
                name="email"
                placeholder=""
                required
            />
            <label for="email">Email</label>
        </div>

        <div class="form-floating mb-3">
            <input
                type="text"
                class="form-control"
                name="address"
                placeholder=""
                required
            />
            <label for="formId1">Address</label>
        </div>

        <button
            type="submit"
            class="btn btn-success text-dark"
        >
            Update
        </button>
        

        </form>

        </div>
        

        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
