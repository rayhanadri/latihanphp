<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    echo "username not set";
    header("Location: login.php");
}

include "crud.php";


include "views/header.php";
?>

<h1>Hello <?php echo (string) $_SESSION['username'] ?></h1>
<a href="logout.php" class="btn btn-secondary">Logout</a>
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                Create New User
            </div>
            <div class="card-body">
                <form action="process_new_user.php" method="post">
                    <div class="form-group">
                        <label for="inputUsername">Username</label>
                        <input type="text" class="form-control" id="inputUsername" name="inputUsername"
                            placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="inputPassword"
                            placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Create User</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Username</th>
                    </tr>
                    <?php
                    $crud = new crud();
                    $res = $crud->showUsers();
                    while ($row = $res->fetch_assoc()) {
                        echo "<tr><td>" . $row["username"] . "</td></tr>";
                    }
                    ?>
                </table>

            </div>
        </div>
    </div>

</div>



<?php
include "views/footer.php";
?>