<head>
    <base href="<?php $_SERVER['HTTP_HOST'] ?>/admin/assets">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>
        <?php 
        
            $base = basename($_SERVER['PHP_SELF'] ); 
            $baseName = pathinfo($base, PATHINFO_FILENAME);
            $finalName = ucwords($baseName);

            echo $finalName;
        
        ?>
    </title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=3.1.3">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=3.1.3">
</head>
