<?php

include "./connection.php";

$mensagem = "A mensagem aparecerá aqui";

$tamanhos = [
    "Pequena" => "Pequena",
    "Media" => "Media",
    "Grande" => "Grande",
    "Gigante" => "Gigante",
];

$pizza = R::load('pizza', $_GET['linha']);

$nome = isset($_POST["nome"]) ? $_POST["nome"] : (!empty($pizza) ? $pizza["nome"] : "");
$ingredientes = isset($_POST["ingredientes"]) ? $_POST["ingredientes"] : (!empty( $pizza) ? $pizza["ingredientes"] :"");
$tamanhoSelected = isset($_POST["tamanho"]) ? $_POST["tamanho"] : (!empty( $pizza) ? $pizza["tamanho"] :"");
$preco = isset($_POST["preco"]) ? $_POST["preco"] : (!empty( $pizza )? $pizza["preco"] :"");
$descricao = isset($_POST["descricao"]) ? $_POST["descricao"] : (!empty( $pizza) ? $pizza["descricao"] :"");

$nome = htmlspecialchars(trim($nome));
$ingredientes = htmlspecialchars($ingredientes);
$descricao = htmlspecialchars($descricao);





?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar pizza</title>

    <style>
        .require {
            color: red;
        }
    </style>
</head>

<body>

    <h1>Cadastrar pizza</h1>
    <form action="" method="post">

        <label>Nome<span class="require">*</span></label> <br>
        <input type="text" name="nome" value="<?= $nome ?>" required> <br>

        <label>Ingredientes<span class="require">*</span> (use vírgula para separar os ingredientes)</label> <br>
        <textarea name="ingredientes" required><?= $ingredientes ?></textarea> <br>

        <label>Tamanho<span class="require">*</span></label> <br>
        <select name="tamanho" required>
            <option value="">Tamanho..</option>
            <?php foreach ($tamanhos as $key => $value): ?>
                <option value="<?= $key ?>" <?php ($tamanhoSelected == $key) ? "selected" : "" ?>>
                    <?= $value ?>
                </option>
            <?php endforeach; ?>
        </select> <br>

        <label>Preço<span class="require">*</span></label><br>
        <input type="number" name="preco" value="<?= $preco ?>" required><br> <br>

        <label>Descrição<span class="require">*</span></label>
        <p>*Serve para colocar no cardápio com o intuido de atrair o paladar do cliente*</p>
        <textarea name="descricao" required><?= $descricao ?></textarea><br>

        <input type="submit" name="button" value="Cadastrar">
    </form>

    <?php
    if ($_POST['button'] === "Cadastrar") {
        if (!empty($nome) && !empty($ingredientes) && !empty($preco) && !empty($descricao)) {

            $pizza = R::dispense('pizza');
            $pizza['nome'] = $nome;
            $pizza['ingredientes'] = $ingredientes;
            $pizza['tamanho'] = $tamanhoSelected;
            $pizza['preco'] = $preco;
            $pizza['descricao'] = $descricao;

            R::store($pizza);

            $mensagem = "Pizza cadastrada com sucesso! <br> Dados: <br> Nome: $nome; <br> Ingredientes: $ingredientes; <br> Tamanho: $tamanhoSelected; <br> Preço: $preco; <br> Descrição: $descricao.";
        }
    }
    ?>
    <?= $mensagem ?>

</body>

</html>