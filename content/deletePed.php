<?php

    If(!empty($_GET['id'])){

        include_once "config/connect.php";
        
    
        $id = $_GET['id'];
    
        $sqlSelect = "SELECT * FROM pedido WHERE CodRefProd=$id";
    
        $result = $conn->query($sqlSelect);
    
    
        if($result->num_rows >0)
        {
    
            $sqlDelete = "DELETE FROM pedido WHERE CodRefProd=$id";
            $resultDelete = $conn->query($sqlDelete);
    
        }
          
    }
    header('Location: pedidos.php');
        



 ?>