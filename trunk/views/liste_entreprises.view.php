<h1>Liste des entreprises</h1>

<form class="filtre" name="filtre" action="liste_entreprises.php">
	<label>Filtrer par nom </label>
	<input type="text" name="filtre_nom" value="<? if (isset($filtre_nom)) echo $filtre_nom; ?>" />
	<input type="submit" value="ok" /> 
</form>


<? if (isset($entreprises)) : ?>

<? if ($entreprises == null) : ?>
	Aucune entreprise ne correspond au critère. 

<? else : ?>

<table>
	<tr>
		<th>Raison sociale</th>
		<th>Adresse</th>
		<th>Nom responsable</th>
		<th>Téléphone</th>
		<th>Secteur d'activité</th>
		<th>Secteur géograhique</th>
	</tr>
<? foreach ($entreprises as $soc) : ?>
	<tr <?= (@$ligne_i++ % 2 == 1) ? ' class="impaire"' : '' ; ?>>
	<tr>
		<td><?= $soc['rs'] ?></td>
		<td><?= $soc['adresse'] ?></td>
		<td><?= $soc['resp'] ?></td>
		<td><?= $soc['tel'] ?></td>
		<td><?= $soc['activite'] ?></td>
		<td><?= $soc['geo'] ?></td>
	</tr>
<? endforeach ?>

</table>

<? endif ?>

<? endif ?>
