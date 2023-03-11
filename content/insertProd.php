<?php
include_once 'config/connect.php';

    $dia_atual = date('Y-m-d');
    $hj = new DateTime($dia_atual);
    $teste = "SELECT * FROM produto WHERE validadeProd ORDER BY CodRefProd ASC";

    $result = $conn -> query($teste);

    //while($linha = mysqli_fetch_assoc($result) ){
        $dt2 = new DateTime($_POST['validade']);
        $intervalo = $dt2->diff ($hj);
        $dias = $intervalo->format('%R%a');

        

        if ($dias > 60){
            //VENCIDOS
                 $nome = $_POST['nome'];
                $valor = $_POST['valor'];
                $qtde = $_POST['qtde'];
                $validade = $_POST['validade'];
                $user = 1;
                $trocas = "INSERT INTO solicitacaotroca(NomeProd,valorProd,qtdeProd,validadeProd,Usuario_idUser)
                VALUES('$nome','$valor','$qtde','$validade','$user')";
                $result = mysqli_query($conn,$trocas);
                //echo $validade;

        }elseif($dias <61 and $dias > 0){
            //PERTO DA VALIDADE
            $nome = $_POST['nome'];
            $valor = $_POST['valor'];
            $qtde = $_POST['qtde'];
            $validade = $_POST['validade'];
            $user = 1;
            $trocas = "INSERT INTO solicitacaotroca(NomeProd,valorProd,qtdeProd,validadeProd,Usuario_idUser)
            VALUES('$nome','$valor','$qtde','$validade','$user')";
            $result = mysqli_query($conn,$trocas);
            if($conn ->connect_errno){
                //echo "ERRO";
            }else{
                //header('Location: index.php');
            }
        }else{
            //DATA BOA
                    $nome = $_POST['nome'];
                    $valor = $_POST['valor'];
                    $qtde = $_POST['qtde'];
                    $validade = $_POST['validade'];
                    $user = 1;

                
                    $produtos = "INSERT INTO produto(NomeProd,valorProd,qtdeProd,validadeProd,Usuario_idUser)
                    VALUES('$nome','$valor','$qtde','$validade','$user')";
                    $result = mysqli_query($conn,$produtos);
                if($conn ->connect_errno){
                    //echo "ERRO";
                }else{
                    //header('Location: index.php');
                }
        }
      header('Location: index.php');

   // }






    
     