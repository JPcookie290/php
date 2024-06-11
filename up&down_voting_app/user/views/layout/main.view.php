<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../css/pico.css">
    <link rel="stylesheet" href="../../css/pico.classless.min.css">

    <title>Project - Up- and Down-Voting App</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="../../index.php">Home</a></li>
                <?php if ( ! $_SESSION ) : ?>
                    <li><a href="../../login/login.php">Login</a></li>
                <?php else : ?>
                    <li><a href="../../login/logout.php">Logout</a></li>    
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main class="grid" style="padding-top: 0;">
        <?php echo $content ?? ''; ?>
    </main>
</body>
</html>