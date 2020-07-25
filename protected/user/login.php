<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
  $postData = [
    'felhasznalonev' => $_POST['felhasznalonev'],
    'jelszo' => $_POST['jelszo']
  ];

  if(empty($postData['felhasznalonev']) || empty($postData['jelszo'])) {
    echo "Hiányzó felhasználónév vagy jelszó!";
  } 
   else if(!UserLogin($postData['felhasznalonev'], $postData['jelszo'])) {
     echo "Hibás felhasználónév vagy jelszó!";
  }

  $postData['password'] = "";
}
?>
