<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
	$postData = [
		'felhasznalonev' => $_POST['felhasznalonev'],
		'jelszo' => $_POST['jelszo'],
		'jelszoujra' => $_POST['jelszoujra'],
		'email' => $_POST['email'],
		'emailujra' => $_POST['emailujra'],
	];
	if(empty($postData['felhasznalonev']) || empty($postData['jelszo']) || empty($postData['jelszoujra']) || empty($postData['email']) || empty($postData['emailujra'])) {
		echo "Hiányzó adatok!";

	} else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
		echo "Hibás email formátum!";
	}
	else if ($postData['email'] != $postData['emailujra']) {
			echo "Az emailek nem egyeznek!";
	} else if ($postData['jelszo'] != $postData['jelszoujra']) {
		echo "A jelszavak nem egyeznek!";
	}  else if(!UserRegister($postData['email'], $postData['felhasznalonev'], $postData['jelszo'])) {
		echo "Sikertelen regisztráció!";
	}
}
?>
<br>
<br>
<br>
<form method="POST">
	<div class="form-row">
	
		<div class="form-group col-md-12 p-3 mb-2 text-black">
			<label for="registeruserName" style="font-weight:bold">Felhasználó név</label>
			<input type="text" class="form-control" name="felhasznalonev" value="<?=isset($postData) ? $postData['felhasznalonev'] : "";?>">
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6 p-3 mb-2 text-black">
			<label for="registerEmail" style="font-weight:bold">Email</label>
			<input type="email" class="form-control" name="email" value="<?=isset($postData) ? $postData['email'] : "";?>">
		</div>
		<div class="form-group col-md-6 p-3 mb-2 text-black">
			<label for="registerEmail1" style="font-weight:bold">Email megerősítése</label>
			<input type="email" class="form-control" name="emailujra" value="<?=isset($postData) ? $postData['emailujra'] : "";?>">
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6 p-3 mb-2 text-black">
			<label for="registerPassword" style="font-weight:bold">Jelszó</label>
			<input type="password" class="form-control" name="jelszo" value="">
		</div>
		<div class="form-group col-md-6 p-3 mb-2 text-black">
			<label for="registerPassword1" style="font-weight:bold">Jelszó megerősítése</label>
			<input type="password" class="form-control" name="jelszoujra" value="">
		</div>
	</div>
	<button type="submit" class="btn btn-primary" name="register" style="background-color: #2a7886; width:100%">Regisztráció</button>
</form>