<h1>Ajout d'une entreprise</h1>

<? if (isset($msg)) : ?>
<p class="tag1"><?= $msg ?></p>
<? endif ?>

<form action="admin_entreprise.php" id="form_entreprise">
	<input type="hidden" name="est_soumis" value="true"/>
	<p><label>Raison </label><input name="rs" /></p>
	<p><label>Responsable </label><input name="resp" /></p>
	<p><label>Adresse </label><input name="adresse" /></p>
	<p><label>Téléphone </label><input name="tel" /></p>
	
	<p><label>Activite</label>		
		<select name="act">
			<? foreach ($activites as $act): ?>
			<option value="<?= $act['id'] ?>"><?= $act['libelle'] ?></option>
			<? endforeach ?>
		</select>
	</p>
	<p><label>Zone géographique</label>
		<select name="geo">
			<? foreach ($geos as $geo): ?>
			<option value="<?= $geo['id'] ?>"><?= $geo['libelle'] ?></option>
			<? endforeach ?>
		</select> <input type="submit" value="OK" /></p>
</form>