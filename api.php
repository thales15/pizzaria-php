<?php
include "conexao.php";

$retorno = array();

if (isset($_GET["acao"])) {
    if ($_GET["acao"] == "C") {

        $pizza = R::dispense('pizza');

        $pizza->nome = $_GET['nome'];
        $pizza->preco = $_GET['preco'];

        R::store($pizza);

        $retorno = [
            "sucesso" => True,
            "mensagem" => "Pizza cadastrada com sucesso",
            "dados" => "",
            "erros" => "",
        ];
    } else if ($_GET["acao"] == "R") {
        $lista = R::findAll("pizza");

        $retorno = [
            "sucesso" => true,
            "mensagem" => "Lista exibida com sucesso",
            "dados" => $lista,
            "erros" => "",
        ];
    } elseif ($_GET["acao"] == "D") {

        if (isset($_GET["id"])) {
            $delete = R::load("pizza", $_GET["id"]);
            R::trash("pizza", $delete);

            $retorno = [
                "sucesso" => true,
                "mensagem" => "Pizza deletada com sucesso",
                "dados" => "",
                "erros" => "",
            ];
        }else{
            $retorno = [
                "sucesso" => false,
                "mensagem" => "Erro ao deletar pizza",
                "dados" => "",
                "erros" => "Parametro ID nao informado",
            ];
        }
    }


} else {
    $retorno = [
        "sucesso" => false,
        "mensagem" => "Erro ao cadastrar pizza",
        "dados" => "",
        "erros" => "Parametro ACAO nao informado",
    ];
}

echo json_encode($retorno);
?>