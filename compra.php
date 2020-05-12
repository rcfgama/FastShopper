<!DOCTYPE html>
<html>
<!-- Arquivo que monta a lista de compras na página Fast Shoper. Desenvolvida por Ronaldo Gama - versão 1.3 -->
	<head>
		<title>FastShoper</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<header>
			<img src="fast.png" width="250px"><strong>LISTA DE COMPRAS</strong>
		</header>
		<div class="home">
			<table align="center" border="1">
				<tr>
					<td><strong>TOTAL ESTIMADO(R$)</strong></td>
				</tr>
				<?php
					include("conecta.php");
					$resultado = mysqli_query($conexao, "SELECT SUM(round(TOTAL,2)) AS totalPreco FROM produtos WHERE COMPRAR = 'CARRO'");
					while($linhas = mysqli_fetch_array($resultado)) {
					$resultEst = mysqli_query($conexao, "SELECT SUM(round(TOTAL,2)) AS totalEstm FROM produtos WHERE COMPRAR = 'COMPRA'");
					while($linEst = mysqli_fetch_array($resultEst)) {?>
						<tr>
							<td><?=$linEst['totalEstm']+$linhas['totalPreco']?></td>
						</tr>
				<?php   }?>
				<tr>
					<td><strong>TOTAL DA COMPRA(R$)</strong></td>
				</tr>
				<?php?>
						<tr>
							<td><?=$linhas['totalPreco']?></td>
						</tr>
				<?php   }?>
			</table>
			<br>
				<p>
					<a href="insere.php">INSERIR NOVO PRODUTO</a>
					<a href="carro.php">IR PRA CARRINHO</a>
					<a href="edita.php">EDITAR LISTA</a>
					<a href="index.php">VOLTAR</a>
				</p>
			<br>
			<table align="center" border="1">
				<tr>
					<td><strong>PRODUTO</strong></td>
					<td><strong>UNID.</strong></td>
					<td><strong>VALOR(R$)</strong></td>
					<td><strong>QUANT.</strong></td>
					<td><strong>TOTAL(R$)</strong></td>
					<td width="10"><strong>ALTERAR</strong></td>
					<td width="10"><strong>REMOVER</strong></td>
					<td width="10"><strong>CARRINHO</strong></td>
				</tr>
				<?php
				$seleciona = mysqli_query($conexao, "SELECT * FROM `produtos` WHERE COMPRAR = 'COMPRA'");
					while($campo = mysqli_fetch_array($seleciona)) {?>
						<tr>
							<td><?=$campo["NOME"]?></td>
							<td><?=$campo["UNID"]?></td>
							<td><?=$campo["VALOR"]?></td>
							<td><?=$campo["QTD"]?></td>
							<td><?=$campo["TOTAL"]?></td>
							<td><a href="altera.php?id=<?=$campo["ID"]?>">Editar</a></td>
							<td><a href="down.php?id=<?=$campo["ID"]?>">Remover</a></td>
							<td><a href="upcar.php?id=<?=$campo["ID"]?>">Enviar</a></td>
						</tr>
				<?php	}?>	
			</table>	
		</div>
		<footer>
			Desenvolvido por Ronaldo Gama - versão 1.3
		</footer>
	</body>
</html>