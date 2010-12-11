<? include 'fragments/header.php' ?>

<?
include_once('service/services.php');

$activites = rendActivites();

if (@$_GET['id_activite'] != "") {
  $entreprises = rendEntreprisesParActivite($_GET['id_activite']);
  $id_activite = $_GET['id_activite'];
}

?>

<? include 'views/recherche_activite.view.php' ?>

<? include 'fragments/footer.php' ?>