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

	function swal($title, $text, $type = '', $location = '', $btn = ''){
		echo "<button hidden id='clickButton' onClick='sa(\"".$title."\", \"".$text."\", \"".$type."\", \"".$location."\", \"".$btn."\");'>button</button>
	    		<script type='text/javascript'>
	    			window.onload = function(){
	    				document.getElementById('clickButton').click();
	    			}
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
		$extensao =  pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
		$nome = $_FILES['imagem']['name'];
		$nome = md5($nome).'.'.$extensao;
		$_FILES['imagem']['name'] = $nome;

		$target_dir = SOURCE.'/imgs/';
		$target_file = $target_dir.basename($_FILES["imagem"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["imagem"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["imagem"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["imagem"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
	}		
?>