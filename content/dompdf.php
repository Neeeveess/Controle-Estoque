<?php	
 	include_once ('config/connect.php');
	

	 if(isset($_POST['cadastrar'])){
		$nomeCliente = $_POST['nome'];
		$endCliente = $_POST['end'];
		$telCliente = $_POST['tel'];
		$cpfCliente = $_POST['cpf']; 

	}
        

		
		$html = "<!DOCTYPE html>";
		$html .= "<html lang='pt-br'>";
		$html .= "<head>";
		$html .= "<meta charset='utf-8'>";
		$html .= "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx' crossorigin='anonymous'>";
		$html .= "<title>PDF</title>";
		$html .= "</head>";
		$html .= "<body>";
		$html .= '<center><h3>Dados do Cliente</h3></center>';
		$html .= '<strong>Nome: </strong>'.$nomeCliente .'<br>';
		$html .= '<strong>Endereço: </strong>'.$endCliente.'<br>';
		$html .= '<strong>Telefone: </strong>'.$telCliente.'<br>';
		$html .= '<strong>Cpf: </strong>'.$cpfCliente.'<br><hr>';
		$html .= "<div>";
		$html .= "<table class='table text-center'>"; 
		$html .= '<thead>';
		$html .= '<tr>';
		$html .= '<th scope="col" style="padding-right: 50px;">Codigo</th>';
		$html .= '<th scope="col" style="padding-right: 300px;">Nome</th>';
		$html .= '<th scope="col" style="padding-right: 100px;">Valor</th>';
		$html .= '<th scope="col">Quantidade</th>';
		$html .= '</tr>';
		$html .= '</thead>';
		$html .= '<tbody>';

		$teste = "SELECT * FROM pedido";
		$result = $conn -> query($teste);
		while ($linha = mysqli_fetch_assoc($result)) {
			$html .= '<tr><td>'.$linha['CodRefProd'] . "</td>";
			$html .= '<td>'.$linha['NomeProd'] . "</td>";
			$html .= '<td>'.$linha['valorProd'] . "</td>";
			$html .= '<td>'.$linha['qtdeProd'] . "</td></tr>";
		}
		$html .= '</tbody>';
		$html .= '</table';
		$html .= "</div>";
		$html .= "</body>";
		

		
	// referenciando o namespace do dompdf
	
	use Dompdf\Dompdf;
	
	require 'dompdf/vendor/autoload.php';

	// instanciando o dompdf
	
	$dompdf = new DOMPDF();
	
	
	//inserindo o HTML que queremos converter
	
	$dompdf->loadHtml($html);
	
	// Definindo o papel e a orientação
	
	$dompdf->setPaper('A4', 'landscape');
	
	// Renderizando o HTML como PDF
	
	$dompdf->render();
	
	// Enviando o PDF para o browser
	
	$dompdf->stream(
		"Pedido",
		array(
			"Attachment"=>false
		)
	);

?>