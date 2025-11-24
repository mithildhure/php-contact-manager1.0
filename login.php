<?php 

SESSION_START();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = $conn->prepare("select c_id, c_pass from c_users where c_username = ?");
    $sql->bind_param("s",$username);
    $sql->execute();
    $sql->store_result();
    $sql->bind_result($c_id, $hash_pass);

    if ($sql->fetch() && password_verify($password,$hash_pass)) {
        $_SESSION["c_id"] = $c_id;
        $_SESSION["c_username"] = $username;
        header("Location:home.php");
    }
    else{
        echo "<script>alert('Incorrect Username or Password')</script>";
    }


}


?>

<!doctype html>
<html lang="en">
    <head>
        <title>Login | Contact Manager</title>
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
            <h2 >Login</h2>
        </div>
        

        <div
            class="container p-4 my-4 text-center col-4 bg-dark rounded"
        >
        
        <form method="post">
            <div class="form-floating mb-3 my-3">
                <input
                    type="text"
                    class="form-control"
                    name="username"
                    placeholder=""
                />
                <label for="email">Username</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    placeholder=""
                />
                <label for="email">Password</label>
            </div>

            <button
                type="submit"
                class="btn btn-success text-dark"
            >
                Submit
            </button>
            

        </form>

        </div>
        
        <div
            class="container text-center"
        >
            <h3>New User ? <a href="register.php" class = "text-success">Register</a></h3>
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
