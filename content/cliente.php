<!DOCTYPE html>
<html>
    <head>
        <title> Cadastrar Cliente</title>
        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="layout/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>

    <body class="container" style="margin-top: 10%;">

        <h1 class="text-center">Pedido</h1>
        <h2 class="h2">Dados do Cliente</h2>
        <form action="dompdf.php" method="POST" >
            <div class="mb-3">
              <label for="nome" class="form-label"><strong>Nome do Cliente</strong></label>
              <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite aqui o nome do cliente" autocomplete="off" required>
            </div>
            <div class="mb-3">
              <label for="end" class="form-label"><strong>Endereço</strong></label>
              <input type="text" class="form-control" name="end" id="end" placeholder="Digite aqui o endereço" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="tel" class="form-label"><strong>Telefone</strong></label>
                <input type="number" class="form-control"name="tel" id="tel" placeholder="Digite aqui o telefone" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label"><strong>CPF/CNPJ</strong></label>
                <input type="number" class="form-control" name="cpf" id="cpf" placeholder="Digite aqui o CPF/CNPJ" autocomplete="off" required>
            </div>
            <button  class="btn btn-primary" type="submit" name="cadastrar" id="cadastrar" value="Cadastrar">Finalizar</button>
            <a class="btn btn-danger" href="pedidos.php">Voltar</a>
            <input type="hidden" name="iduser" value="<?php $idUsuario;?>">


         
        </form>

            

      <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
   
    </body>
</html>