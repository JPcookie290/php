
<section>
    <div style="display: flex; flex-direction: row; justify-content: space-between">
        <h2 style="margin: 0">Productlist</h2>
        <a type="button" href="upload.php">Add Product</a>
    </div>
    
    <?php if ( isset( $products ) ) : ?>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Up-Votes</th>
                    <th>Down-Votes</th>
                    <th>Actions</th>
                </tr>
            </thead>
        <?php foreach ( $products as $product ) : ?>
            <tr>
                <td><img style="width: 5rem; border-radius: 5px" src="../<?= e( $product->getSrc() ) ?>" alt="<?= e( $product->title ) ?>"></td>
                <td><?= e( $product->title ) ?></td>
                <td><?= e( $product->up_votes ) ?></td>
                <td><?= e( $product->down_votes ) ?></td>
                <td>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value=<?= e( $product->id ) ?>>
                        <button style="width: 100%">Delete</button>
                        <span style="color: red"><?= $delete_error ?? '' ?></span>
                    </form>
                    <a role='button' href="edit.php?id=<?= e( $product->id ); ?>&title=<?= e( $product->title ); ?>" style="width: 100%">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>There are no products present.</p>
    <?php endif; ?>
</section>