<?php

include "./connection.php";

$mensagem = "A mensagem aparecerá aqui";

$tamanhos = [
    "Pequena" => 'Pequena',
    "Media" => 'Media',
    "Grande" => 'Grande',
    "Gigante" => 'Gigante',
];

$pizzaSelected = R::load('pizza', $_GET['linha']);

$nome = isset($_POST["nome"]) ? $_POST["nome"] :
    (!empty($pizzaSelected) ? $pizzaSelected["nome"] : "");

$ingredientes = isset($_POST["ingredientes"]) ? $_POST["ingredientes"] :
    (!empty($pizzaSelected) ? $pizzaSelected["ingredientes"] : "");

$tamanhoSelected = isset($_POST["tamanho"]) ? $_POST["tamanho"] :
    (!empty($pizzaSelected) ? $pizzaSelected["tamanho"] : "");

$preco = isset($_POST["preco"]) ? $_POST["preco"] :
    (!empty($pizzaSelected) ? $pizzaSelected["preco"] : "");

$descricao = isset($_POST["descricao"]) ? $_POST["descricao"] :
    (!empty($pizzaSelected) ? $pizzaSelected["descricao"] : "");

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

    <a href="lista.php">Lista</a>

    <h1>Cadastrar pizza</h1>
    <form action="" method="post">

        <input type="hidden" name="pizzaSelected" value="<?= $pizzaSelected['id']; ?>">

        <label>Nome<span class="require">*</span></label> <br>
        <input type="text" name="nome" value="<?= $nome ?>" required> <br>

        <label>Ingredientes<span class="require">*</span> (use vírgula para separar os ingredientes)</label> <br>
        <textarea name="ingredientes" required><?= $ingredientes ?></textarea> <br>

        <label>Tamanho<span class="require">*</span></label> <br>
        <select name="tamanho" required>
            <option value="">Tamanho..</option>
            <?php foreach ($tamanhos as $key => $value): ?>
                <option value="<?= $key ?>" <?= ($tamanhoSelected == $value) ? 'selected' : '' ?>>
                    <?= $value ?>
                </option>
            <?php endforeach; ?>
        </select> <br>

        <label>Preço<span class="require">*</span></label><br>
        <input type="number" name="preco" value="<?= $preco ?>" required><br> <br>

        <label>Descrição<span class="require">*</span></label>
        <p>*Serve para colocar no cardápio com o intuido de atrair o paladar do cliente*</p>
        <textarea name="descricao" required><?php echo $descricao ?></textarea><br>

        <input type="submit" name="button" value="Cadastrar">
    </form>

    <?php
    if ($_POST['button'] === "Cadastrar") {
        if (isset($_GET["linha"])) {

            $pizza = R::load("pizza", $_POST["pizzaSelected"]);
            echo "entrou no if";
            $mensagem = "Dados alterados com sucesso";

        } else {
            $pizza = R::dispense('pizza');
            echo "entrou no else";
            header("location: lista.php?insert=success");
        }

        $pizza['nome'] = $nome;
        $pizza['ingredientes'] = $ingredientes;
        $pizza['tamanho'] = $tamanhoSelected;
        $pizza['preco'] = $preco;
        $pizza['descricao'] = $descricao;

        R::store($pizza);
    }
    ?>
    <?= $mensagem ?>

</body>

</html>