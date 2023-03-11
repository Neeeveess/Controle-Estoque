<?php
include_once 'config/connect.php';

        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $qtde = $_POST['qtde'];
        $user = 1;
        $prod = "INSERT INTO pedido(NomeProd,valorProd,qtdeProd,Usuario_idUser)
        VALUES('$nome','$valor','$qtde','$user')";
        $resultado = mysqli_query($conn,$prod);
           
      header('Location: pedidos.php');

   // }






    
     