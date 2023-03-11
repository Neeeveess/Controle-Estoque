<?php

    If(!empty($_GET['id'])){

        include_once "config/connect.php";
        
    
        $id = $_GET['id'];
    
        $sqlSelect = "SELECT * FROM produto WHERE CodRefProd=$id";
    
        $result = $conn->query($sqlSelect);
    
    
        if($result->num_rows >0)
        {
    
            $sqlDelete = "DELETE FROM produto WHERE CodRefProd=$id";
            $resultDelete = $conn->query($sqlDelete);
    
        }
          
    }
    header('Location: index.php');
        



 ?>