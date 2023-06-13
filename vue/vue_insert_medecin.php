<h3> Ajout d'un médecin </h3>
<br />
<form method="post">
    Nom Medecin </br>
    <input type="text" name="nom" value="<?= ($unMedecin != null) ? $unMedecin['nom'] : '' ?>"> </br>
    Prénom Medecin </br>
    <input type="text" name="prenom" value="<?= ($unMedecin != null) ? $unMedecin['prenom'] : '' ?>"> </br>
    Email Medecin </br>
    <input type="text" name="email" value="<?= ($unMedecin != null) ? $unMedecin['email'] : '' ?>"> </br>
    MDP Medecin</br>
    <input type="password" name="mdp" value="<?= ($unMedecin != null) ? $unMedecin['mdp'] : '' ?>"> </br>
    Spécialité</br>
    <select name="specialite" value="<?= ($unMedecin != null) ? $unMedecin['specialite'] : '' ?>">
        <option value="dentiste"> Dentiste </option>
        <option value="chirurgien"> Chirurgien </option>
    </select></br>

    La patient à charge : <br />
    <select name="idpatient" value="<?= ($unMedecin != null) ? $unMedecin['idpatient'] : '' ?>">
        <?php
        foreach ($lesPatients as $unPatient) {
            echo "<option value='" . $unPatient['idpatient'] . "'>";
            echo $unPatient['prenom'];
            echo "</option>";
        }
        ?>
    </select>

    <br />


    </select>
    <br />

    <input type="reset" name="Annuler" value="Annuler">
    <input type="submit" <?= ($unMedecin != null) ? 'name="Modifier" value="Modifier"' : 'name="Valider" value="Valider"' ?>>

    <?= ($unMedecin != null) ? '<input type="hidden" name="idmedecin" value="' . $unMedecin['idmedecin'] . '">' : '' ?>
</form>