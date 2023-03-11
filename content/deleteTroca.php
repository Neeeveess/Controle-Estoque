<?php

    If(!empty($_GET['id'])){

        include_once "config/connect.php";
        
    
        $id = $_GET['id'];
    
        $sqlSelect = "SELECT * FROM solicitacaotroca WHERE CodRefProd=$id";
    
        $result = $conn->query($sqlSelect);
    
    
        if($result->num_rows >0)
        {
    
            $sqlDelete = "DELETE FROM solicitacaotroca WHERE CodRefProd=$id";
            $resultDel = mysqli_query($conn,$sqlDelete);
    
        }
          
    }
    header('Location: index.php');
        



 ?>