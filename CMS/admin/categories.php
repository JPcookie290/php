<?php
require_once 'includes/db-connect.php';
require_once 'includes/functions.php';

$sql = "SELECT id, name, navigation FROM category;";
$categories = pdo_execute( $pdo, $sql )->fetchAll( PDO::FETCH_ASSOC );
?>
