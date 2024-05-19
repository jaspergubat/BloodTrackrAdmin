<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles.css">
    <title>Admin Panel</title>
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <div class="container">
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
        $pagePath = 'pages/' . $page . '.php';

        if (file_exists($pagePath)) {
            include $pagePath;
        } else {
            include 'pages/dashboard.php';
        }
        ?>
    </div>
</body>

</html>
