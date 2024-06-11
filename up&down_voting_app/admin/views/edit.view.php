<section>
    <form action="edit.php" method="post">
        <input type="text" name="title" id="title" placeholder="<?= $alt ?>" value="<?= e( $title ) ?>">
        <input type="hidden" name="id" id="id" value="<?= e( $id ) ?>">
        <input type="submit" value="Save">
    </form>
</section>