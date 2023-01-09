<?php require "includes/top.php" ?>
<?php require "includes/navbar.php" ?>

<div class="container">
    <h1 class="text-center">Register</h1>
    <div class="row">
        <div class="col-6 offset-md-3">
            <form action="register.php" method="post">
                <?php if (isset($error["first_name"])): ?>
                    <p class="text-danger"><?php echo $error["first_name"] ?></p>
                <?php endif; ?>

                <input type="text" name="first_name" class="form-control mb-3" placeholder="First name"
                       value="<?php echo isset($data["first_name"]) ? $data["first_name"] : null ?>"
                >

                <?php if (isset($error["last_name"])): ?>
                    <p class="text-danger"><?php echo $error["last_name"] ?></p>
                <?php endif; ?>
                <input type="text" name="last_name" class="form-control mb-3" placeholder="Last name"
                       value="<?php echo isset($data["last_name"]) ? $data["last_name"] : null ?>">

                <select name="gender" class="form-control mb-3">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>

                <?php if (isset($error["email"])): ?>
                    <p class="text-danger"><?php echo $error["email"] ?></p>
                <?php endif; ?>
                <input type="email" name="email" class="form-control mb-3" placeholder="Email"
                       value="<?php echo isset($data["email"]) ? $data["email"] : null ?>">

                <?php if (isset($error["password"])): ?>
                    <p class="text-danger"><?php echo $error["password"] ?></p>
                <?php endif; ?>
                <input type="password" name="password" class="form-control mb-3" placeholder="Password">

                <?php if (isset($error["repeat_password"])): ?>
                    <p class="text-danger"><?php echo $error["repeat_password"] ?></p>
                <?php endif; ?>
                <input type="password" name="repeat_password" class="form-control mb-3" placeholder=" Repeat password">
                <button class="form-control btn btn-primary">Register</button>
                <?php if (isset($Users->err_msg)): ?>
                    <p class="alert alert-danger mt-3"><?php echo $Users->err_msg ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>

<?php require "includes/bottom.php" ?>
