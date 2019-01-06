<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>PhoneBook</title>
        <link rel="stylesheet" href="resources/styles/style.css">
        <script src="resources/js/jquery.js"></script>
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
        <script src="resources/js/currentMenu.js"></script>
        <script src="resources/js/toggleDetails.js"></script>
        <script src="resources/js/addElem.js"></script>
    </body>
</html>