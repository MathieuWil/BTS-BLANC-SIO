<h3> Liste des rendez-vous </h3>
<br />
<form method="post">
    Filtrer par : <input type="text" name="mot">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br />
<table border="1">
    <tr>
        <td> Id Rendez Vous </td>
        <td> Date </td>
        <td> Heure </td>
        <td> Patient </td>
        <td> Medecin </td>
    </tr>
    <?php
    if (isset($lesRendezvous)) {
        foreach ($lesRendezvous as $unRendezvous) {
            echo "<tr>";
            echo "<td>" . $unRendezvous['idrendezvous'] . "</td>";
            echo "<td>" . $unRendezvous['daterdv'] . "</td>";
            echo "<td>" . $unRendezvous['heure'] . "</td>";
            echo "<td>" . $unPatient['prenom'] . "</td>";
            echo "<td>" . $unMedecin['prenom'] . "</td>";
            echo "<td> <a href='index.php?page=3&action=sup&idrendezvous=" . $unRendezvous['idrendezvous'] . "' > 
            <img src='images/supprimer.png' height='40' width='40'> </a>";

            echo "<td> <a href='index.php?page=3&action=edit&idrendezvous=" . $unRendezvous['idrendezvous'] . "' >
             <img src='images/editer.png' height='40' width='40'> </a>";

            echo "</tr>";
        }
    }
    ?>
</table>