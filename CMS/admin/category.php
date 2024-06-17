<?php
require_once '../includes/db-connect.php';
require_once '../includes/functions.php';
require_once '../includes/validate.php';

$id = filter_input( INPUT_GET, 'id', FILTER_VALIDATE_INT ) ?? null;
$errors = [
    'issue' => '',
    'name' => '',
    'description' => '',
];

$category = [
    'id' => '',
    'name' => '',
    'description' => '',
    'navigation' => false,
];

?>

<!-- class muss noch hinzugefügt werden -->
<?php include '../includes/header-admin.php'; ?>
<main>
    <form action="category.php?id=<?= $id ?? '' ?>" method="post">
        <h2><?= $id ? 'Edit ' : 'New ' ?>Category</h2>
        <?php if ( $errors['issue'] ): ?>
            <p><?= $errors['issue'] ?></p>
        <?php endif; ?>
        <div class="p-4">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= e( $category['name'] ) ?>">
            <span><?= $errors['name'] ?></span>
        </div>
        <div class="p-4">
            <label for="name">Description</label>
            <textarea name="description" id="description" ><?= e( $category['description'] ) ?></textarea>
            <span><?= $errors['description'] ?></span>
        </div>
        <div class="p-4">
            <input type="checkbox" name="navigation" id="navigation" <?= $category['navigation'] ? 'checked' : '' ?>>
            <label for="navigation">Navigation</label>
        </div>
        <button type="submit">Save</button>
    </form>
</main>
<?php include '../includes/footer-admin.php'; ?>
