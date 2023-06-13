<h3> Ajout d'une prescription </h3>
<br />
<form method="post">
	Date de Prescription </br>
	<input type="date" name="dateprescription" value="<?= ($unPrescription != null) ? $unPrescription['dateprescription'] : '' ?>"> </br>
	Medicament </br>
	<input type="text" name="medicament" value="<?= ($unPrescription != null) ? $unPrescription['medicament'] : '' ?>"> </br>


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
	<input type="submit" <?= ($unPrescription != null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"' ?>>

	<?= ($unPrescription != null) ? '<input type="hidden" name="idprescription" value="' . $unPrescription['idprescription'] . '">' : '' ?>
</form>