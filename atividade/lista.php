<?php include "./connection.php" ;

if($_GET["del"] == 'sucess'){
    echo "Dado deletado com sucesso";
}

if($_GET["del"] == "fail"){
    echo "Erro ao deletar dado";
}

if($_GET["insert"] == "success"){
    echo "pizza cadastrada com sucesso";
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pizzas</title>
</head>

<body>

<a href="form.php">Formulário</a>

    <table border="1" cellpadding="10">
        <tr>
            <th>Nome:</th>
            <th>Ingredientes:</th>
            <th>Preço:</th>
            <th>Tamanho:</th>
            <th>Descrição:</th>
            <th colspan="2">Ações:</th>
        </tr>

        <?php
        $lista = R::findAll("pizza", 'ORDER BY id ASC');
        foreach ($lista as $item):
            ?>
            <tr>

                <td><?= $item['nome'] ?></td>
                <td><?= $item['ingredientes'] ?></td>
                <td><?= $item['preco'] ?></td>
                <td><?= $item['tamanho'] ?></td>
                <td><?= $item['descricao'] ?></td>
                <td><a href="form.php?linha=<?= $item['id'] ?>">Editar</a></td>
                <td><a href="delete.php?dado=<?= $item['id']?>">Deletar</a></td>
            </tr>

            
        <?php endforeach; ?>

        

    </table>

</body>

</html>