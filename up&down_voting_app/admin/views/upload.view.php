<section>
    <h2>Add Products:</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="image">Product Image</label>
        <?php if ( $error ?? '' ): ?>
            <div style="background-color: lightcoal; padding: 5px" ><?= $erro ?></div>
        <?php endif; ?>
        <input type="file" name="image" id="image" accept="image/jpeg, image/jpg, image/png">
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <input type="submit" value="Upload">
    </form>
</section>