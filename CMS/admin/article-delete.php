<?php
require_once '../includes/db-connect.php';
require_once '../includes/functions.php';
require_once '../includes/validate.php';

// Implement Logic


?>

<?php include '../includes/header-admin.php'; ?>
<main class="container w-auto mx-auto md:w-1/2 flex justify-center flex-col items-center p-5">
    <h2 class="text-3xl text-blue-500 mb-8">Are you sure you want to delete this Article?</h2>
    <div class="flex justify-center">
        <form class="m-2" action="article-delete.php" method="post">
            <input type="hidden" name="id" id="id" value=" <?= $id ?>">
            <button class="text-white bg-blue-500 p-3 rounded-md" type="submit">Yes</button>
        </form>
        <button class="text-white p-3 rounded-md bg-pink-600 m-2"><a href="categories.php">No</a></button>
    </div>
</main>
<?php include '../includes/footer-admin.php'; ?>