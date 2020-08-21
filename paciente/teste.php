<?php 

include 'conexao.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="#" method="post">
		<label for="dosef">Dose diaria</label>
		<input type="text" name="dosef"><br><br>
		<label for="diasf">dias de tratamento</label>
		<input type="text" name="diasf"><br><br>

		<input type="submit" value="Cadastrar" name="submit">
	</form>
	
	<?php 

		if (isset($_POST['submit'])) {
			if (!empty($_POST['dosef']) AND !empty($_POST['diasf'])) {

				// resolver problemas da  chave estrangeira
				// pegar os dados
				$dose = $_POST['dosef'];
				$dias = $_POST['diasf'];

				$sql = "INSERT INTO medicamentos(doseDiaria, diasTratamento, Pacientes_id, Estoque_id) 
				values('$dose','$dias', 1, 1)";
				mysqli_query($conn, $sql);
			}else{
				echo "nao foi possivel gravar em medicamentos";
			}
		} // fim do isset
		
		
	 ?>


</body>
</html>