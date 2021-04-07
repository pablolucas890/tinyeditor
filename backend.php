<?php
/**
 * Created by: Pablo Lucas Silva Santos
 * https://github.com/pablolucas890
 * 
 */
require_once('conexao.php');

$titulo = $_POST['titulo'];
$post = $_POST['myTextarea'];
$post = str_replace("'", "''", $post); //substitui o character ' para '' para que não bugue no banco de dados

if (!isset($_GET['id'])) {
    $sql = "INSERT INTO post values(NULL,'$post ','$titulo')";
} else {
    $sql = "UPDATE post SET post = '$post ',Titulo = '$titulo' WHERE id = " . $_GET['id'];
}

$result = mysqli_query($conn, $sql);

if ($result) {

    header('Location: ./index.php');
} else {
    echo "Erro ao Atualizar"; ?>
    <br>
    <a href="index.php" role="button">INDEX</a>
<?php
}
?>