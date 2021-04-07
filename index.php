<!-- 
    /**
    * Created by: Pablo Lucas Silva Santos
    * https://github.com/pablolucas890
    * 
    */
    configurações gerais    https://www.tiny.cloud/docs/general-configuration-guide/ 
    chave: bem2mqlwa5kkbnj96ergx1swrq7p192ugg4xkuoov1t3xdbm
-->
<?php
require_once('conexao.php')
?>
<!DOCTYPE html>
<html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Posts</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script type="text/javascript" src='https://cdn.tiny.cloud/1/bem2mqlwa5kkbnj96ergx1swrq7p192ugg4xkuoov1t3xdbm/tinymce/5/tinymce.min.js' referrerpolicy="origin"> </script>
  <script type="text/javascript" src="script.js"></script>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body class='text-center bg-dark row'>
  <div class="card text-left bg-warning">
    <div class="card-body">
      <h4 class="card-title">NOVO POST</h4>
      <p class="card-text">
        <a name="" id="" class="btn btn-primary" href="editPost.php" role="button">Clique Aqui</a>
      </p>
    </div>
  </div>
  <br><br>
  <?php
  $sql = "SELECT * FROM post";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="card text-left border my-2 bg-light col-4">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
          <h4 class="card-title"><?php echo $row['Titulo']; ?></h4>
          <p class="card-text">
            <button type="button" class="btn btn-outline-secondary w-100">
              <a name="" id="" class="btn btn-danger w-75" href="verPost.php?id=<?php echo $row['id']; ?>" role="button">
                <p>VER POST</p>
              </a>
            </button>
            <button type="button" class="btn btn-outline-secondary w-100 mt-1">
              <a name="" id="" class="btn btn-dark w-75" href="editPost.php?id=<?php echo $row['id']; ?>" role="button">
                <p>EDITAR POST</p>
              </a>
            </button>
          </p>
        </div>
      </div>
  <?php
    }
  } ?>
</body>

</html>