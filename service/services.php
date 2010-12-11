<?

include_once('conf/conf.php');

//echo "on trouve ".$DB_HOST." ".$DB_LOGIN." ".$DB_PWD." ".$DB_NAME."<br>";

mysql_connect($DB_HOST, $DB_LOGIN, $DB_PWD);
mysql_select_db($DB_NAME);
mysql_query("SET NAMES UTF8"); // 

// tableau des erreurs à renvoyer à la couche présentation
$erreurs = array();
$warnings = array();
$msgOK = array();

function run($SQL) {
	global $DEBUG, $erreurs;
	
	if ($DEBUG) echo "<p>".$SQL."</p>";
	
	$res = mysql_query($SQL);

	if (!$res) {
		$erreurs[] = "Erreur système de données";
		if ($DEBUG) {
			$erreurs[] = "Erreur SQL ".mysql_errno()." : ".mysql_error()."<br>";
		}
	}
	return $res;
}

// rend un joueur, pour l'authentification
function rendEntreprises() {
	$SQL = "select ent.id, ent.rs as rs, ent.adresse as adresse, ent.tel as tel, ent.resp as resp, ac.libelle as activite, geo.libelle as geo from entreprise ent join activite ac on ent.activite = ac.id
			join geographie geo on ent.geo = geo.id order by ent.rs";

	$result = run($SQL);
	
	if (!$result) return false;

	$i = 0;
  
	$entreprises = array();
  
	while ($row = mysql_fetch_array($result)) {
		$entreprises[$i++] = $row;
	}
	return $entreprises;
}

function rendEntreprisesParRaison($filtre_nom) {
	$SQL = sprintf("select ent.id, ent.rs, ent.adresse, ent.tel, ent.resp, ac.libelle as activite, geo.libelle as geo from entreprise ent join activite ac on ent.activite = ac.id
			join geographie geo on ent.geo = geo.id where ent.rs like '%s' order by ent.rs", 
		mysql_real_escape_string($filtre_nom).'%');
   
	$result = run($SQL);
	
	if (!$result) return false;

  $i = 0;
  
  $entreprises = array();
  
	while ($row = mysql_fetch_array($result)) {
		$entreprises[$i++] = $row;
	}
	return $entreprises;
}

function rendZonesGeo() {
	$SQL = "select * from geographie order by libelle";

	$result = run($SQL);
	
	if (!$result) return false;

	$i = 0;
  
	$zones = array();
  
	while ($row = mysql_fetch_array($result)) {
		$zones[$i++] = $row;
	}

	return $zones;
}

function rendActivites() {
	$SQL = "select * from activite order by libelle";

	$result = run($SQL);
	
	if (!$result) return false;

	$i = 0;
  
	$activites = array();
  
	while ($row = mysql_fetch_array($result)) {
		$activites[$i++] = $row;
	}

	return $activites;
}

function rendEntreprisesParGeo($id_geo) {
	$SQL = sprintf("select ent.id, ent.rs, ent.adresse, ent.tel, ent.resp, ac.libelle as activite, geo.libelle as geo from entreprise ent join activite ac on ent.activite = ac.id
			join geographie geo on ent.geo = geo.id where geo.id = %s order by ent.rs", 
		mysql_real_escape_string($id_geo));
   
	$result = run($SQL);
	
	if (!$result) return false;

  $i = 0;
  
  $entreprises = array();
  
	while ($row = mysql_fetch_array($result)) {
		$entreprises[$i++] = $row;
	}
	return $entreprises;
}

function rendEntreprisesParActivite($id_activite) {
	$SQL = sprintf("select ent.id, ent.rs, ent.adresse, ent.tel, ent.resp, ac.libelle as activite, geo.libelle as geo from entreprise ent join activite ac on ent.activite = ac.id
			join geographie geo on ent.geo = geo.id where ac.id = %s order by ent.rs", 
		mysql_real_escape_string($id_activite));
   
	$result = run($SQL);
	
	if (!$result) return false;

  $i = 0;
  
  $entreprises = array();
  
	while ($row = mysql_fetch_array($result)) {
		$entreprises[$i++] = $row;
	}
	return $entreprises;
}

function ajouteEntreprise($rs, $adresse, $tel, $resp, $act, $geo) {
	$SQL = sprintf("INSERT INTO entreprise (rs, adresse, tel, resp, activite, geo) 
        VALUES ('%s', '%s', '%s', %d, %d, %d)", 
        mysql_real_escape_string($rs),
        mysql_real_escape_string($adresse),
        mysql_real_escape_string($tel),
        mysql_real_escape_string($resp),
		mysql_real_escape_string($geo), 
        mysql_real_escape_string($act))
        ;

	$result = run($SQL);
	
	if (!$result) return false;
	else return true;	
}

//------------------

function rendEntreprisesParRaison2($filtre_nom) {
	return rendEntreprises();
}

function rendEntreprises2() {
	$e1 = array(
		"rs" => "Yahoo inc.",
		"adresse" => "10 rue du Landernot 41100 Vendome",
		"resp" => "Jean Dupont", 
		"tel" => "02.20.02.20.22",
		"activite" => "Service",
		"geo" => "Region centre"
	);

	$e2 = array(
		"rs" => "Google",
		"adresse" => "14 rue du Cheshire California",
		"resp" => "John Wilkinson", 
		"tel" => "(10) 02.20.02.20.22",
		"activite" => "Service",
		"geo" => "EU"
	);	


	$tab = array($e1, $e2);
	
	return $tab;
}
