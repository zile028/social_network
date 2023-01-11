<?php require "includes/top.php" ?>
<?php require "includes/navbar.php" ?>
    <div class="container">
        <h1 class="text-center py-5"><?php echo $user->first_name ?> Add post</h1>
        <div class="row py-5">
            <div class="col-md-2">
                <?php require "includes/sidebar.php" ?>
            </div>
            <div class="col-md-10">
                <form action="user/add_post.php" method="post" enctype="multipart/form-data">

                    <?php if (isset($error["title"])): ?>
                        <p class="text-danger"><?php echo $error["title"] ?></p>
                    <?php endif; ?>
                    <input type="text" class="form-control mb-3" name="title" placeholder="Post title"
                           value="<?php echo isset($data["title"]) ? $data["title"] : null ?>">

                    <?php if (isset($error["text"])): ?>
                        <p class="text-danger"><?php echo $error["text"] ?></p>
                    <?php endif; ?>
                    <textarea name="text" class="form-control mb-3" cols="30" rows="10"
                              placeholder="Post text"><?php echo isset($data["text"]) ? $data["text"] : null ?></textarea>

                    <select name="category_id" class="form-control mb-3">
                        <?php foreach ($all_category as $cat): ?>
                            <option value="<?php echo $cat->id ?>"><?php echo $cat->category ?></option>
                        <?php endforeach; ?>
                    </select>

                    <select name="public" class="form-control mb-3">
                        <option value="1">Public</option>
                        <option value="0">Private</option>
                    </select>
                    
                    <input type="file" class="form-control mb-3" name="image">

                    <button class="btn btn-primary form-control">Add post</button>
                </form>
            </div>
        </div>
    </div>

<?php require "includes/bottom.php" ?>