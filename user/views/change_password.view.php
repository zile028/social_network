<?php require "includes/top.php" ?>
<?php require "includes/navbar.php" ?>
<div class="container">
    <h1 class="text-center py-5"><?php echo $user->first_name ?> Account</h1>
    <div class="row py-5">
        <div class="col-md-2">
            <?php require "includes/sidebar.php" ?>
        </div>
        <div class="col-md-10">
            <form action="user/change_password.php" method="post">
                <?php if (isset($error["old_password"])): ?>
                    <p class="text-danger"><?php echo $error["old_password"] ?></p>
                <?php endif; ?>
                <input type="password" name="old_password" class="form-control mb-3" placeholder="Old password">

                <?php if (isset($error["password"])): ?>
                    <p class="text-danger"><?php echo $error["password"] ?></p>
                <?php endif; ?>
                <input type="password" name="password" class="form-control mb-3" placeholder="New password">

                <?php if (isset($error["repeat_password"])): ?>
                    <p class="text-danger"><?php echo $error["repeat_password"] ?></p>
                <?php endif; ?>
                <input type="password" name="repeat_password" class="form-control mb-3" placeholder="Repeat password">

                <button class="form-control btn btn-primary">Save change</button>
                <?php if (isset($error_msg)): ?>
                    <p class="alert alert-danger mt-3"><?php echo $error_msg ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>

<?php require "includes/bottom.php" ?>
