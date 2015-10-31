<style type="text/css">
	
	h5{
		color: gray;
	}
	p{
		font-weight: bold;
	}
	span.obrigatorio{
		font-weight: normal;
		color: red;
	}
</style>

<h1 align="center">MONITORAMENTO DOS INDICADORES DE BOAS PRÁTICAS</h1>
<div align='center' style='margin-left:25%;margin-right:25%'>
	<div align='left'>
	<br /><br /><br />
	<span class='obrigatorio'>*obrigatorio</span>
	<br /><br />

	<form action='<?php echo $_SERVER['PHP_SELF']?>' method='post'>

		<div>
			<p>
				Data de avaliação <span class='obrigatorio'>*</span>
			</p>
			<input type='date' name='data_avaliacao' required />
		</div>
		
		<div>
			<p>
				Nome completo do responsável pela avaliação <span class='obrigatorio'>*</span>
			</p>
			<input type='text' name='nome_responsavel' required />
		</div>

		<div>
			<p>
				E-mail do responsável pela avaliação <span class='obrigatorio'>*</span>
			</p>
			<input type='email' name='email_responsavel' required />
		</div>


		<h2>Dados do serviço de saúde avaliado</h2>

		<div>
			<p>
				Estado <span class='obrigatorio'>*</span>
			</p>
			<input type='text' name='estado' required />
		</div>


		<div>
			<p>
				CNES - Cadastro Nacional de Estabelecimento de Saúde <span class='obrigatorio'>*</span>
			</p>
			<input type='text' name='cnes' required />
		</div>


		<div>
			<p>
				Nome do serviço de saúde <span class='obrigatorio'>*</span>
			</p>
			<input type='text' name='nome_servico' required />
		</div>


		<div>
			<p>
				Número total de leitos no Hospital <span class='obrigatorio'>*</span>
			</p>
			<input type='number' name='numero_total_leitos' required />
		</div>

		<div>
			<p>
				Número de leitos de UTI Adultos
				<h5>informar número total de leitos de UTI adultos existentes no hospital</h5>
			</p>
			<input type='number' name='numero_leitos_adultos' />
		</div>

		<div>
			<p>
				Número de leitos de UTI Pediátricos
				<h5>informar número total de leitos de UTI pediatricos existentes no hospital</h5>
			</p>
			<input type='number' name='numero_leitos_pediatricos' />
		</div>

		<div>
			<p>
				Número de leitos de UTI Neonatal
				<h5>informar número total de leitos de UTI neonatal existentes no hospital</h5>
			</p>
			<input type='number' name='numero_leitos_neonatal' />
		</div>

		<h2>Práticas de segurança do paciente</h2>

		<div>
			<p>
				O serviço de saúde possui núcleo de segurança do paciente(NSP) implantado? <span class='obrigatorio'>*</span>
				<h5>Anexar digitalização de documento comprobatório no e-mail</h5>
			</p>
			<div><input type='radio' name='nsp' value='true' required /> Sim</div>
			<div><input type='radio' name='nsp' value='false' required /> Não</div>
		</div>

		<div>
			<p>
				O serviço de saúde possui plano de segurança do paciente(PSP) implantado? <span class='obrigatorio'>*</span>
				<h5>Anexar digitalização de documento comprobatório no e-mail.</h5>
			</p>
			<div><input type='radio' name='psp' value='true' required /> Sim</div>
			<div><input type='radio' name='psp' value='false' required /> Não</div>
		</div>

		<div>
			<p>
				O serviço de saúde possui o protocolo de prevenção de úlceras por pressão implantado? <span class='obrigatorio'>*</span>
				<h5>Se sim, anexar digitalização de documento comprobatório no e-mail e protocolo.</h5>
			</p>
			<div><input type='radio' name='protocolo_prevencao_ulceras' value='true' required /> Sim</div>
			<div><input type='radio' name='protocolo_prevencao_ulceras' value='false' required /> Não</div>
			<input type='radio' name='protocolo_prevencao_ulceras' value='n/a' required /> Não se aplica
		</div>

		<div>
			<p>
				É realizada a avaliação do risco para úlceras por pressão até 24 Horas da admissão do paciente nos serviço de saúde? <span class='obrigatorio'>*</span>
				<h5>Paciente com mais de 60 anos. Verificar o preenchimento do instrumento de estratificação de risco.</h5>
			</p>
			<div><input type='radio' name='avaliacao_risco_ulceras' value='true' required /> Sim</div>
			<div><input type='radio' name='avaliacao_risco_ulceras' value='false' required /> Não</div>
			<input type='radio' name='avaliacao_risco_ulceras' value='n/a' required /> Não se aplica








			<!-- 17 grupos com numero de prontuario, data de alta e se foi feito ou não a avaliação -->
		









		</div>

		<div>
			<p>
				O serviço de saúde possui protocolo de prática de higiene das mãos implantado? <span class='obrigatorio'>*</span>
				<h5>Anexar digitalização de documento comprobatório no e-mail e protocolo.</h5>
			</p>
			<div><input type='radio' name='protocolo_higiene_maos' value='true' required /> Sim</div>
			<div><input type='radio' name='protocolo_higiene_maos' value='false' required /> Não</div>
		</div>

		<div>
			<p>
				O serviço de saúde possui número de lavatórios/pias e dispensadores de preparações alcoólicas para a higiene das mãos nas UTI de acordo com as normas vigentes? <span class='obrigatorio'>*</span>
			</p>
			<div><input type='radio' name='numero_lavatorios_higiene_maos' value='true' required /> Sim</div>
			<div><input type='radio' name='numero_lavatorios_higiene_maos' value='false' required /> Não</div>
		</div>

		<div>
			<p>
				É realizado o monitoramento indireto mensal da adesão à higiene das mãos pelos profissionais de saúde das UTI ( consumo de preparações alcoólicas, pelo menos 20 ml/ 1000 pacientes ao dia? <span class='obrigatorio'>*</span>
			</p>
			<div><input type='radio' name='monitoramento_higiene_maos' value='true' required /> Sim</div>
			<div><input type='radio' name='monitoramento_higiene_maos' value='false' required /> Não</div>
		</div>

		<div>
			<p>
				Qual o valor do consumo por dia? <span class='obrigatorio'>*</span>
				<h5>Calcular o consumo dividindo volume mensal pela quantidade total de paciente-dia no mês.</h5>
			</p>
			<input type='text' name='consumo_dia' required />
		</div>

		<div>
			<p>
				Observação Direta da Higienização das Mãos <span class='obrigatorio'>*</span>
				<h5>Dividir o número de atos de higienização por número de oportunidades (necessidades) de higienização.</h5>
			</p>
			<input type='text' name='observacao_higiene_maos' required />
		</div>

		<div>
			<p>
				O serviço de saúde possui o protocolo para a prevenção de infecção primária de corrente sanguínea associada ao uso de cateter venoso central implantado? <span class='obrigatorio'>*</span>
				<h5>Se sim, digitaliza e anexar por e-mail documento comprobatório e o protocolo.</h5>
			</p>
			<div><input type='radio' name='protocolo_infeccao_cateter' value='true' required /> Sim</div>
			<div><input type='radio' name='protocolo_infeccao_cateter' value='false' required /> Não</div>
			<input type='radio' name='protocolo_infeccao_cateter' value='n/a' required /> Não se aplica
		</div>

		<div>
			<p>
				O serviço de saúde possui o protocolo para a prevenção de infecção do trato respiratório relacionado ao uso da ventilação mecânica implantado? <span class='obrigatorio'>*</span>
				<h5>Se sim, digitalizar e anexar por e-mail documento comprobatório e o protocolo</h5>
			</p>
			<div><input type='radio' name='protocolo_infeccao_ventilacao' value='true' required /> Sim</div>
			<div><input type='radio' name='protocolo_infeccao_ventilacao' value='false' required /> Não</div>
			<input type='radio' name='protocolo_infeccao_ventilacao' value='n/a' required /> Não se aplica
		</div>

		<div>
			<p>
				O serviço de saúde possui protocolo de cirurgia segura implantado? <span class='obrigatorio'>*</span>
				<h5>Se sim, anexar digitalização de documento comprobatório no e-mail e protocolo.</h5>
			</p>
			<div><input type='radio' name='protocolo_cirurgia_segura' value='true' required /> Sim</div>
			<div><input type='radio' name='protocolo_cirurgia_segura' value='false' required /> Não</div>
		</div>

		<div>
			<p>
				O serviço de saúde utiliza a lista de verificação (CHECKLIST) de cirurgia segura em todas cirurgias definida pelo protocolo institucional? <span class='obrigatorio'>*</span>
			</p>
			<div><input type='radio' name='lista_cirurgia_segura' value='true' required /> Sim</div>
			<div><input type='radio' name='lista_cirurgia_segura' value='false' required /> Não</div>
		</div>

		<div>
			<p>
				O serviço de saúde possui protocolo de prevenção de quedas implementado? <span class='obrigatorio'>*</span>
				<h5>Se sim, anexar digitalização de documento comprobatório no e-mail e protocolo.</h5>
			</p>
			<div><input type='radio' name='protocolo_prevencao_quedas' value='true' required /> Sim</div>
			<div><input type='radio' name='protocolo_prevencao_quedas' value='false' required /> Não</div>
			<input type='radio' name='protocolo_prevencao_quedas' value='n/a' required /> Não se aplica
		</div>

		<div>
			<p>
				É realizada a avaliação de risco de quedas até 24 horas de admissão do paciente nos serviços de saúde? <span class='obrigatorio'>*</span>
				<h5>Em pacientes com mais de 60 anos.</h5>
			</p>
			<div><input type='radio' name='avaliacao_risco_quedas' value='true' required /> Sim</div>
			<div><input type='radio' name='avaliacao_risco_quedas' value='false' required /> Não</div>
		</div>

		<div>
			<p>
				O serviço de saúde possui protocolo de segurança na prescrição, uso e administração de medicamentos implementados? <span class='obrigatorio'>*</span>
				<h5>Se sim, anexar digitalização de documento comprobatório no e-mail e protocolo.</h5>
			</p>
			<div><input type='radio' name='protocolo_seguranca_medicamentos' value='true' required /> Sim</div>
			<div><input type='radio' name='protocolo_seguranca_medicamentos' value='false' required /> Não</div>
		</div>

		<div>
			<p>
				O serviço de saúde possui o protocolo de identificação do paciente implementado? <span class='obrigatorio'>*</span>
				<h5>Se sim, anexar digitalização de documento comprobatório no e-mail e protocolo.</h5>
			</p>
			<div><input type='radio' name='protocolo_identificacao_paciente' value='true' required /> Sim</div>
			<div><input type='radio' name='protocolo_identificacao_paciente' value='false' required /> Não</div>
		</div>

		<div>
			<p>
				Se sim, qual o método de identificação?
			</p>
			<input type='text' name='metodo_identificacao' required />
		</div>

		<div>
			<p>
				Qual a quantidade de pacientes indentificados?
				<h5>Colocar a quantidade de paciente identificados em observação direta após seleção de lote de pacientes internados em um dia do mês. Selecionar 17 pacientes entre aqueles internados no dia de avaliação através de amostragem sistemática.</h5>
			</p>
			<input type='number' name='numero_pacientes_identificados' required />
		</div>


		<button>Enviar</button>















	</form>
	</div>
</div>

<?php 
    if(count($_POST) > 0){
    	echo 'post antes json: ';
    	var_dump($_POST);

    	$json = json_encode($_POST);
    	echo '<br><br>Json: ';
    	var_dump($json);

    	$dados = json_decode($json);
    	echo '<br><br>post depois json: ';
    	var_dump($dados);
    }
?>