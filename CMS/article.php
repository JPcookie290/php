<?php
require_once 'includes/db-connect.php';
require_once 'includes/functions.php';

$cat_id = filter_input( INPUT_GET, 'id', FILTER_VALIDATE_INT );
if ( ! $cat_id ) {
    include 'page_not_found.php';
}

$sql = "SELECT id, name, description FROM category WHERE id = :id;";
$category = pdo_execute( $pdo, $sql, [ 'id' => $cat_id ] )->fetchAll( PDO::FETCH_ASSOC )[0];
if ( ! $category ) {
    include 'page_not_found.php';
}

$sql = "SELECT a.title, a.summary, a.content, a.created, a.category_id, a.user_id, c.name AS category,
        CONCAT(u.forename, ' ', u.surname) as author, i.filename as image_file, i.alttext as image_alt
        FROM articles AS a
        JOIN category AS c ON a.category_id = c.id
        JOIN user AS u ON a.user_id = u.id
        LEFT JOIN images AS i ON a.images_id = i.id
        WHERE a.id = :id AND a.published = 1;";

$article = pdo_execute( $pdo, $sql, [ 'id' => $cat_id ] )->fetchAll( PDO::FETCH_ASSOC )[0];
if ( ! $article ) {
    include 'page_not_found.php';
}


$sql = "SELECT id, name FROM category WHERE navigation = 1;";
$navigation = pdo_execute( $pdo, $sql )->fetchAll();
$title = $article['title'];
$description = $article['summary'];
$section = $article['category_id'];
?>

<?php include './includes/header.php'; ?>
<main class="flex flex-wrap container mx-auto">
    <section>
        <img src="uploads/<?= e( $article['image_file'] ?? 'placeholder.png' ) ?>" alt="<?= e( $article['image_alt'] ) ?>">
    </section>
    <section>
        <h1 class="text-4xl text-blue-500 mb-4 mt-8"><?= e( $article['title'] ) ?></h1>
        <div class="text-gray-500 mb-3"><?= e( format_date( $article['created'] ) ) ?></div>
        <div class="text-gray-500"><?= e( $article['content'] ) ?></div>
        <p class="credit text-xs mt-5 mb-5">
                Posted in <a href="category.php?id=<?= $article['category_id'] ?>" class="text-pink-400">
                    <?= e( $article['category'] ) ?></a>
                by <a href="user.php?id=<?= $article['user_id'] ?>" class="text-pink-400">
                    <?= e( $article['author'] ) ?></a>
        </p>
    </section>
</main>
<?php include './includes/footer.php'; ?>