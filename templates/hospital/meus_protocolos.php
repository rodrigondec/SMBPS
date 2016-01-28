<div class='text-center'>
	<h2>Meus Protocolos</h2>
	<hr />
</div>
<?php 
    $indicadores = select_many('id, nome', 'indicador');
    $data_limite = explode('-', date('Y-m-d'));
    $data_limite[0] = ''.(intval($data_limite[0])-2); // 2 = quantidade de anos. 2 anos.
    $data_limite = implode('-', $data_limite);  
    echo "<script type='text/javascript'>var num_indicadores = ".count($indicadores).";</script>"
?>

<div class='container'>
	<!-- MENU DE SELEÇÃO -->
	<div class="list-group col-lg-2 col-md-2 col-sm-2 col-xs-3">
	<?php 
	    foreach ($indicadores as $num => $indicador):
	?>
		<a id='nav_indicador_<?php echo $indicador['id']; ?>' class="list-group-item <?php if($num == 0){ echo 'active'; } ?>" <?php echo "onclick='show_hide_indicador(".$indicador['id'].")'" ?> href="#">
			<?php echo $indicador['nome']; ?>
		</a>
	<?php 
	    endforeach;
	?>
	</div>
	<!-- PROTOCOLOS -->
	<?php 
	    foreach ($indicadores as $num => $indicador):
	?>
	<div id='indicador_<?php echo $indicador['id']; ?>' class='col-md-5 col-lg-5 col-sm-5 col-xs-6 center <?php if($num != 0){ echo "hidden"; } ?>'>
		<h3 class='text-center'><?php echo $indicador['nome']; ?></h3>
		<?php 
			$protocolo = select('*', 'protocolo', '(id_hospital, id_indicador, ativo)', '('.$_SESSION['id_hospital'].', '.$indicador['id'].', \'1\')', false);

			if(!$protocolo):
		?>	
			<h4 class='text-danger text-center'>Seu hospital não possui esse protocolo cadastrado. Favor cadastra-lo.</h4>
			<form enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER['PHP_SELF']).'?id='.$indicador['id'];?>" method="post">
				<div class='form-group'>
					<label for="data">Data</label>
					<input class='form-control' type='date' name='data' required/>
				</div>
				<div class='form-group'>
					<label for="imagem">Imagem</label>
					<input id="input-1" type="file" class="file" name='imagem' enctype="multipart/form-data" required />
				</div>
				<div class='text-center'>
					<button class='btn btn-danger' type='reset'>Apagar</button>
					<button class='btn btn-primary' type='submit'>Cadastrar</button>
				</div>
			</form>
		<?php
		else:
			if(strtotime($protocolo['data']) >= strtotime($data_limite)):
			?>
			<h4 class='text-center text-success'>Seu hospital tem esse protocolo e ele está válido!</h4>
			<div class="table-responsive container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Data</th>
						<th>Válido até</th>
						<th class='col-lg-1 col-md-1 col-sm-1'>Imagem</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $protocolo['data']; ?></td>
						<td>
							<?php 
							    $data = explode('-', $protocolo['data']);
							    $data[0] = ''.(intval($data[0])+2);
							    $data = implode('-', $data);

							    echo $data;
							?>
						</td>
						<td class='col-lg-1 col-md-1 col-sm-1'>
							<?php 
								$nome_imagem = select('nome', 'imagem', 'id', $protocolo['id_imagem'])['nome'];
							?>
							<a class='btn btn-info' data-toggle="modal"  data-target="#myModalimg<?php echo $protocolo['id_imagem']; ?>">
								Visualizar
							</a>
							<!-- Modal -->
							<div id="myModalimg<?php echo $protocolo['id_imagem']; ?>" class="modal fade" role="dialog">
						  		<div class="modal-dialog modal-lg">
								    <!-- Modal content-->
								    <div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title text-left">Imagem</h4>
										</div>
										<div class="modal-body text-center">
											<img src="<?php echo PROTOCOLOS.$nome_imagem; ?>" width="100%">
										</div>
								    </div>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			</div>
		<?php
			else:
				echo "";
		?>	
			<h4 class='text-center text-warning'>
				Esse protocolo do seu hospital já é muito antigo. Favor cadastra-lo novamente.
			</h4>
				<form enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER['PHP_SELF']).'?id='.$indicador['id'];?>" method="post">
					<div class='form-group text-left'>
						<label for="data">Data</label>
						<input class='form-control' type='date' name='data' required/>
					</div>
					<div class='form-group text-left'>
						<label for="data">imagem</label>
					<input id="input-1" type="file" class="file" name='imagem' enctype="multipart/form-data" required />
					</div>
					<div class='text-center'>
						<button class='btn btn-danger' type='reset'>Apagar</button>
						<button class='btn btn-primary' type='submit'>Cadastrar</button>
					</div>
				</form>
		<?php
			endif;
		endif;
	?>
	</div>	
	<?php 
		endforeach;
	?>	
</div>