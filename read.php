<?php 

require 'banco.php';
$id = null;
if (!empty($_GET['codigo'])){

    $id = $_REQUEST['codigo'];

}

if (null == $id){

    header("location: index.php");

} else {

    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tb_aluno WHERE codigo = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Banco::desconectar();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <main>

        <div class="container">
            <div class="span10 offset1">
                <div class="card">
                    <div class="card-reader">
                        <h3 class="well">Informações do contato</h3>
                    </div>
                    <div class="container">
                        <div class="form-horizontal">
                            <div class="control-group">
                                <label class="controls form-control">Nome</label>
                                <div class="controls form-control">
                                    <label class="carousel-inner"><?php 
                                    echo $data['nome'] ?></label>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="controls form-control">Endereço</label>
                                <div class="controls form-control">
                                    <label class="carousel-inner"><?php 
                                    echo $data['endereco'] ?></label>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="controls form-control">Telefone</label>
                                <div class="controls form-control">
                                    <label class="carousel-inner"><?php 
                                    echo $data['fone'] ?></label>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="controls form-control">Email</label>
                                <div class="controls form-control">
                                    <label class="carousel-inner"><?php 
                                    echo $data['email'] ?></label>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="controls form-control">Idade</label>
                                <div class="controls form-control">
                                    <label class="carousel-inner"><?php 
                                    echo $data['idade'] ?></label>
                                </div>
                            </div>
                            <br>
                            <div class="form-actions">
                                <a href="index.php" type="btn" class="btn btn-primary">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    
</body>
</html>