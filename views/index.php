<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>PhoneBook</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <?php include 'modules/header.php'; ?>
        </header>
        <div class="content">
            <div>
                <?php include 'modules/menu.php'; ?>
            </div>
            <div>
                <?= $content; ?>
            </div>
        </div>
        <script src="js/jquery.js"></script>
        <script src="js/currentMenu.js"></script>
        <script src="js/toggleDetails.js"></script>
        <script src="js/addElem.js"></script>
    </body>
</html>