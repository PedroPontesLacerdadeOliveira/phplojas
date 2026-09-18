<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="author" content="Pedro Pontes">
</head>
<body>
<style>
body {
    background-color: #3b86d0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    font-family: arial;
    width: 50%;
    background-color: #f6f9fd;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.41);
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}
form{
    display: flex;
    flex-direction: column;
}
table {
    background-color: #dee7f3;
}
label {
    font-weight: bold;
}
.input-group {
  display: flex;
  flex-direction: column; 
  gap: 8px;             
  margin-bottom: 20px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  max-width: 320px;
}
.input-group label {
  font-size: 0.875rem;     
  font-weight: 600;       
  color: #333333;        
  cursor: pointer;     
}
.input-group input {
  width: 100%;
  padding: 12px 16px;      
  font-size: 1rem;         
  color: #222222;
  background-color: #ffffff;
  border: 1px solid #cccccc; 
  border-radius: 8px;     
  outline: none;          
  transition: all 0.2s ease-in-out; 
}
button{
    background-color: #0a2951;
    color: #FFFFFF;
    border: none;
    padding: 10px 20px;
}
.button:hover {
    background-color: #001938;
    cursor: pointer;
}
</style>
    
<?php
include_once "funcoes.php";
$dados = [];
$dados = lerDados("dados.json");
$id = $_GET['id'] ?? "";
$msg = $_GET['msg'] ?? '';
$registro = [];
if ($id >= 0) {
    $registro = $dados[$id];
}
?>



 <div class="container">  
<h1>Produtos do PP</h1>
    <form action="salvar.php?id=<?= $id ?>" method="post">
        <div class="input-group">
            <label for="nome">Nome</label>
            <input type="text" 
            name="nome" 
            id="nome" 
            placeholder="Nome do produto"
            value="<?=$registro['nome']?? ''?>">
        
        <div>
            <label for="descricao">Descrição</label>
            <br>
            <textarea 
            type="text"
            name="descricao" 
            id="descricao" 
            placeholder="Descrição do produto"
            value="<?=$registro['descricao']?? '' ?>">
            </textarea>
        </div>
        
        <div>
            <label for="preco">Preço</label>
            <input type="text" 
            name="preco" 
            id="preco"
            placeholder="Preço do produto"
            value="<?=$registro['preco']?? '' ?>">
        </div>
           <div>
            <label for="imagem">Imagem</label>
            <input type="text" 
            name="imagem" 
            id="imagem"
            placeholder="Link da imagem do produto"
            value="<?=$registro['imagem']?? '' ?>">
        </div>
           <div>
            <label for="categoria">Categoria</label>
            <input type="text" 
            name="categoria" 
            id="categoria"
            placeholder="Categoria do produto"
            value="<?=$registro['categoria']?? '' ?>">
        </div>







        <div>
            <button type="reset">Cancelar</button>
            <button type="submit">Salvar</button>
        </div>
        </div>
    </form>
    <div style="color: #023a82; border: 1 pix solid #023a82"> <?=$msg ?> </div>
    <hr>

    <table border = "1">
        <thead>
            <th>Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Imagem</th>
            <th>Categoria</th>
</tr>
</thead>
<tbody>
    <?php
    foreach($dados as $id => $item) {
    ?>
    

    <tr>
        <td><?=$id?></td>
        <td><?=$item['nome']?? '' ?></td>
        <td><?=$item['descricao']?? ''?></td>
        <td><?=$item['preco']?? ' '?></td>
        <td><?=$item['imagem']?? ''?></td>
        <td><?=$item['categoria']?? ''?></td>
        <td><a href="index.php?id=<?=$id?>">Editar</a> | <a href="apagar.php?id=<?= $id ?>">Apagar </a>  </td>


        
    </tr>
    <?php
    }
    ?>
    </div>
    </tbody>
    </table>
    </body>
    </html>