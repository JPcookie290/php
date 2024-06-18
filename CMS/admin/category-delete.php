<?php
require_once '../includes/db-connect.php';
require_once '../includes/functions.php';
require_once '../includes/validate.php';

$id = filter_input( INPUT_GET, 'id', FILTER_VALIDATE_INT ) ?? null;

$sql = "SELECT id, name, description, navigation FROM category WHERE id = :id";
$category = pdo_execute( $pdo, $sql, ['id' => $id ] )->fetch();
if ( ! $category ) {
    redirect( 'categories.php', [ 'error' => 'category not found' ] );
}

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $sql = "DELETE FROM category WHERE id = :id";
    $id = filter_input( INPUT_POST, 'id', FILTER_VALIDATE_INT );

    try {
        pdo_execute( $pdo, $sql, ['id' => $id ] );
        redirect( 'categories.php', [ 'success' => 'category was successfully deleted' ] );
    } catch ( PDOException $e ) {
        if ( $e->errorInfo[1] == 1451 ) {
            $error = 'Category ' . $category['name'] . ' can not be removed, there are Articles in the Category';
        } else {
            $error = 'there was an issue delete the category';
        }
        redirect( 'categories.php', [ 'error' => $error ] );
    }
}
?>

<?php include '../includes/header-admin.php'; ?>
<main class="container w-auto mx-auto md:w-1/2 flex justify-center flex-col items-center p-5">
    <h2 class="text-3xl text-blue-500 mb-8">Are you sure you want to delete this category?</h2>
    <div class="flex justify-center">
        <form class="m-2" action="category-delete.php" method="post">
            <input type="hidden" name="id" id="id" value=" <?= $id ?>">
            <button class="text-white bg-blue-500 p-3 rounded-md" type="submit">Yes</button>
        </form>
        <button class="text-white p-3 rounded-md bg-pink-600 m-2"><a href="categories.php">No</a></button>
    </div>
</main>
<?php include '../includes/footer-admin.php'; ?>
