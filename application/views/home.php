<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Gerenciador de arquivos</title>

	<!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- javascript -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="text-center my-4">
			<h3>Sistema de gerência de arquivos</h3>
			<h4 class="text-left" style="color: #3CB371"><?php echo $msg; ?></h4>
			<form action="<?php echo base_url();?>principal/salvarArquivo" method="post" enctype="multipart/form-data">
				<div class="form-group my-4">
					<input type="file" name="arquivo" class="form-control" accept=".pdf, .jpg, .png, .doc, .docx, .zip, .rar, .pptx" required="">
				</div>
				<div class="text-right"><button class="btn btn-primary">Salvar arquivos</button></div>
			</form>
		</div>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Arquivo</th>
					<th>Baixar</th>
					<th>Excluir</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach($arquivos as $fl){
					echo "<tr>";
					echo "<td>".$fl->nome."</td>";
					echo "<td><a href='/principal/baixar/".$fl->ID."'<button class='btn btn-primary'>Ir</button></a></td>";
					echo "<td><a href='/principal/excluir/".$fl->ID."' <button class='btn btn-danger' onclick='return deleteArquivo()'>Ir</button></td>";
					echo "</tr>";
				}
				?>:
			</tbody>
		</table>
	</div>

	<script type="text/javascript">
		
		function deleteArquivo(){

			var r = confirm("Deseja realmente excluir este arquivo?");

			if(r){

				return r;

			} else{

				return false;
			}
		}
	</script>
</body>
</html>