<? include 'fragments/header.php' ?>

<?
include_once('service/services.php');

$zones = rendZonesGeo();

if (@$_GET['id_geo'] != "") {
  $entreprises = rendEntreprisesParGeo($_GET['id_geo']);
  $id_geo = $_GET['id_geo'];
}

?>

<? include 'views/recherche_geo.view.php' ?>

<? include 'fragments/footer.php' ?>