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
    <script type="text/javascript" src='https://cdn.tiny.cloud/1/bem2mqlwa5kkbnj96ergx1swrq7p192ugg4xkuoov1t3xdbm/tinymce/5/tinymce.min.js' referrerpolicy="origin"> </script>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <?php if(isset($_GET['id'])){ ?>

        <form action="backend.php?id=<?php echo $_GET['id']; ?>" method="post">

    <?php } else { ?>

        <form action="backend.php" method="post">

    <?php } ?>
        <div class="bg-dark text-center mt-3">
            <div class="form-group bg-light p-2 p-3">
                <h2 class="h2 text-danger">TÍTULO</h2>
                <?php
                    if(isset($_GET['id'])){
                        $sql = "SELECT Titulo FROM post where id = ".$_GET['id'];
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            $row = mysqli_fetch_assoc($result); ?>
                            <input value="<?php echo $row['Titulo'];?>" type="text" name='titulo' class="form-control" id="" aria-describedby="helpId" placeholder="Titulo do Post">
                            <?php
                        }
                    } else { ?>
                        <input value="" type="text" name='titulo' class="form-control" id="" aria-describedby="helpId" placeholder="Titulo do Post">
                        <?php
                    }
                ?>
            </div>
            <br>
            <div class='bg-light'>
                <br>
                <h2 class="h2 text-danger mb-2">ESCREVER POST</h2>
                <?php
                    if(isset($_GET['id'])){
                        $sql = "SELECT post FROM post where id = ".$_GET['id'];
                        $result = mysqli_query($conn, $sql);

                        if($result){
                            $row = mysqli_fetch_assoc($result);?>
                            <textarea  class="bg-light" id="myTextarea" name="myTextarea"> <?php echo $row['post'];?> </textarea>
                            <?php
                        }

                    }else { ?>
                        <textarea class="bg-light" id="myTextarea" name="myTextarea">Escreva Algo Aqui!</textarea>
                        <?php
                    } ?>
            </div>
        </div>
        <br>
        <br>
        <div class="text-center bg-light p-5">
            <button type="submit" name="enviar" class="btn btn-outline-primary">Salvar</button>
        </div>
        <br>
    </form>
</body>
</html>