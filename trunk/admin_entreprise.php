<? include 'fragments/header.php' ?>

<?
include_once('service/services.php');

// requerir mot de passe

$activites = rendActivites();
$geos = rendZonesGeo();

// si formulaire soumis, on affiche un message et les données renseignées
if (@$_GET['est_soumis'] != "") {
	$rs = $_GET['rs'];
	$adresse = $_GET['adresse'];
	$tel = $_GET['tel'];
	$resp = $_GET['resp'];
	$act = $_GET['act'];
	$geo = $_GET['geo'];

	$res = ajouteEntreprise($rs, $adresse, $tel, $resp, $act, $geo);
	
	if (!$res) $msg = "Problème lors de l'ajout de l'entreprise";
	else $msg = "Ajout de l'entreprise effectué";	
}

?>

<? include 'views/admin_entreprise.view.php' ?>

<? include 'fragments/footer.php' ?>