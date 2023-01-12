<?php require "includes/top.php" ?>
<?php require "includes/navbar.php" ?>
    <div class="container">
        <h1 class="text-center py-5"><?php echo $user->first_name ?> Add post</h1>
        <div class="row py-5">
            <div class="col-md-2">
                <?php require "includes/sidebar.php" ?>
            </div>
            <div class="col-md-10">
                <form action="user/edit_post.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="old_image" value="<?php echo $post->image ?>">
                    <input type="hidden" name="id" value="<?php echo $post->id ?>">
                    <?php if (isset($error["title"])): ?>
                        <p class="text-danger"><?php echo $error["title"] ?></p>
                    <?php endif; ?>
                    <input type="text" class="form-control mb-3" name="title" placeholder="Post title"
                           value="<?php echo $post->title ?>">

                    <?php if (isset($error["text"])): ?>
                        <p class="text-danger"><?php echo $error["text"] ?></p>
                    <?php endif; ?>
                    <textarea name="text" class="form-control mb-3" cols="30" rows="10"
                              placeholder="Post text"><?php echo $post->text ?></textarea>

                    <select name="category_id" class="form-control mb-3">
                        <?php foreach ($all_category as $cat): ?>
                            <option value="<?php echo $cat->id ?>"
                                <?php echo $post->category_id === $cat->id ? "selected" : null ?> >
                                <?php echo $cat->category ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <select name="public" class="form-control mb-3">
                        <option value="1" <?php echo $post->public === 1 ? "selected" : null ?>>Public</option>
                        <option value="0" <?php echo $post->public === 0 ? "selected" : null ?>>Private</option>
                    </select>
                    <input type="file" class="form-control mb-3" name="image">
                    <button class="btn btn-primary form-control">Save changes</button>
                </form>
            </div>
        </div>
    </div>

<?php require "includes/bottom.php" ?>