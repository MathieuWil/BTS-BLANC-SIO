<h3> Ajout d'un rendez-vous </h3>
<br />
<form method="post">
	Date de Rendez-vous </br>
	<input type="date" name="daterdv" value="<?= ($unRendezvous != null) ? $unRendezvous['daterdv'] : '' ?>"> </br>
	Heure de Rendez-vous </br>
	<input type="time" name="heure" value="<?= ($unRendezvous != null) ? $unRendezvous['heure'] : '' ?>"> </br>


	Le Patient : <br />
	<select name="idpatient" value="<?= ($unRendezvous != null) ? $unRendezvous['idpatient'] : '' ?>">
		<?php
		foreach ($lesPatients as $unPatient) {
			echo "<option value='" . $unPatient['idpatient'] . "'>";
			echo $unPatient['prenom'];
			echo "</option>";
		}
		?>
	</select><br />



	Le Médecin : <br />
	<select name="idmedecin" value="<?= ($unRendezvous != null) ? $unRendezvous['idmedecin'] : '' ?>">
		<?php
		foreach ($lesMedecins as $unMedecin) {
			echo "<option value='" . $unMedecin['idmedecin'] . "'>";
			echo $unMedecin['prenom'];
			echo "</option>";
		}
		?>
	</select>
	<br />
	<br />


	<input type="reset" name="Annuler" value="Annuler">
	<input type="submit" <?= ($unRendezvous != null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"' ?>>

	<?= ($unRendezvous != null) ? '<input type="hidden" name="idrendezvous" value="' . $unRendezvous['idrendezvous'] . '">' : '' ?>
</form>