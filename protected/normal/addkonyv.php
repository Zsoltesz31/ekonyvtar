<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addkonyv'])) {
		$postData = [
			'cim' => $_POST['cim'],
			'mufaj' => $_POST['mufaj'],
			'link' => $_POST['link']		
			
		];
		
		if(empty($postData['cim']) || empty($postData['mufaj']) || empty($postData['link'])) {
			echo "Nincs minden mező kitöltve!";
		}
		else {
			
			$query = "INSERT INTO konyvek (cim, mufaj, link) VALUES (:cim, :mufaj, :link)";
			$params = [
				':cim' => $postData['cim'],
				':mufaj' => $postData['mufaj'],
				':link' => $postData['link']
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Könyv hozzáadása sikertelen";
			} header('Location: index.php');
		}
	}


	?>

<form method="POST">
  <div class="form-group">
    <label for="formGroupExampleInput" style="font-weight:bold">Cím</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="cim" >
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" style="font-weight:bold">Műfaj</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="mufaj">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" style="font-weight:bold">E-könyv link</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="link">
  </div>
  <button type="submit" class="btn btn-primary" name="addkonyv" style="background-color: #2a7886; width:100%">Hozzáad</button>
</form>