<section>
    <?php if ( isset( $products ) ) : ?>
        <?php foreach ( $products as $product ) : ?>
            <div style="display: flex; padding: 1rem">
                <img style="width: 15rem; border-radius: 20px" src="<?= e( $product->getSrc() ) ?>" alt="<?= e( $product->title ) ?>">
                <div style="margin-left: 3rem">
                    <h2><?= e( $product->title ) ?></h2>
                    <p>Likes: <?= e( $product->up_votes ) ?></p>
                    <p>Dislikes: <?= e( $product->down_votes ) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>There are no products present.</p>
    <?php endif; ?>
</section>