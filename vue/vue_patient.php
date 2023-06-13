<h3> Liste des patients </h3>
<br />
<form method="post">
    Filtrer par : <input type="text" name="mot">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br />
<table border="1">
    <tr>
        <td> Id Patient </td>
        <td> Nom </td>
        <td> Prenom </td>
        <td> Email </td>
        <td> Adresse </td>
        <td> Age </td>
        <td> MDP </td>

    </tr>
    <?php
    if (isset($lesPatients)) {
        foreach ($lesPatients as $unPatient) {
            echo "<tr>";
            echo "<td>" . $unPatient['idpatient'] . "</td>";
            echo "<td>" . $unPatient['nom'] . "</td>";
            echo "<td>" . $unPatient['prenom'] . "</td>";
            echo "<td>" . $unPatient['email'] . "</td>";
            echo "<td>" . $unPatient['adresse'] . "</td>";
            echo "<td>" . $unPatient['age'] . "</td>";
            echo "<td>" . $unPatient['mdp'] . "</td>";
            echo "<td> <a href='index.php?page=1&action=sup&idpatient=" . $unPatient['idpatient'] . "' > 
            <img src='images/supprimer.png' height='40' width='40'> </a>";

            echo "<td> <a href='index.php?page=1&action=edit&idpatient=" . $unPatient['idpatient'] . "' >
             <img src='images/editer.png' height='40' width='40'> </a>";

            echo "</tr>";
        }
    }
    ?>
</table>