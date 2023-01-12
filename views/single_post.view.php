<?php require "includes/top.php" ?>
<?php require "includes/navbar.php" ?>
<div class="container">
    <h1 class="text-center py-5">All post</h1>
    <div class="row py-5">
        <div class="col-md-2">
            <?php require "includes/sidebar.php" ?>
        </div>
        <div class="col-md-10">

            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between">
                    <h3><?php echo $post->title ?></h3>
                    <?php echo $post->public ? '<i class="fa-regular fa-eye"></i>' : '<i class="fa-regular fa-eye-slash"></i>' ?>
                </div>
                <div class="card-body">
                    <img class="img-thumbnail w-100" src="<?php echo UPLOAD_DIR . $post->image ?>"
                         alt="">
                    <p><?php echo $post->text ?></p>
                </div>
                <div class="card-footer d-flex align-items-center">
                    <a href="index.php#<?php echo $post->id ?>" class="btn btn-sm btn-info">Back</a>
                    <p class="btn btn-sm btn-warning m-0"><?php echo $post->first_name . " " . $post->last_name ?></p>
                    <p class="btn btn-sm btn-success m-0"><?php echo $post->created_at ?></p>
                    <p class="btn btn-sm btn-primary m-0"><?php echo $post->category ?></p>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<?php require "includes/bottom.php" ?>
