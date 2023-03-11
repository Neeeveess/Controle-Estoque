<!DOCTYPE html>
<html>
    <head>
        <title> Adicionar Produto</title>
        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="layout/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>

    <body class="container" style="margin-top: 10%;">

        <h1>Adicionar Produtos</h1>

        <form action="insertProd.php" method="POST"autocomplete="off">
            <div class="mb-3">
              <label for="nome" class="form-label"><strong>Nome do Produto</strong></label>
              <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite aqui o nome do produto" required>
            </div>
            <div class="mb-3">
              <label for="valor" class="form-label"><strong>Valor em R$</strong></label>
              <input type="number" step="0.01" class="form-control" name="valor" id="valor" placeholder="Digite aqui o valor" required>
            </div>
            <div class="mb-3">
                <label for="qtde" class="form-label"><strong>Quantidade</strong></label>
                <input type="text" class="form-control"name="qtde" id="qtde" placeholder="Digite aqui a quantidade" required>
            </div>
            <div class="mb-3">
                <label for="validade" class="form-label"><strong>Validade</strong></label>
                <input type="date" class="form-control" name="validade" id="validade" placeholder="Digite aqui a Validade" required>
            </div>
            <button  class="btn btn-primary" type="submit" name="submit" id="submit" value="Cadastrar">Cadastrar</button>
            <a class="btn btn-danger" href="index.php">Voltar</a>
            <input type="hidden" name="iduser" value="<?php $idUsuario;?>">
          </form>

      <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
   
    </body>
</html>