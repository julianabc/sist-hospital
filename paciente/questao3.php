<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Pacientes</title>
	<meta charset="utf-8">
</head>
<body>
	<form action="q3form.php" method="post">
		<fieldset>
			<legend>Cadastro de Pacientes</legend>
			
			<label for="fnome">Nome</label>
			<input type="text" name="fnome" id="fnome" required><br><br>
			 
			<label for="fcpf">CPF</label>
			<input type="text" name="fcpf" id="fcpf" required>
			<?php 

				if (isset($_SESSION['aviso_cpf'])) {
					echo'<div style="color: red">'.$_SESSION["aviso_cpf"].'</div>';
					unset($_SESSION['aviso_cpf']);
				}
			?><br><br>
			<label for="fidade">Idade</label>
			<input type="number" id="fidade" name="fidade" required><br><br>

			<label for="fpeso">Peso</label>
			<input type="text" id="fpeso" name="fpeso" required><br><br>
			
			<fieldset>
			<legend>Primeiro Medicamento:</legend>

			<label for="fddiaria1">Dose Diária</label>
			<input type="number" id="fddiaria1" name="fddiaria1" required><br><br>
			<?php 

				if (isset($_SESSION['aviso_dose'])) {
					echo'<div style="color: red">'.$_SESSION['aviso_dose'].'</div>';
					unset($_SESSION['aviso_dose']);
				}
			?>

			<label for="fdiastrat1">Dias de Tratamento</label>
			<input type="number" id="fdiastrat1" name="fdiastrat1" required><br><br>

			<label>Tipo:</label><br>

			<input type="radio" id="antibiótico" name="ftipo1" value="antibiótico">
  			<label for="antibiótico">Antibiótico</label>
  			<input type="radio" id="anti-inflamatório" name="ftipo1" value="anti-inflamatório">
  			<label for="anti-inflamatório">Anti-Inflamatório</label><br>
			</fieldset><br>

			<fieldset>
			<legend>Segundo Medicamento:</legend>
		
			<label for="fddiaria2">Dose Diária</label>
			<input type="number" id="fddiaria2" name="fddiaria2" required><br><br>
			<?php 

				if (isset($_SESSION['aviso_dose'])) {
					echo'<div style="color: red">'.$_SESSION['aviso_dose'].'</div>';
					unset($_SESSION['aviso_dose']);
				}
			?>
			

			<label for="fdiastrat2">Dias de Tratamento</label>
			<input type="number" id="fdiastrat2" name="fdiastrat2" required><br><br>

			<label>Tipo:</label><br>	

  			<input type="radio" id="antibiótico" name="ftipo2" value="antibiótico">
  			<label for="antibiótico">Antibiótico</label>
  			<input type="radio" id="anti-inflamatório" name="ftipo2" value="anti-inflamatório">
  			<label for="anti-inflamatório">Anti-Inflamatório</label><br>

			<?php 

				if (isset($_SESSION['aviso_tipo'])) {
					echo'<div style="color: red">'.$_SESSION['aviso_tipo'].'</div>';
					unset($_SESSION['aviso_tipo']);
				}
			?>
			</fieldset><br>

			<?php 

				if (isset($_SESSION['erro_leitos'])) {
					echo'<div style="color: red">'.$_SESSION["erro_leitos"].'</div>';
					unset($_SESSION['erro_leitos']);
				}
			?>
		  			
			<input type="submit" value="Cadastrar" name="submit">
		</fieldset>
	</form>
</body>
</html>