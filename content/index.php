
<?php
	
	include_once "config/connect.php";

	 
	//CALCULA A DATA
	$dia_atual = date('Y-m-d');
	$hj = new DateTime($dia_atual);
    $teste = "SELECT * FROM solicitacaotroca WHERE validadeProd ORDER BY CodRefProd ASC";
	
	$resultad = $conn -> query($teste);
	$meses = "SELECT * FROM produto ORDER BY CodRefProd ASC" ;
	$resultMeses = $conn -> query($meses);

	while($linha = mysqli_fetch_assoc($resultMeses) )
	{
			$linhaa = date('Y-m-d',strtotime($linha['validadeProd']));
			$dt2 = new DateTime($linhaa);
			$intervalo = $dt2->diff ($hj);
			$dias = $intervalo->format('%R%a');
				//if($dias > (-90) and $dias < 0){
				
			
				//}
		
	}
	

	 
/*
	while($linha = mysqli_fetch_assoc($resultad) ){
		$dt2 = new DateTime($linha['validadeProd']);
		$intervalo = $dt2->diff ($hj);
		$dias = $intervalo->format('%R%a');
		echo "<br>";
		print_r( $dias);

		

		if ($dias >60){
			echo " vencido";
			
		}elseif($dias <61 and $dias > 0){
			echo " -de 2 meses";
			$trocas = "INSERT INTO solicitacaotroca(NomeProd,valorProd,qtdeProd,validadeProd,Usuario_idUser)
            VALUES('$nome','$valor','$qtde','$validade','$user')";
            $result = mysqli_query($conn,$trocas);
		}else{
			echo " Dentro da validade";
		}

	}
        */
		

	//FILTRO DE PESQUISA

	

	if(!empty($_GET['searchT']))
	{
		$dataTroca = $_GET['searchT'];
		$sqlTroca ="SELECT * FROM solicitacaotroca WHERE CodRefProd LIKE '$dataTroca%' or NomeProd LIKE '$dataTroca%' or validadeProd LIKE '$dataTroca%' ORDER BY NomeProd ASC";
	}
	else
	{
		$sqlTroca ="SELECT * FROM solicitacaotroca ORDER BY CodRefProd ASC";
	}
	$resultTroca = $conn->query($sqlTroca);




	if(!empty($_GET['search']))
	{
		$data = $_GET['search'];
		$sql ="SELECT * FROM produto WHERE CodRefProd LIKE '$data%' or NomeProd LIKE '$data%' or validadeProd LIKE '$data%' ORDER BY NomeProd ASC";
	}
	else
	{
		$sql ="SELECT * FROM produto ORDER BY CodRefProd ASC";
	}
	$result = $conn->query($sql);

	/*//FILTRO ORDEM ALFABETICA PRODUTOS
	$prods ="SELECT * FROM produto ORDER BY CodRefProd ASC";
	$result = $conn -> query($prods);

	if(isset($_POST['filter-cod-cres']))
    {
    $prods = "SELECT * FROM produto ORDER BY CodRefProd ASC";
    $result = $conn -> query($prods);
    }
    elseif(isset($_POST['filter-nome-cres']))
    {
            $prods = "SELECT * FROM produto ORDER BY NomeProd ASC";
            $result = $conn -> query($prods);
    }
    elseif(isset($_POST['filter-validade-cres']))
    {
            $prods = "SELECT * FROM produto ORDER BY validadeProd ASC";
            $result = $conn -> query($prods);
    }
	elseif(isset($_POST['filter-cod-dec']))
    {
            $prods = "SELECT * FROM produto ORDER BY CodRefProd DESC";
            $result = $conn -> query($prods);
    }
	elseif(isset($_POST['filter-nome-dec']))
    {
            $prods = "SELECT * FROM produto ORDER BY NomeProd DESC";
            $result = $conn -> query($prods);
    }
	elseif(isset($_POST['filter-validade-dec']))
    {
            $prods = "SELECT * FROM produto ORDER BY validadeProd DESC";
            $result = $conn -> query($prods);
    }


	//FILTRO ORDEM ALFABETICA TROCAS
	$prodTroca ="SELECT * FROM solicitacaotroca ORDER BY CodRefProd ASC";
	$resultroc = $conn -> query($prodTroca);

	if(isset($_POST['filter-cod-cres-troc']))
    {
    $prodTroca = "SELECT * FROM solicitacaotroca ORDER BY CodRefProd ASC";
    $resultroc = $conn -> query($prodTroca);
    }
    elseif(isset($_POST['filter-nome-cres-troc']))
    {
            $prodTroca = "SELECT * FROM solicitacaotroca ORDER BY NomeProd ASC";
            $resultroc = $conn -> query($prodTroca);
    }
    elseif(isset($_POST['filter-validade-cres-troc']))
    {
            $prodTroca = "SELECT * FROM solicitacaotroca ORDER BY validadeProd ASC";
            $resultroc = $conn -> query($prodTroca);
    }
	elseif(isset($_POST['filter-cod-dec-troc']))
    {
            $prodTroca = "SELECT * FROM solicitacaotroca ORDER BY CodRefProd DESC";
            $resultroc = $conn -> query($prodTroca);
    }
	elseif(isset($_POST['filter-nome-dec-troc']))
    {
            $prodTroca = "SELECT * FROM solicitacaotroca ORDER BY NomeProd DESC";
            $resultroc = $conn -> query($prodTroca);
    }
	elseif(isset($_POST['filter-validade-dec-troc']))
    {
            $prodTroca = "SELECT * FROM solicitacaotroca ORDER BY validadeProd DESC";
            $resultroc = $conn -> query($prodTroca);
    }
	
*/
?>
<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<title class="">Sistema Estoque</title>		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

		<style>
			/*Limpar formatações padrão*/
			body{
				font-size: 1em;
				font-family: "Arial", Helvetica, sans-serif;
				background: #e6e6e6;
			}

			/*Layout*/

			#cabecalho{
				background: #afafaf;
				padding-top: 10px;
				text-align: center;
			}

			#logo, #menu{
				padding: 5px;
			}

			#principal{
				padding: 15px;
				width: 80%;
				height: 100%;
				margin: 0px auto;
				
			}

			#rodape{
	
				text-align: center;
				padding: 5px;
			}


			.area1{
				padding: 10px;
				margin-bottom: 20px;
				background: white;
				height: 50%;
			}
			.area2{
				padding: 10px;
				margin-bottom: 20px;
				background: white;
				height: 50%;
			}


			/*Formatação do menu*/

			a{
				text-decoration: none;
			}

			#cabecalho a:link,#cabecalho a:visited{
				color: #FFF;
				padding: 8px 12px;
			}

			#cabecalho a:hover{
				color: #000000;
				background: #afafaf;
				text-decoration: none;
				border-radius: 10px;
			}


			a:hover{
				text-decoration: underline;
			}

			/*Formataçoes Gerais*/

			.usu{
				float: left;
				text-decoration: none;
				background: #afafaf;
				
			}
			.table-bg1{
				background: rgba(10,10,10,0.2);
			}
			
			.pad{
				padding: -20px;
			}
			.margin{
				margin-left: -150px;
			}
			.black{
				text-color: black;
			}
			.h1{
				color: black;
				font-weight: bold;
			}

		</style>
	</head>
	<body>
	
		<div id="cabecalho">
			<div id="logo">
				<h1 class="h1">SISTEMA DE ESTOQUE</h1>
				
			</div>
			

			<div id="menu">
				<span class="usu">USUARIO: JOSÉ </span>
				
				<a class="margin " href="adProd.php">Adicionar Produto</a>
				<a href="impCsv.php">Importar Planilha .CSV</a>
				<a href="pedidos.php">Fazer Pedidos</a>
				
			</div>
			
		</div>
		
		<div>
			<div id="principal">

				<div>
					
					<!--Tabela 1 -->
					<div class="area1 rounded ">
						<h2 class="text-center"> Produtos em Estoque</h2>
							<nav class="navbar bg-white">
								<div class="container-fluid">
										<!--<form method="post" action="index.php">
											<button  class="btn btn-sm btn-secondary" type="submit" name="filter-cod-cres" id="filter-cod-cres">COD A-Z</button>
											<button  class="btn btn-sm btn-secondary" type="submit" name="filter-cod-dec" id="filter-cod-dec">COD Z-A</button> -
											<button  class="btn btn-sm btn-secondary" type="submit" name="filter-nome-cres" id="filter-nome-cres">DESC A-Z</button>
											<button  class="btn btn-sm btn-secondary" type="submit" name="filter-nome-dec" id="filter-nome-dec">DESC Z-A</button> -
											<button  class="btn btn-sm btn-secondary" type="submit" name="filter-validade-cres" id="filter-validade-cres">VALID A-Z</button>
											<button  class="btn btn-sm btn-secondary" type="submit" name="filter-validade-dec" id="filter-validade-dec">VALID Z-A </button>
										</form>-->
										<div class="alert alert-warning" role="alert">
											<?php
											if(isset($dias)){
												if($dias > (-90) and $dias < 0){
													echo "Tem Produtos com menos de 3 meses para vencer";
											
												}
											}else{
												echo "...";
											}
											?>
										</div>
										<div class="d-flex">
											<input id="pesquisar" class="form-control me-2 " type="search" placeholder="Filtrar" aria-label="Search">
											<button onclick="searchData()" class="btn btn-secondary">Filtrar</button>
										</div>
								</div>
							</nav>
							
						<span class="data"></span>
						<div class="m-2">
							<table class="table text-center">
								<thead > 
									<tr class="table-bg1 ">
										<th scope="col">Código</th>
										<th scope="col">Descrição</th>
										<th scope="col">Valor R$</th>
										<th scope="col">Estoque</th>
										<th scope="col">Validade</th>
										<th scope="col">...</th>
									</tr>
								</thead>
								<tbody>
								<?php
										while($prod_data = mysqli_fetch_assoc($result)){
											echo "<tr>";
											echo "<td>".$prod_data['CodRefProd']."</td>";
											echo "<td>".$prod_data['NomeProd']."</td>";
											echo "<td> R$ ".$prod_data['valorProd']."</td>";
											echo "<td>".$prod_data['qtdeProd']."</td>";
											echo "<td>".date('d-m-Y',strtotime($prod_data['validadeProd']))."</td>";
											echo "<td>
													<a class='btn btn-sm btn-outline-secondary' href='editProd.php?id=$prod_data[CodRefProd]'>
														<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
															<path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
													  	</svg>
													</a>
													<a class='btn btn-sm btn-outline-secondary' href='deleteProd.php?id=$prod_data[CodRefProd]'>
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

					<!--Tabela 2 -->
					<div class="area2 rounded ">
						<h2 class="text-center text-danger"> Produtos Proximos do Vencimento (Menos de 2 meses)</h2>
							<nav class="navbar bg-white ">
								<div class="container-fluid ">
										<!--<form method="post" action="index.php">
											<button  class="btn btn-sm btn-secondary" type="submit" name="filter-cod-cres-troc" id="filter-cod-cres-troc">COD A-Z</button>
											<button  class="btn btn-sm btn-secondary" type="submit" name="filter-cod-dec-troc" id="filter-cod-dec-troc">COD Z-A</button> -
											<button  class="btn btn-sm btn-secondary" type="submit" name="filter-nome-cres-troc" id="filter-nome-cres-troc">DESC A-Z</button>
											<button  class="btn btn-sm btn-secondary" type="submit" name="filter-nome-dec-troc" id="filter-nome-dec-troc">DESC Z-A</button> -
											<button  class="btn btn-sm btn-secondary" type="submit" name="filter-validade-cres-troc" id="filter-validade-cres-troc">VALID A-Z</button>
											<button  class="btn btn-sm btn-secondary" type="submit" name="filter-validade-dec-troc" id="filter-validade-dec-troc">VALID Z-A </button>
										</form> -->
										<div>
											<h3 class="h5 text-white bg-danger p-2">SOLICITAÇÃO DE TROCA</h3>
										</div>
										<div class="d-flex">
											<input id="pesquisarTroca" class="form-control me-2" type="searchTroca" placeholder="Filtrar" aria-label="Search">
											<button onclick="searchDataTroca()" class="btn btn-secondary">Filtrar</button>
										</div>
								</div>
							</nav>
							
						<span class="data"></span>
						<div class="m-2">
							<table class="table text-center">
								<thead > 
									<tr class="table-bg1 ">
										<th scope="col">Código</th>
										<th scope="col">Descrição</th>
										<th scope="col">Valor R$</th>
										<th scope="col">Estoque</th>
										<th scope="col">Validade</th>
										<th scope="col">...</th>
									</tr>
								</thead>
								<tbody>
								<?php
								
										while($prod_troca_data = mysqli_fetch_assoc($resultTroca)){
											echo "<tr>";
											echo "<td>".$prod_troca_data['CodRefProd']."</td>";
											echo "<td>".$prod_troca_data['NomeProd']."</td>";
											echo "<td> R$ ".$prod_troca_data['valorProd']."</td>";
											echo "<td>".$prod_troca_data['qtdeProd']."</td>";
											echo "<td class='text-danger'>".date('d-m-Y',strtotime($prod_troca_data['validadeProd']))."</td>";
											echo "<td>
													<a class='btn btn-sm btn-outline-secondary' href='editTroca.php?id=$prod_troca_data[CodRefProd]'>
														<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
															<path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
													  	</svg>
													</a>
													<a class='btn btn-sm btn-outline-secondary' href='deleteTroca.php?id=$prod_troca_data[CodRefProd]'>
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


					</div> <!--Fechamento da Tabela 2 -->

				</div>
				
				<div id="rodape">
					Todos os direitos reservados a ... &copy;
				</div>

			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	</body>
	<script>
		var search = document.getElementById('pesquisar');

		search.addEventListener("keydown", function(event){
			if (event.key == "Enter"){
				searchData();
			}		
		})
		function searchData()
		{
			window.location = 'index.php?search='+search.value;
		}


		var searchTroca = document.getElementById('pesquisarTroca');

		searchTroca.addEventListener("keydown", function(event){
			if (event.key == "Enter"){
				searchDataTroca();
			}		
		})
		function searchDataTroca()
		{
			window.location = 'index.php?searchT='+searchTroca.value;
		}
		
	</script>
</html>