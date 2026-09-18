<?php
include_once "funcoes.php";

$id = $_GET['id'] ?? '';

if($id == '') {
    header('location: index.php?msg=Id inválido!');
    exit;
}

$dados = lerDados("dados.json");

foreach($dados as $indice => $valor) {
    if($indice == $id) {
        $msg = $valor['nome'].' apagado com sucesso!';
        unset($dados[$indice]);
    }

}
 $verifica = file_put_contents("dados.json", json_encode($dados));
 ?>