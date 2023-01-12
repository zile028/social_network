<?php require "includes/top.php" ?>
<?php require "includes/navbar.php" ?>
    <div class="container">
        <h1 class="text-center py-5"><?php echo $user->first_name ?> All post</h1>
        <div class="row py-5">
            <div class="col-md-2">
                <?php require "includes/sidebar.php" ?>
            </div>
            <div class="col-md-10">
                <?php foreach ($all_post as $post): ?>
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between">
                            <h3><?php echo $post->title ?></h3>
                            <form action="user/all_post.php" method="post">
                                <input type="hidden" name="public" value="<?php echo $post->public ?>">
                                <input type="hidden" name="id" value="<?php echo $post->id ?>">
                                <button class="btn btn-sm">
                                    <?php echo $post->public ? '<i class="fa-regular fa-eye"></i>' : '<i class="fa-regular fa-eye-slash"></i>' ?>
                                </button>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="col-2 me-3">
                                    <img class="img-fluid" src="<?php echo UPLOAD_DIR . $post->image ?>"
                                         alt="">
                                </div>
                                <div class="col"><?php echo $post->text ?></div>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <a href="user/single_post.php" class="btn btn-sm btn-info">Read more</a>
                            <a href="user/edit_post.php?id=<?php echo $post->id ?>"
                               class="btn btn-sm btn-warning">Edit</a>
                            <p class="btn btn-sm btn-success m-0"><?php echo $post->created_at ?></p>
                            <p class="btn btn-sm btn-primary m-0"><?php echo $post->category ?></p>
                            <p class="btn btn-sm btn-warning m-0"><?php echo $post->first_name . " " . $post->last_name ?></p>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

<?php require "includes/bottom.php" ?>