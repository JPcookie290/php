<section>
    <?php if ( isset( $products ) ) : ?>
        <?php foreach ( $products as $product ) : ?>
            <div style="display: flex; padding: 1rem">
                <img style="width: 15rem; border-radius: 20px" src="../<?= e( $product->getSrc() ) ?>" alt="<?= e( $product->title ) ?>">
                <div style="margin-left: 3rem">
                    <h2><?= e( $product->title ) ?></h2>
                    <div style="display:flex; felx-direction: row",>
                        <form action="upvote.php" method="post">
                            <input type="hidden" name="id" value=<?= e( $product->id ) ?>>
                            <button style="width: 5rem; margin-right: 2rem">Like</button>
                        </form>
                        <form action="downvote.php" method="post">
                            <input type="hidden" name="id" value=<?= e( $product->id ) ?>>
                            <button style="width: 5rem; background-color: grey">Dislike</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>There are no products present.</p>
    <?php endif; ?>
</section>