<h3> Liste des prescriptions </h3>
<br />
<form method="post">
    Filtrer par : <input type="text" name="mot">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br />
<table border="1">
    <tr>
        <td> Id Prescription </td>
        <td> Date de prescription </td>
        <td> Medicament </td>
        <td> Patient </td>
        <td> Medecin </td>

    </tr>
    <?php
    if (isset($lesPrescriptions)) {
        foreach ($lesPrescriptions as $unPrescription) {
            echo "<tr>";
            echo "<td>" . $unPrescription['idprescription'] . "</td>";
            echo "<td>" . $unPrescription['dateprescription'] . "</td>";
            echo "<td>" . $unPrescription['medicament'] . "</td>";
            echo "<td>" . $unPatient['prenom'] . "</td>";
            echo "<td>" . $unMedecin['prenom'] . "</td>";
            echo "<td> <a href='index.php?page=4&action=sup&idprescription=" . $unPrescription['idprescription'] . "' > 
            <img src='images/supprimer.png' height='40' width='40'> </a>";

            echo "<td> <a href='index.php?page=4&action=edit&idprescription=" . $unPrescription['idprescription'] . "' >
             <img src='images/editer.png' height='40' width='40'> </a>";

            echo "</tr>";
        }
    }
    ?>
</table>