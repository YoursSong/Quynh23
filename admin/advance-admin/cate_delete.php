<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'control.php';
    $get_data = new data_user();
    $del = $get_data->delete_cate($_GET['del']);
    ?>
    <script>
        window.location='category.php';
    </script>
</body>
</html>