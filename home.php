<?php 

SESSION_START();
include 'db.php';

$s_id = $_SESSION["c_id"];
$user_name = $_SESSION["c_username"];

$stmt = $conn->prepare("select con_id, full_name, phone_no, email_add, address from contacts where c_user_id = ?");
$stmt->bind_param("i",$s_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Home | Contact Manager</title>
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
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            >
                        </ul>
                        <a
                            name=""
                            id=""
                            class="btn btn-outline-danger"
                            href="logout.php"
                            role="button"
                            >Logout</a
                        >
                        
                    </div>
                </div>
             </nav>
             
             
        </header>
        <main>
            <div
                class="container text-center"
            >
                <h2 class="p-2 my-3 text-dark">Welcome <?php echo $user_name; ?></h2>
            </div>

            <div
                class="container p-4 my-3 col-6 bg-dark rounded "
            >
            
            <form action="insert.php" method="post">

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="fname"
                    placeholder=""
                    required
                />
                <label for="fname">Name</label>
            </div>
            
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="phone"
                    placeholder=""
                    required
                />
                <label for="phone">Phone Number</label>
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
                <label for="address">Address</label>
            </div>

            <button
                type="submit"
                class="btn btn-success"
                
            >
                Add
            </button>

            </form>

            </div>
            
            <div
                class="container"
            >
                <div
                    class="table-responsive"
                >
                    <table
                        class="table table-light table-bordered"
                    >
                        <thead class = "table-dark">
                            <tr>
                                <th scope="col">Contact Id</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Email </th>
                                <th scope="col">Address</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr class="">
                                <td scope="row"><?php echo $row["con_id"] ?></td>
                                <td><?php echo $row["full_name"] ?></td>
                                <td><?php echo $row["phone_no"] ?></td>
                                <td><?php echo $row["email_add"] ?></td>
                                <td><?php echo $row["address"] ?></td>
                                <td> <a
                                    name=""
                                    class="btn btn-primary"
                                    href="update.php?id=<?php echo $row["con_id"]?>"
                                    role="button"
                                    >Update</a
                                >
                                 </td>
                                <td>
                                    <a
                                        name=""
                                        class="btn btn-danger"
                                        href="delete.php?id=<?php echo $row["con_id"]?>"
                                        role="button"
                                        >Delete</a
                                    >
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                
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
