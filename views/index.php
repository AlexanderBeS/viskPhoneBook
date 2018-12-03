<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <?php include 'modules/Header.php';?>
</header>
<div class="content">
    <div>
        <ul class="menu">
            <li>
                <a href="/">Public Phonebook</a>
            </li>
            <li>
                <a href="/authorization">Login</a>
            </li>
        </ul>
    </div>
    <div>
        <?= $content; ?>
    </div>
</div>
</body>
</html>