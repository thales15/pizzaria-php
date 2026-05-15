<?php include "./connection.php" ?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pizzas</title>
</head>

<body>

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
                <td><input type="submit" name="edit" value="Editar"></td>
                <td><input type="submit" name="delete" value="Deletar"></td>
            </tr>
        <?php endforeach; ?>



    </table>

</body>

</html>