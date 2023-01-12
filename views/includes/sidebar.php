<ul class="list-group">
    <li class="list-group-item"><a href="index.php">All posts</a></li>
    <li class="list-group-item">Category</li>
    <?php foreach ($all_category as $cat) : ?>
        <li class="list-group-item"><a href="user/add_post.php"><?php echo $cat->category ?></a></li>
    <?php endforeach; ?>
</ul>