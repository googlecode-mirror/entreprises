<? include 'fragments/header.php' ?>

<?
include_once('service/services.php');

if (@$_GET['filtre_nom'] != "") {
  $entreprises = rendEntreprisesParRaison($_GET['filtre_nom']);
  $filtre_nom = $_GET['filtre_nom'];
}
else {
  $entreprises = rendEntreprises();
}

?>

<? include 'views/liste_entreprises.view.php' ?>

<? include 'fragments/footer.php' ?>