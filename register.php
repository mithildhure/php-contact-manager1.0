<?php 
include 'db.php';

if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"],PASSWORD_DEFAULT);

    $sql = $conn->prepare("insert into c_users(c_email, c_username, c_pass) values(?,?,?)");
    $sql->bind_param("sss",$email,$username,$password);
    
    if ($sql->execute()) {
        echo "<script>
        alert('Registered Succesfully');
        window.location='login.php';
        </script>";
    }else{
        echo"<script>alert('Error occured while registration')</script>";
    }

}

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Register | Contact Manager</title>
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
             <h2 class="text-center text-success bg-dark p-4">Contact Manager</h2>
        </header>
        <main>

        <div
            class="container text-center my-3"
        >
            <h2 >Register</h2>
        </div>
        

        <div
            class="container p-4 my-4 text-center col-4 bg-dark rounded"
        >
        
        <form method="post">
        
        <div class="form-floating mb-3 my-3">
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    placeholder=""
                    required
                />
                <label for="email">Email</label>
            </div>
        
        <div class="form-floating mb-3 my-3">
                <input
                    type="text"
                    class="form-control"
                    name="username"
                    placeholder=""
                    required
                />
                <label for="email">Username</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    placeholder=""
                    required
                />
                <label for="email">Password</label>
            </div>

            <button
                type="submit"
                class="btn btn-success text-dark "
            >
                Submit
            </button>
            

        </form>

        </div>
        
        <div
            class="container text-center"
        >
            <h3>Already Registered ? <a href="login.php" class = "text-success">Login</a></h3>
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
