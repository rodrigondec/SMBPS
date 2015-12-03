<?php 
    $notificacoes = select_many('*', 'notificação');
    $usuario_notificacoes = select_many('*', 'usuário_notificação');
    $usuarios = select_many('*', 'usuário');
?>
<div class='text-center'>
	<h2>Notificações</h2>
	<hr />
</div>
<div class='container'>
	<!-- MENU DE SELEÇÃO -->
	<div class="list-group col-lg-2 col-md-2 col-sm-2 col-xs-6">
		<a id='nav_notificacoes' href="#" class="list-group-item active" onclick='show_notificacoes();'>Notificações</a>
		<a id='nav_usuario_notificacoes' href="#" class="list-group-item" onclick='show_usuario_notificacoes();'>Usuário Notificiações</a>
	</div>
	<!-- NOTIFICACOES -->
	<div id='notificacoes' class="table-responsive col-lg-9 center">
		<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
				<tr>
					<th class='col-lg-1 col-md-1 col-sm-1'>Id</th>
					<th>Título</th>
					<th>Texto</th>
					<th class='col-lg-1 col-md-1 col-sm-1'></th>
				</tr>
			</thead>
			<tbody>
			<?php 
			    foreach ($notificacoes as $key => $value):
			?>
				<tr>
					<td class='col-lg-1 col-md-1 col-sm-1'>
						<?php echo $notificacoes[$key]['id']; ?>
					</td>
					<td>
						<?php echo $notificacoes[$key]['título']; ?>
					</td>
					<td>
						<?php echo $notificacoes[$key]['texto']; ?>
					</td>
					<td class='col-lg-1 col-md-1 col-sm-1'>
						<a class='btn btn-primary' data-toggle="modal"  data-target="#myModal_notificacao<?php echo $notificacoes[$key]['id']; ?>">
							Alterar
						</a>
						<!-- Modal -->
						<div id="myModal_notificacao<?php echo $notificacoes[$key]['id']; ?>" class="modal fade" role="dialog">
					  		<div class="modal-dialog modal-sm">
							    <!-- Modal content-->
							    <div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Alterar Notificação</h4>
									</div>
									<div class="modal-body">
										<form method='post'>
											<input class='hidden' type='text' name='form' value='notificacoes' />
											<input type='number' name='id' value="<?php echo $notificacoes[$key]['id']; ?>" hidden required />
											<div class='form-group'>
		                        				<label for='título'>Título</label>
												<input class='form-control' type='text' name='título' value="<?php echo $notificacoes[$key]['título']; ?>" placeholder='Título' required />
											</div>
											<div class='form-group'>
		                        				<label for='text'>Texto</label>
												<textarea class='form-control' name='texto' required><?php echo $notificacoes[$key]['texto']; ?></textarea>
											</div>
											<input type='submit' value='Alterar' class='btn btn-primary' />
										</form>
									</div>
							    </div>
						  </div>
						</div>
					</td>
				</tr>
			<?php
			    endforeach;
			?>
			</tbody>
		</table>
	</div>
	<!-- USUÁRIO NOTIFICAÇÕES -->
	<div id='usuario_notificacoes' class="table-responsive col-lg-9 center hidden">
	<table class="table table-striped table-bordered table-hover table-condensed">
		<thead>
			<tr>
				<th class='col-lg-1 col-md-1 col-sm-1'>Id</th>
				<th>Usuário</th>
				<th>Notificação</th>
				<th>Status</th>
				<th class='col-lg-1 col-md-1 col-sm-1'></th>
			</tr>
		</thead>
		<tbody>
		<?php 
		    foreach ($usuario_notificacoes as $key => $value):
		?>
			<tr>
				<td class='col-lg-1 col-md-1 col-sm-1'>
					<?php echo $usuario_notificacoes[$key]['id']; ?>
				</td>
				<td>
					<?php 
						echo select('nome', 'usuário', 'id', $usuario_notificacoes[$key]['id_usuário'])['nome']; 
					?>
				</td>
				<td>
					<?php 
						echo select('título', 'notificação', 'id', $usuario_notificacoes[$key]['id_notificação'])['título']; 
					?>
				</td>
				<td>
					<?php 
						if($usuario_notificacoes[$key]['ativa'] == '1'){
							echo 'Ativa';
						}
						else if($usuario_notificacoes[$key]['ativa'] == '0'){
							echo 'Inativa';
						}
						else{
							exit('Status Inesperado');
						}
						
					?>
				</td>
				<td class='col-lg-1 col-md-1 col-sm-1'>
					<a class='btn btn-primary' data-toggle="modal"  data-target="#myModal_usuario_notificacao<?php echo $usuario_notificacoes[$key]['id']; ?>">
						Alterar
					</a>
					<!-- Modal -->
					<div id="myModal_usuario_notificacao<?php echo $usuario_notificacoes[$key]['id']; ?>" class="modal fade" role="dialog">
				  		<div class="modal-dialog modal-sm">
						    <!-- Modal content-->
						    <div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Alterar Notificação</h4>
								</div>
								<div class="modal-body">
									<form method='post'>
										<input class='hidden' type='text' name='form' value='usuario_notificacoes' />
										<input type='number' name='id' value="<?php echo $usuario_notificacoes[$key]['id']; ?>" hidden required />
										<div class='form-group'>
											<label for='id_usuário'>Usuário</label>
											<select class='form-control selectpicker' name='id_usuário' data-style="btn-info" data-live-search='true' required>
												<?php 
													foreach ($usuarios as $key2 => $value):
												?>
												<option value='<?php echo $usuarios[$key2]['id']; ?>' <?php if($usuario_notificacoes[$key]['id_usuário'] == $usuarios[$key2]['id']){echo 'selected';} ?>>
													<?php echo $usuarios[$key2]['nome']?>
												</option>
												<?php
													endforeach;
												?>
											</select>
										</div>
										<div class='form-group'>
											<label for='id_notificação'>Notificação</label>
											<select class='form-control selectpicker' name='id_notificação' data-style="btn-info" data-live-search='true' required>
												<?php 
													foreach ($notificacoes as $key2 => $value):
												?>
												<option value='<?php echo $notificacoes[$key2]['id']; ?>' <?php if($usuario_notificacoes[$key]['id_notificação'] == $notificacoes[$key2]['id']){echo 'selected';} ?>>
													<?php echo $notificacoes[$key2]['título']?>
												</option>
												<?php
													endforeach;
												?>
											</select>
										</div>
										<div class='form-group'>
											<label for='id_notificação'>Status</label>
											<select class='form-control selectpicker' name='ativa' data-style="btn-info" data-live-search='true' required>
												<option value='1' <?php if($usuario_notificacoes[$key]['ativa'] == '1'){echo 'selected';} ?>>
													Ativa
												</option>
												<option value='0' <?php if($usuario_notificacoes[$key]['ativa'] == '0'){echo 'selected';} ?>>
													Inativa
												</option>
											</select>
										</div>
										<input type='submit' value='Alterar' class='btn btn-primary' />
									</form>
								</div>
						    </div>
					  </div>
					</div>
				</td>
			</tr>
		<?php
		    endforeach;
		?>
		</tbody>
	</table>
	</div>
</div>
<?php 
    if(count($_POST) > 0){
    	$update['banco'] = '';
    	if($_POST['form'] == 'notificacoes'){
			$update['banco'] = 'notificação';
		}
		else if($_POST['form'] == 'usuario_notificacoes'){
			$update['banco'] = 'usuário_notificação';
		}
		else{
			exit("Parâmetro inesperado!");
		}

    	unset($_POST['form']);

    	foreach($_POST as $key => $value){
    		if($key != 'id'){
    			$dados[$key] = $value;
    		}
    	}

    	if(update($dados, $update['banco'], 'id', $_POST['id'])){
    		ob_clean();
    		header('LOCATION: '.ADMIN.'listar_notificacoes');
    	}
    }
?>