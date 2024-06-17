<?php
require_once '../includes/db-connect.php';
require_once '../includes/functions.php';

$sql = "SELECT id, name, navigation FROM category;";
$categories = pdo_execute( $pdo, $sql )->fetchAll( PDO::FETCH_ASSOC );
?>

<!-- class muss noch hinzugefügt werden -->
<?php include '../includes/header-admin.php'; ?>
<main>
    <header>
        <h1>Categories</h1>
        <button><a href="category.php">Add a new category</a></button>
    </header>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ( $categories as $category ): ?>
                <tr>
                    <td><?= e( $category['name'] ) ?></td>
                    <td><a href="category.php?id=<?= $category['id'] ?>">Edit</a></td>
                    <td><a href="category-delete.php?id=<?= $category['id'] ?>">Delete</a></td>
                </tr>
        </tbody>
    </table>
</main>
<?php include '../includes/footer-admin.php'; ?>
