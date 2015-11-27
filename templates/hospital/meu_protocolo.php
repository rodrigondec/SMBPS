<?php 
    $indicador = select('*', 'indicador', 'id', $_GET['id']);
    $protocolo = select('*', 'protocolo', '(id_hospital, id_indicador, ativo)', '('.$_SESSION['id_hospital'].', '.$_GET['id'].', \'1\')', false);
    $data_limite = explode('-', date('Y-m-d'));
    $data_limite[0] = ''.(intval($data_limite[0])-2); // 2 = quantidade de anos. 2 anos.
    $data_limite = implode('-', $data_limite);  
?>
<div class='text-center'>
	<h2>Meu Protocolo <?php echo $indicador['nome']; ?></h2>
	<hr />
</div>
<?php 
	if(!$protocolo):
		echo "<div class='text-center text-danger'><h3>Seu hospital não possui esse protocolo Cadastrado. Favor cadastra-lo.</h3></div>";
		include_once('cadastrar_protocolo.php');
	else:
		if(strtotime($protocolo['data']) >= strtotime($data_limite)):
			echo "<div class='text-center text-success'><h3>Seu hospital tem esse protocolo e ele está válido!</h3></div>";
		?>
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
			echo "<div class='text-center text-warning'><h3>Esse protocolo do seu hospital já é muito antigo. Favor cadastra-lo novamente.</h3></div>";
			include_once('alterar_protocolo.php');
		endif;
	endif;
?>