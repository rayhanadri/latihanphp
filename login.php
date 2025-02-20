<?php
include "views/header.php";

session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h1>Please Login</h1>
            </div>
            <div class="card-body">
                <form action="checkLogin.php" method="post">
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
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "views/footer.php";
?>