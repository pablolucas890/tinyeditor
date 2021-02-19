<?php
require_once('conexao.php')
?>
<!DOCTYPE html>
<html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body class="bg-dark my-2">
<div class="border bg-light">
<?php
		$sql = "SELECT post FROM post where id = ".$_GET['id'];
		$result = mysqli_query($conn, $sql);
		if($result){
            $row = mysqli_fetch_assoc($result);
            echo $row['post'];
        }else{
            ?>
            <?php
            echo 'erro';
        }
?>
</div>
</body>
</html>