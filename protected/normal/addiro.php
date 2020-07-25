<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addiro'])) {
		$postData = [
			'vnev' => $_POST['vnev'],
			'knev' => $_POST['knev'],
            'szarmazas' => $_POST['szarmazas'],
            'link' => $_POST['link']		
			
		];
		
		if(empty($postData['vnev']) || empty($postData['knev']) || empty($postData['szarmazas']) || empty($postData['link'])) {
			echo "Nincs minden mező kitöltve!";
		}
		else {
			
			$query = "INSERT INTO writers (vnev, knev, szarmazas, link) VALUES (:vnev, :knev, :szarmazas, :link)";
			$params = [
				':vnev' => $postData['vnev'],
                ':knev' => $postData['knev'],
                ':szarmazas' => $postData['szarmazas'],
				':link' => $postData['link']
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Író/Szerző hozzáadása sikertelen";
			} header('Location: index.php');
		}
	}


	?>

<form method="POST">
  <div class="form-group">
    <label for="formGroupExampleInput" style="font-weight:bold">Vezeték név</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="vnev" >
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" style="font-weight:bold">Kereszt név</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="knev">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" style="font-weight:bold">Szármzás</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="szarmazas">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" style="font-weight:bold">Wikipedia link</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="link">
  </div>
  <button type="submit" class="btn btn-primary" name="addiro" style="background-color: #2a7886; width:100%">Hozzáad</button>
</form>