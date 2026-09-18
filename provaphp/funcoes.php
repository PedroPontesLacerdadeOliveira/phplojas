<?php
function lerDados(String $arquivo) :array {

$dados = [];
if(file_exists($arquivo)) {
    $extrair_dados = file_get_contents($arquivo);
    $dados = json_decode($extrair_dados, true);

}

return $dados;
}

function salvarDados(array $dadosCadastro, $id): String {
    $ms = "";
    //Le dados dentro do arquivo e guarda na variavel
    $dados = lerDados("dados.json");
    //adiciona dados registro dentro da variavel que ja contem dados anteriores
    

    if($id >= 0){
        $msg = "Atualizado com sucesso!";
        $dados[$id] = $dadosCadastro;
    } else {
        $msg = "Atualizado com sucesso!";
        $dados[] = $dadosCadastro;

    }
//salva novamente os dados com novo registro dentro do arquivo dados.json
    $verifica = file_put_contents("dados.json", json_encode($dados));
    if($verifica) {
        return $msg;
    } else {
        return "Erro ao salvar";
    }

}