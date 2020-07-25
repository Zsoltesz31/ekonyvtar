<?php
require_once PROTECTED_DIR.'user/login.php'; 
?>
<ul class="nav justify-content-center" style="border: 1px solid #3b6978; width:1000px; margin:0 auto; background-color: #3b6978; margin-bottom:50px; ">
  <li class="nav-item">
  <a class="nav-link" href="index.php?P=home" style="color:white">Főoldal</a>
  </li>
  
    

<?php if(!IsUserLoggedIn()) : ?>
  

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bejelentkezés</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-row">
		<div class="form-group col-md-6">
			<label for="registerPassword">Felhasználónév</label>
			<input type="text" class="form-control" id="registerUsername" name="felhasznalonev">
		</div>
		<div class="form-group col-md-6">
			<label for="registerPassword1">Jelszó</label>
			<input type="password" class="form-control" id="registerPassword" name="jelszo">
		</div>
	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Vissza</button>
        <button type="submit" class="btn btn-primary" name="login">Bejelentkezés</button>
      </div>
      </form>
    </div>
  </div>
</div>

<li class="nav-item">
    <a class="nav-link" data-toggle="modal" href="#exampleModal"style="color:white" >Bejelentkezés</a>
  </li>
  <li class="nav-item">
    
    <a class="nav-link" href="index.php?P=register"style="color:white">Regisztráció</a>
    

  </li>
  <li class="nav-item">
  <a class="nav-link" href="index.php?P=betekinto" style="color:white">Betekintő</a>
  </li>
  <?php else : ?>
    <?php if(isset($_SESSION['jog']) && $_SESSION['jog'] == 1) : ?>
    <li class="nav-item">
    <a class="nav-link" href="index.php?P=felhasznalolista" style="color:white">Felhasználók listája</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="index.php?P=konyvlista" style="color:white">Könyvek listája</a>
    </li>
   <!--<li class="nav-item">
    <a class="nav-link" href="index.php?P=addkonyv" style="color:white">Könyv hozzáadása</a>
    </li>-->
  <?php endif;?>
  <li class="nav-item">
    <a class="nav-link" href="index.php?P=konyvek" style="color:white">Könyvek</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="index.php?P=irok" style="color:white">Írok/Szerzők</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="index.php?P=kijelentkezes" style="color:white">Kijelentkezés</a>
    </li>
    <?php endif;?>
  
</ul>

