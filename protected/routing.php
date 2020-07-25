<?php 


if(!array_key_exists('P', $_GET) || empty($_GET['P']))
	$_GET['P'] = 'home';


	switch ($_GET['P']) {
		case 'login':!IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/login.php' : header('Location: index.php'); break;
		case 'register':!IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/register.php' : header('Location: index.php'); break; 
		case 'betekinto': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'normal/betekinto.php' : header('Location: index.php'); break;

		case 'home': require_once PROTECTED_DIR.'normal/home.php'; break;
		case 'konyvlista':IsUserLoggedIn() ?  require_once PROTECTED_DIR.'normal/konyvlista.php' : header('Location: index.php'); break;
		case 'felhasznalolista':IsUserLoggedIn() ?  require_once PROTECTED_DIR.'user/felhasznalolista.php' : header('Location: index.php'); break;
		case 'konyvek':IsUserLoggedIn() ?  require_once PROTECTED_DIR.'normal/konyvek.php' : header('Location: index.php'); break;
		case 'addkonyv':IsUserLoggedIn() ?  require_once PROTECTED_DIR.'normal/addkonyv.php' : header('Location: index.php'); break;
		case 'konyvmodosit':IsUserLoggedIn() ?  require_once PROTECTED_DIR.'normal/konyvmodosit.php' : header('Location: index.php'); break;
		case 'addiro' : IsUserLoggedIn() ? require_once PROTECTED_DIR.'normal/addiro.php' : header('Location: index.php'); break;
		case 'irok':IsUserLoggedIn() ?  require_once PROTECTED_DIR.'normal/irok.php' : header('Location: index.php'); break;
		case 'kijelentkezes': IsUserLoggedIn() ? UserLogout() : header('Location: index.php'); break;
		default: require_once PROTECTED_DIR.'normal/404.php'; break;
	}


?>