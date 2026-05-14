<?php

include "./conexao.php";
//cria a tabela
$pizza = R::dispense("pizza");

//Fazem a mesma coisa
//Dados da tabela
/*
$pizza->nome = 'Calabresa'; //anotação por objeto
$pizza['ingredientes'] = 'calabresa, queijo, cebola'; //anotação por array
$pizza->preco = 59.99;

//cria a tabela com os dados - Insert
R::store($pizza);
*/

//Pega o id
//$pizza_edit = R::load('pizza', 1); //forma direta
$pizza_edit = R::findOne('pizza', 'nome = "Calabresa"' ); //descobre


$pizza_edit['preco'] = 49.99;
$pizza_edit['ingredientes'] = 'calabresa, queijo, cebola, catupiry';
$pizza_edit['tamanho'] = 'Gigante';
R::store($pizza_edit);
?>
