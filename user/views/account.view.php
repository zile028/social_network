<?php require "includes/top.php" ?>
<?php require "includes/navbar.php" ?>
    <div class="container">
        <h1 class="text-center py-5"><?php echo $user->first_name ?> Account</h1>
        <div class="row py-5">
            <div class="col-md-2">
                <?php require "includes/sidebar.php" ?>
            </div>
            <div class="col-md-10">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $user->first_name . " " . $user->last_name ?>
                        <a href="user/change_name.php"
                           class="btn btn-sm btn-warning float-end">CHANGE</a>
                    </li>

                    <li class="list-group-item"><?php echo $user->email ?></li>
                    <li class="list-group-item">Password
                        <a href="user/change_password.php"
                           class="btn btn-sm btn-warning float-end">CHANGE</a>
                    </li>

                    <li class="list-group-item">
                        <?php echo $user->gender; ?>
                        <a href="user/change_gender.php?gender=<?php echo $user->gender ?>"
                           class="btn btn-sm btn-warning float-end">CHANGE</a>

                    </li>
                    <li class="list-group-item"><?php echo $user->role ?></li>
                    <li class="list-group-item"><?php echo $user->created_at ?></li>
                    <li class="list-group-item"><?php echo $user->update_at ?></li>
                </ul>
            </div>
        </div>
    </div>

<?php require "includes/bottom.php" ?>