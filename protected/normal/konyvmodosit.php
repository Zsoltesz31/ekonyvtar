<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editkonyv'])) {
		$postData = [
			'cim' => $_POST['cim'],
			'mufaj' => $_POST['mufaj'],
			'link' => $_POST['link'],
			'id' => $_POST['id']		
			
		];
		
		if(empty($postData['cim']) || empty($postData['mufaj']) || empty($postData['link'])) {
			echo "Nincs minden mező kitöltve!";
		}
		else {
			
			$query = "UPDATE konyvek SET cim=:cim, mufaj=:mufaj, link=:link WHERE id=:id";
			$params = [
				':cim' => $postData['cim'],
				':mufaj' => $postData['mufaj'],
				':link' => $postData['link'],
				':id' => $postData['id']
            ];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Könyv módosítása sikertelen";
			} header('Location: index.php?P=konyvlista');
		}
    }
else
    $query="SELECT * FROM konyvek WHERE id=:id";
    $params = [':id' => $_GET['id']];
    require_once DATABASE_CONTROLLER;
    $data=getRecord($query,$params);

	?>




<form method="POST">
  <div class="form-group">
    <label for="formGroupExampleInput">Cím</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="cim" value="<?=$data['cim']?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Műfaj</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="mufaj" value="<?=$data['mufaj']?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">E-könyv link</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="link" value="<?=$data['link']?>">
  </div>
  <button type="submit" class="btn btn-primary" name="editkonyv" style="background-color: #2a7886; width:100%">Módosít</button>
  <input type="hidden" value="<?=$data['id']?>" name="id">
</form>