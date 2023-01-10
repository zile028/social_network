<?php require "includes/top.php" ?>
<?php require "includes/navbar.php" ?>

<div class="container">
    <h1 class="text-center">Login</h1>
    <div class="row">
        <div class="col-6 offset-md-3">
            <form action="login.php" method="post">
                <?php if (isset($error["email"])): ?>
                    <p class="text-danger"><?php echo $error["email"] ?></p>
                <?php endif; ?>
                <input type="email" name="email" class="form-control mb-3" placeholder="Email"
                       value="<?php echo isset($data["email"]) ? $data["email"] : null ?>">

                <?php if (isset($error["password"])): ?>
                    <p class="text-danger"><?php echo $error["password"] ?></p>
                <?php endif; ?>
                <input type="password" name="password" class="form-control mb-3" placeholder="Password">
                <button class="form-control btn btn-primary">Login</button>
                <?php if (isset($error_msg)): ?>
                    <p class="alert alert-danger mt-3"><?php echo $error_msg ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>

<?php require "includes/bottom.php" ?>
