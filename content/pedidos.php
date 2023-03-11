
<?php

    include_once('config/connect.php');


    $pedido = "SELECT * FROM pedido ORDER BY CodRefProd ASC";
	
	$result = $conn -> query($pedido);

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Pedido </title>
        <meta charset="utf-8">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


    </head>

    <body class="container" style="margin-top: 5%;">

        <h1>Adicionar Produtos no Pedido</h1>

        <form action="insertPed.php" method="POST"autocomplete="off">
            <div class="mb-3">
              <label for="nome" class="form-label"><strong>Nome do Produto</strong></label>
              <input type="text"class="form-control" name="nome" id="nome" placeholder="Digite aqui o nome do produto" required>
            </div>
            <div class="mb-3">
              <label for="valor" class="form-label"><strong>Valor em R$</strong></label>
              <input type="number" class="form-control" name="valor" id="valor" placeholder="Digite aqui o valor" required>
            </div>
            <div class="mb-3">
                <label for="qtde" class="form-label"><strong>Quantidade</strong></label>
                <input type="number" class="form-control"name="qtde" id="qtde" placeholder="Digite aqui a quantidade" required>
            </div>
            <button  class="btn btn-primary" type="submit" name="inserir" id="inserir">Inserir</button>
            
            <a class="btn btn-danger" href="index.php">Voltar</a>
            
          </form>

          <form action="cliente.php" method="POST"autocomplete="off">
            <div>
                <!--<input type="hidden" name="nomeCliente" value="<?php// echo $nome;?>">
                <input type="hidden" name="endCliente" value="<?php //echo $end;?>">
                <input type="hidden" name="telCliente" value="<?php //echo $tel;?>">
                <input type="hidden" name="cpfCliente" value="<?php //echo $cpf;?>">-->
                <button  class="btn btn-primary m-3" type="submit" name="pdf" id="pdf">Finalizar Pedido</button>
            </div>
          </form>


          <div class="area1 rounded ">
						<h2 class="text-center"> Produtos </h2>
							
						<span class="data"></span>
						<div class="m-2">
							<table class="table text-center">
								<thead > 
									<tr class="table-bg1 ">
										<th scope="col">Código</th>
										<th scope="col">Descrição</th>
										<th scope="col">Valor R$</th>
										<th scope="col">Quantidade</th>
                                        <th scope="col">...</th>
									</tr>
								</thead>
								<tbody>
								<?php
                                    
                                    /*if(isset($_POST['inserir'])){
                                        $nome = $_POST['nome'];
                                        $valor = $_POST['valor'];
                                        $qtde = $_POST['qtde'];
                                        $user = 1;
                                        $prod = "INSERT INTO pedido(NomeProd,valorProd,qtdeProd,Usuario_idUser)
                                        VALUES('$nome','$valor','$qtde','$user')";
                                        $resultado = mysqli_query($conn,$prod);
                                            
									}*/
                                        while($linha = mysqli_fetch_assoc($result)){
											echo "<tr>";
                                            echo "<td>".$linha['CodRefProd']."</td>";
											echo "<td>".$linha['NomeProd']."</td>";
											echo "<td> R$ ".$linha['valorProd']."</td>";
											echo "<td>".$linha['qtdeProd']."</td>";
                                            echo "<td>
													<a class='btn btn-sm btn-outline-secondary' href='deletePed.php?id=$linha[CodRefProd]'>
														<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
															<path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
														</svg>
													</a>
												</td>";
											echo "</tr>";
                                        
                                    }
									?>
								</tbody>
							</table>
						</div>


					</div> <!--Fechamento da Tabela 1 -->

      <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
   
    </body>
</html>