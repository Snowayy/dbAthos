<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>



    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-itens-center h-100">
                <div class="jumbotron">
                    <div class="row">
                        <h2>AULA DE PBE - CRUD <span class="badge text-bg-secondary"> v-1.0.0 - SENAI - AULA PBE</span></h2>
                    </div>
                </div>
                    <div class="row">
                        <p><a href="create.php" class="btn btn-success">Add</a></p>

                        <table class="table table-striped">
                            <thead>
                                <tr>

                                    <th scope="col">ID</thscope>
                                    <th scope="col">NOME</th>
                                    <th scope="col">ENEDEREÇO</th>
                                    <th scope="col">TELEFONE</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">IDADE</th>
                                    <th scope="col">AÇÃO</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'banco.php';
                                $pdo = Banco::conectar();
                                $sql = 'SELECT * FROM tb_aluno ORDER BY codigo DESC';

                                foreach ($pdo->query($sql) as $row) {

                                    echo '<tr>';
                                    echo '<th scope="row">' . $row['codigo'] . '</th>';
                                    echo '<td>' . $row['nome'] . '</td>';
                                    echo '<td>' . $row['endereco'] . '</td>';
                                    echo '<td>' . $row['fone'] . '</td>';
                                    echo '<td>' . $row['email'] . '</td>';
                                    echo '<td>' . $row['idade'] . '</td>';
                                    echo '<td width=250>';
                                    echo '<a class="btn btn-primary" href="read.php?codigo=' . $row['codigo'] . '">Info</a>';
                                    echo ' ';
                                    echo '<a class="btn btn-warning" href="update.php?codigo=' . $row['codigo'] . '">Atualizar</a>';
                                    echo ' ';
                                    echo '<a class="btn btn-danger" href="delete.php?codigo=' . $row['codigo'] . '">Excluir</a>';
                                    echo '</td>';
                                    echo '</tr>';

                                }

                                Banco::desconectar();
                                ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>

    </section>



</body>

</html>