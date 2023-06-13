<h3> Ajout d'un patient </h3>
<br />
<form method="post" action="#">
    Nom Patient </br>
    <input type="text" name="nom" value="<?= ($unPatient != null) ? $unPatient['nom'] : '' ?>"> </br>
    Prénom Patient </br>
    <input type="text" name="prenom" value="<?= ($unPatient != null) ? $unPatient['prenom'] : '' ?>"> </br>
    Email Patient </br>
    <input type="text" name="email" value="<?= ($unPatient != null) ? $unPatient['email'] : '' ?>"> </br>
    Adresse Patient </br>
    <input type="text" name="adresse" value="<?= ($unPatient != null) ? $unPatient['adresse'] : '' ?>"> </br>
    Age Patient </br>
    <input type="text" name="age" value="<?= ($unPatient != null) ? $unPatient['age'] : '' ?>"> </br>
    MDP Patient</br>
    <input type="password" name="mdp" value="<?= ($unPatient != null) ? $unPatient['mdp'] : '' ?>"> </br>

    <br />

    <input type="reset" name="Annuler" value="Annuler">
    <input type="submit" <?= ($unPatient != null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"' ?>>

    <?= ($unPatient != null) ? '<input type="hidden" name="idpatient" value="' . $unPatient['idpatient'] . '">' : '' ?>
</form>