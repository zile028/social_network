<?php require "includes/top.php" ?>
<?php require "includes/navbar.php" ?>

<div class="container">
    <h1 class="text-center">Login</h1>
    <div class="row">
        <div class="col-6 offset-md-3">
            <form action="login.php" method="post">
                <input type="email" name="email" class="form-control mb-3" placeholder="Email">
                <input type="password" name="password" class="form-control mb-3" placeholder="Password">
                <button class="form-control btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

<?php require "includes/bottom.php" ?>
