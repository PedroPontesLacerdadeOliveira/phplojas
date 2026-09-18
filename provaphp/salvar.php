<?php
include_once "funcoes.php";

if($_SERVER['REQUEST_METHOD']) {
    $id = $_GET['id'] ?? "";
    $nome = $_POST['nome'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $preco = $_POST['preco'] ?? '';
    $imagem = $_POST['imagem'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    if($nome == '') {
        header("location: index.php?msg=Nome é obrigatório");
        exit;
    }
    $novoContato =[
        "nome" => $nome,
        "descricao" => $descricao,
        "preco" => $preco,
        "imagem" => $imagem,
        "categoria" => $categoria
        
       
        
    ];
    $salvou = salvarDados($novoContato, $id);
    header("location: index.php?msg=" .$salvou);
    
 
    
}