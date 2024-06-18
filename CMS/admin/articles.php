<?php
require_once '../includes/db-connect.php';
require_once '../includes/functions.php';

$sql = "SELECT a.id, a.title, a.summary, a.created, a.published, a.category_id, a.user_id, c.name AS category,
        CONCAT(u.forename, ' ', u.surname) AS author, i.filename AS image_file, i.alttext AS image_alt
        FROM articles AS a
        JOIN category AS c ON a.category_id = c.id
        JOIN user AS u ON a.user_id = u.id
        LEFT JOIN images AS i ON a.images_id = i.id
        ORDER BY a.id DESC";
$articles = pdo_execute( $pdo, $sql )->fetchAll( PDO::FETCH_ASSOC );

$error = filter_input( INPUT_GET, 'error' ) ?? '';
$success = filter_input( INPUT_GET, 'success') ?? '';
?>

<?php include '../includes/header-admin.php'; ?>
<main class="container mx-auto flex justify-center flex-col items-center">
    <header class="p-10">
        <?php if ( $error ): ?>
            <p class="error text-red-500 bg-red-200 p-5 rounded-md"><?= $error ?></p>
        <?php endif; ?>
        <?php if ( $success ): ?>
            <p class="success text-green-500 bg-green-200 p-5 rounded-md"><?= $success ?></p>
        <?php endif; ?>
        <h1 class="text-4xl text-blue-500 mb-8">Articles</h1>
        <button class="text-white bg-blue-500 p-3 rounded-md hover:bg-pink-600"><a href="article.php">Add a new article</a></button>
    </header>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 max-w-xl mb-10">
        <thead class="text-xl text-gray-700 uppercase bg-gray-50 dark:bg-gray-700">
            <tr>
                <th class="px-6 py-3">Image</th>
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3">Created</th>
                <th class="px-6 py-3">Category</th>
                <th class="px-6 py-3">Published</th>
                <th class="px-6 py-3">Edit</th>
                <th class="px-6 py-3">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ( $articles as $article ): ?>
                <tr class="bg-white border-b dark:bg-gray-800">
                    <td class="px-6 py-4 text-gray-900 font-medium whitespace-nowrap">
                        <img src="../uploads/<?= e( $article['image_file'] ?? 'placeholder.png' ) ?>" alt="<?= e( $article['image_alt'] ) ?>">
                    </td>
                    <td class="px-6 py-4 text-gray-900 font-medium whitespace-nowrap"><?= e( $article['title'] ) ?></td>
                    <td class="px-6 py-4 text-gray-900 font-medium whitespace-nowrap"><?= e( $article['created'] ) ?></td>
                    <td class="px-6 py-4 text-gray-900 font-medium whitespace-nowrap"><?= e( $article['category'] ) ?></td>
                    <td class="px-6 py-4 text-gray-900 font-medium whitespace-nowrap"><?= ( e( $article['published'] ) ? 'Yes' : 'No' ) ?></td>
                    <td class="px-6 py-4 text-pink-600 font-medium whitespace-nowrap"><a href="article.php?id=<?= $article['id'] ?>">Edit</a></td>
                    <td class="px-6 py-4 text-blue-600 font-medium whitespace-nowrap"><a href="article-delete.php?id=<?= $article['id'] ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php include '../includes/footer-admin.php'; ?>
