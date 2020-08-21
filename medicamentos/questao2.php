<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Medicamentos</title>
	<meta charset="utf-8">
</head>
<body>
	<form action="q2form.php" method="post">
		<fieldset>
			<legend>Cadastro de Medicamentos</legend>
			<label for="fcaixa">Quant. Caixas</label>
			<input type="number" name="fcaixa" id="fcaixa" required>
			<?php 
				
				if (isset($_SESSION['erro_caixa'])) {
					echo'<div style="color: red">'.$_SESSION["erro_caixa"].'</div>';
					unset($_SESSION['erro_caixa']);
				}  
				
			?><br>
			<label for="fqtdoses">Quant. Doses</label>
			<input type="number" name="fqtdoses" id="fqtdoses" required><br><br>

			<label for="fpreco">Preços</label>
			<input type="text" id="fpreco" name="fpreco" required><br><br>

			<label>Tipos</label>
			<input type="radio" id="antibiótico" name="ftipo" value="antibiótico">
  			<label for="antibiótico">Antibiótico</label>
  			<input type="radio" id="anti-inflamatório" name="ftipo" value="anti-inflamatório">
  			<label for="anti-inflamatório">Anti-Inflamatório</label><br>

  			<?php  
  				if (isset($_SESSION['erro_estoque'])) {
					echo'<div style="color: #F00;">'.$_SESSION["erro_estoque"].'</div>';
					unset($_SESSION['erro_estoque']);
				}
				if (isset($_SESSION['erro_tipo'])) {
					echo'<div style="color: #F00;">'.$_SESSION["erro_tipo"].'</div>';
					unset($_SESSION['erro_tipo']);
				}

  			?><br>
			<input type="submit" value="Cadastrar" name="submit">
		</fieldset>
	</form>

</body>
</html>