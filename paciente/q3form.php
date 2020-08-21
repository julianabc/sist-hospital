<?php  

if (isset($_POST['submit'])) {

	// conectando ao banco	
	include 'conexao.php';

	// pegando dados do form
	$nome = $_POST['fnome'];
	$cpf = $_POST['fcpf'];
	$idade = $_POST['fidade'];
	$peso = $_POST['fpeso'];
	$doseDiaria1 = $_POST['fddiaria1'];
	$diasTratamento1 = $_POST['fdiastrat1'];

	$doseDiaria2 = $_POST['fddiaria2'];
	$diasTratamento2 = $_POST['fdiastrat2'];

	// consulta de quantidade de leitos
	$leitos = mysqli_query($conn, "SELECT id FROM pacientes");
	$num_leitos = mysqli_num_rows($leitos);
	

	if ($num_leitos < 4) {

		// tirar as mascaras do cpf
		$cpf = preg_replace( '/[^0-9]/is', '', $cpf );
		
		if(strlen($cpf) == 11){ // verificar a quantidade de digitos no cpf
			
			// verificar se a pessoa já está cadastrada
			$sql_cpf = mysqli_query($conn, "SELECT cpf FROM pacientes WHERE cpf = '$cpf'");
			$num_cpf = mysqli_num_rows($sql_cpf);

			if ($num_cpf == 1) {

				$_SESSION['aviso_cpf'] = "Verifique o CPF. Este paciente já está cadastrado.";

			}else{

				// verificação de medicamentos
				
				if (!empty($_POST['ftipo1']) || !empty($_POST['ftipo2'])) {
					
					$tipo1 =$_POST['ftipo1'];
					$tipo2 =$_POST['ftipo2'];

					if ($tipo1 == $tipo2) {

						$_SESSION['aviso_tipo'] = "Erro ao cadastrar! Tipos iguais não são permitidos.";
						
					
					}else{
						// verificar se há no estoque a combinação certa da receita
						$sql_doses1 = mysqli_query($conn, "SELECT id FROM estoque WHERE quantDoses > '$doseDiaria1' 
							AND tipo = '$tipo1' ");
					
						$sql_doses2 = mysqli_query($conn, "SELECT id FROM estoque WHERE quantDoses > '$doseDiaria2'
							AND tipo = '$tipo2' ");

							if ($sql_doses1 AND $sql_doses2) {

								// passando por todas as verificações, começa a inserir
								$sql_paciente = "INSERT INTO pacientes(nome, cpf, idade, peso) VALUES('$nome', '$cpf', '$idade', '$peso')";
								$gravar_paciente = mysqli_query($conn, $sql_paciente);

						 		$id = mysqli_insert_id($conn);

						 		// medicamentos	
								$sql_medicamentos1 = "INSERT INTO medicamentos(doseDiaria, diasTratamento, Pacientes_id, Estoque_id) VALUES('$doseDiaria1', '$diasTratamento1','$id', 1)";  
								$gravar_medicamentos1 = mysqli_query($conn, $sql_medicamentos1);


								$sql_medicamentos2 = "INSERT INTO medicamentos(doseDiaria, diasTratamento, Pacientes_id, Estoque_id) VALUES('$doseDiaria2', '$diasTratamento2','$id', 2)";  
								$gravar_medicamentos2 = mysqli_query($conn, $sql_medicamentos2);

								// redirecionar para o formulario
								header('Location: http://localhost/web/ad2/questao3/confirmacaoq3.html');

							}else if ($sql_doses1 || $sql_doses2) {
					
								// passando por todas as verificações, começa a inserir
								$sql_paciente = "INSERT INTO pacientes(nome, cpf, idade, peso) VALUES('$nome', '$cpf', '$idade', '$peso')";
								$gravar_paciente = mysqli_query($conn, $sql_paciente);

						 		$id = mysqli_insert_id($conn);

							
						 		$sql_medicamentos1 = "INSERT INTO medicamentos(doseDiaria, diasTratamento, Pacientes_id, Estoque_id) VALUES('$doseDiaria1', '$diasTratamento1','$id', 1)";   
								$gravar_medicamentos1 = mysqli_query($conn, $sql_medicamentos1);


								// redirecionar para o formulario
								header('Location: http://localhost/web/ad2/questao3/confirmacaoq3.html');

							}else{
								$_SESSION['aviso_dose'] = "Não há doses suficientes para nenhum dos medicamentos.";
							}

					} // fim do else de tipo (feito para gravar em banco)
					
				}else{

					$_SESSION['aviso_tipo'] = "Erro ao cadastrar! Selecione um tipo de medicamento.";
				
				}	

			} // fim do if das validações

		}else{
			
			$_SESSION['aviso_cpf'] = "CPF inválido.";	
		} // fim do cpf
		
	}else{

		$_SESSION['erro_leitos'] = "Não foi possível cadastrar. Faltam leitos!";
	
	} // fim do if relacionado aos leitos


	// include do form
	include 'questao3.php';

} // fim do isset


?>