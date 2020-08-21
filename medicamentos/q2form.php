<?php
if (isset($_POST['submit'])) {

	// incluindo o arquivo de conexão ao banco
	include 'conexao.php';

	// recebendo dados do formulario 
	$caixas = $_POST['fcaixa'];
	$quant_doses = $_POST['fqtdoses'];
	$preco = $_POST['fpreco'];
	$tipo = $_POST['ftipo'];
		
	// criando query para inserção no banco de dados
	$sql = "INSERT INTO estoque(caixasDisponiveis, quantDoses, preco, tipo) VALUES('$caixas', '$quant_doses', '$preco', '$tipo')";

	// verificando a quantidade de tipos
	$result = mysqli_query($conn, 'SELECT tipo FROM estoque');
	$num_rows = mysqli_num_rows($result);


	if ($caixas <= 10 ) {
		
		if ($num_rows < 5) {
			
			// gravar em banco de dados
			mysqli_query($conn, $sql);
	
		// redireciona para o formulario
		header('Location: http://localhost/web/ad2/questao2/confirmacao.php');	

		}else{

			$_SESSION["erro_estoque"] = "Não foi possivel cadastrar o medicamento! Estoque cheio.";	
		} // fim do estoque

	}else{
		$_SESSION["erro_caixa"] = "Erro ao gravar! O limite máximo é de 10 caixas.";
	} // fim de caixas
	
	if ($num_rows >= 1) {
		// verificar a existencia de um dos tipos de medicamentos
		$result_tipo1 = mysqli_query($conn, 'SELECT tipo FROM estoque WHERE tipo="antibiótico"');
		$result_tipo2 = mysqli_query($conn, 'SELECT tipo FROM estoque WHERE tipo="anti-inflamatório"');

		$cont_tipo1 = mysqli_num_rows($result_tipo1);
		$cont_tipo2 = mysqli_num_rows($result_tipo2);

		// else if 
		if ($cont_tipo1 == 0) {

			$_SESSION["erro_tipo"] = "Fique atento. Não há antibióticos!";

		}else if ($cont_tipo2 == 0) {
				
			$_SESSION["erro_tipo"] = "Fique atento. Não há anti-inflamatórios!";
		}else{
			header('Location: http://localhost/web/ad2/questao2/confirmacao.php');
		} // fim do if else

	} // fim do if num_rows
	
	// incluindo o form
	include 'questao2.php';

} // fim do isset

?>