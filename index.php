<h2>Inhalt des Superglobalen Arrays $_SERVER am Host <?= $_SERVER['HTTP_HOST'] ?> - <?= $_SERVER['REMOTE_ADDR'] ?></h2>

<table>
    <tr>
        <th>Key</th>
        <th>Value</th>
    </tr>
    <?php
    foreach ($_SERVER as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    ?>
</table>