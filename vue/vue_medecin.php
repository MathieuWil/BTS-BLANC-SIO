<h3> Liste des médecins </h3>
<br />
<form method="post">
    Filtrer par : <input type="text" name="mot">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br />
<table border="1">
    <tr>
        <td> Id Médecin </td>
        <td> Nom </td>
        <td> Prenom </td>
        <td> Email </td>
        <td> MDP </td>
        <td> Spécialité </td>
        <td> Patient à charge </td>

    </tr>
    <?php
    if (isset($lesMedecins)) {
        foreach ($lesMedecins as $unMedecin) {
            echo "<tr>";
            echo "<td>" . $unMedecin['idmedecin'] . "</td>";
            echo "<td>" . $unMedecin['nom'] . "</td>";
            echo "<td>" . $unMedecin['prenom'] . "</td>";
            echo "<td>" . $unMedecin['email'] . "</td>";
            echo "<td>" . $unMedecin['mdp'] . "</td>";
            echo "<td>" . $unMedecin['specialite'] . "</td>";
            echo "<td>" . $unPatient['prenom'] . "</td>";
            echo "<td> <a href='index.php?page=2&action=sup&idmedecin=" . $unMedecin['idmedecin'] . "' > 
            <img src='images/supprimer.png' height='40' width='40'> </a>";

            echo "<td> <a href='index.php?page=2&action=edit&idmedecin=" . $unMedecin['idmedecin'] . "' >
             <img src='images/editer.png' height='40' width='40'> </a>";

            echo "</tr>";
        }
    }
    ?>
</table>