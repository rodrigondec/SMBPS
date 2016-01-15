<?php 
	function incluir_menu(){
		if(isset($_SESSION['privilegio'])){
			if($_SESSION['privilegio'] == '1'){
				include_once(TEMPLATES.'/geral/menu_admin.php');
			}
			if($_SESSION['privilegio'] == '2'){
				include_once(TEMPLATES.'/geral/menu_hospital.php');
			}
		}
		else{
			include_once(TEMPLATES.'/geral/menu_sistema.php');
		}
	}

	function swal($title = '', $text = '', $type = '', $location = '', $btn = 'btn-primary'){
		echo "<button class='hidden' id='clickButton' onClick='sa(\"".$title."\", \"".$text."\", \"".$type."\", \"".$location."\", \"".$btn."\");'>button</button>
	    		<script type='text/javascript'>
	    			$(window).load(function(){
	    				$('#clickButton').click()
	    			})
    			</script>";
	}

	function send_mail($to, $subject, $body){
		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->Port = 587;                                    // TCP port to connect to
		
		$mail->Username = 'organizationxesports@gmail.com';                 // SMTP username
		$mail->Password = 'oxente84';                        // SMTP password
		
		$mail->From = 'organizationxesports@gmail.com';
		$mail->FromName = 'Organization & Esports';
		$mail->addReplyTo('organizationxesports@gmail.com', 'Organization & Esports');

		$mail->addAddress($to);               // Name is optional

		$mail->Subject = $subject;
		$mail->Body = $body;

		if(!$mail->send()){
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Message has been sent';
		}
	}

	function upload(){
		$return = array();
		$return['status'] = false;

		$extensao =  pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
		$nome = $_FILES['imagem']['name'];
		$nome = md5($nome).'.'.$extensao;
		$_FILES['imagem']['name'] = $nome;

		$target_dir = SOURCE.'/protocolos/';
		$target_file = $target_dir.basename($_FILES["imagem"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(count($_FILES) > 0) {
		    $check = getimagesize($_FILES["imagem"]["tmp_name"]);
		    if($check !== false) {
		        $return['mensagem']['info'][] = "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        $return['mensagem']['error'][] = 'File is not an image.';
		        $uploadOk = 0;

		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    $return['mensagem']['error'][] = "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["imagem"]["size"] > 500000) {
		    $return['mensagem']['error'][] = "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    $return['mensagem']['error'][] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    $return['status'] = false;
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
		        $return['mensagem']['info'][] = "The file has been uploaded.";
		        $return['status'] = true;
		    } else {
		        $return['mensagem']['error'][] = "Sorry, there was an error uploading your file.";
		        $return['status'] = false;
		    }
		}
		return $return;
	}

	function retirar_mascara($key, $value){
		if($key == 'cnpj'){
			$value = str_replace('.', '', $value);
			$value = str_replace('/', '', $value);
			$value = str_replace('-', '', $value);
		}
		else if($key == 'telefone'){
			$value = str_replace('(', '', $value);
			$value = str_replace(')', '', $value);
			$value = str_replace(' ', '', $value);
			$value = str_replace('-', '', $value);
		}
		else if($key == 'cep'){
			$value = str_replace('.', '', $value);
			$value = str_replace('-', '', $value);
		} 
		return $value;
	}		

	function validar_cnpj($cnpj){
		$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
		// Valida tamanho
		if (strlen($cnpj) != 14)
			return false;
		// Valida primeiro dígito verificador
		for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
		{
			$soma += $cnpj{$i} * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}
		$resto = $soma % 11;
		if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
			return false;
		// Valida segundo dígito verificador
		for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
		{
			$soma += $cnpj{$i} * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}
		$resto = $soma % 11;
		return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
	}

	function cadastrar_notificacoes_para_usuarios($notificacao, $seletor, $funcao_banco){
		$bool = true;

		$bool = $bool && insert($notificacao, 'notificação');
		$notificacao['id'] = select('id', 'notificação', 'texto', $notificacao['texto'])['id'];

		if($funcao_banco == 'select_many'){
			$usuarios = select_many('id', 'usuário', $seletor['identificador'], $seletor['valor']);

	    	$usuario_notificacoes = array();
	    	foreach ($usuarios as $num => $usuario){
	    		$usuario_notificacoes[$num]['id_usuário'] = $usuario['id'];
	    		$usuario_notificacoes[$num]['id_notificação'] = $notificacao['id'];
	    	}
	    	
	    	foreach ($usuario_notificacoes as $num => $usuario_notificacao) {
	    		$bool = $bool && insert($usuario_notificacao, 'usuário_notificação');
	    	}
		}
		else if($funcao_banco == 'select'){
			$id_usuario = select('id', 'usuário', $seletor['identificador'], $seletor['valor'])['id'];

			$usuario_notificacao = array();
			$usuario_notificacao['id_usuário'] = $id_usuario;
			$usuario_notificacao['id_notificação'] = $notificacao['id'];
			$bool = $bool && insert($usuario_notificacao, 'usuário_notificação');
		}
		return $bool;
	}

	function cadastrar_hospital_setor($id_hospital){
		$bool = true;

		$dados = array();
    	$dados[0]['id_setor'] = 1;
    	$dados[0]['id_hospital'] = $id_hospital;

    	$dados[1]['id_setor'] = 2;
    	$dados[1]['id_hospital'] = $id_hospital;

    	foreach ($dados as $num => $hospital_setor) {
    		$bool = $bool && insert($hospital_setor, 'hospital_setor');
    	}
    	return $bool;
	}
?>