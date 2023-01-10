<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">LevelUp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>


                <?php if (isset($user->id)): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Settings
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="user/account.php">Account</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="user/home.php"><?php echo $user->first_name ?></a>
                    </li>

                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>