<?php

    include_once('config/connect.php');

    



    if(isset($_POST['update'])){

        
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $qtde = $_POST['qtde'];
        $validade = $_POST['validade'];
        $user = 1;

        $dia_atual = date('Y-m-d');
        $hj = new DateTime($dia_atual);
       
    
       
        $dt2 = new DateTime($_POST['validade']);
        $intervalo = $dt2->diff ($hj);
        $dias = $intervalo->format('%R%a');

        $sqlDeleteTroca = "DELETE FROM solicitacaotroca WHERE CodRefProd=$id";
        $sqlDelete = "DELETE FROM produto WHERE CodRefProd=$id";

        $sqlUpdateTroca = "UPDATE solicitacaotroca SET NomeProd='$nome',valorProd='$valor',qtdeProd='$qtde',validadeProd='$validade' WHERE CodRefProd='$id'";
        $sqlUpdate = "UPDATE produto SET NomeProd='$nome',valorProd='$valor',qtdeProd='$qtde',validadeProd='$validade' WHERE CodRefProd='$id'";

        $produtos = "INSERT INTO produto(NomeProd,valorProd,qtdeProd,validadeProd,Usuario_idUser)
        VALUES('$nome','$valor','$qtde','$validade','$user')";
        $produtosTroca = "INSERT INTO solicitacaotroca(NomeProd,valorProd,qtdeProd,validadeProd,Usuario_idUser)
        VALUES('$nome','$valor','$qtde','$validade','$user')";

        //echo $dias;
        if ($dias >60){
            //VENCIDOS
            //echo "Vecidos";
            $resultDel = mysqli_query($conn,$sqlDelete); //DELETAR PRODUTO
            $resultDel = mysqli_query($conn,$sqlDeleteTroca);
            $result = mysqli_query($conn,$produtosTroca);
            $resultTroca = $conn->query($sqlUpdateTroca);

        }elseif($dias <61 and $dias > 0){
            //PERTO DE VENCER
            //echo "Perto de vencer";    
            $resultDel = mysqli_query($conn,$sqlDelete);
            $resultDel = mysqli_query($conn,$sqlDeleteTroca);
            $result = mysqli_query($conn,$produtosTroca);
            $resultTroca = $conn->query($sqlUpdateTroca);
        }else{
            //DATA BOA
            //echo "Data boa";
            $resultDel = mysqli_query($conn,$sqlDeleteTroca);
            $resultDel = mysqli_query($conn,$sqlDelete);
            $result = mysqli_query($conn,$produtos);
            $resultTroca = $conn->query($sqlUpdate);
            
        }

        


    }
    header('Location: index.php')

?>