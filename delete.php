<?php 
require 'banco.php';

$id = 0;

if(!empty($_GET['codigo'])){

    $id = $_REQUEST['codigo'];

}
if(!empty($_POST)){

    $id = $_POST['codigo'];

    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "delete from tb_aluno where codigo = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Banco::desconectar();
    header("Location: index.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- using new bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.mi
        n.css" integrity="sha384-
        MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Delete</title>
</head>
<body>
    
    <div class="container">
        <div class="span10 offset1">
            <div class="row">
                <h3 class="well">Excluir</h3>
            </div>
            <form action="delete.php" class="form-horizontal" method="POST">

                <input type="hidden" name="codigo" value="<?php echo $id; ?>">
                <div class="alert alert-danger">Deseja excluir contato?</div>
                <div class="form actions">

                    <button type="submit" class="btn btn-danger">Sim</button>
                    <a href="index.php" type="btn" class="btn btn-default">Não</a>

                </div>
            </form>
        </div>
    </div>

</body>
</html>