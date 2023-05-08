<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>GrandLivre</title>
</head>
<body>
    <center>      
        <h1> Grand Livre du compte <?php echo $num; ?></h1> 
        <table border="1">
            <tr> 
                <th> Date </th> 
                <th> NumeroPièce </th>
                <th> RefPièce </th>
                <th> Tiers </th> 
                <th> Libelé </th>
                <th> Débit </th>
                <th> Crédit </th>
                <th> Journal </th>
            </tr>
            <?php foreach ($grandlivre as $row) { ?>
                <tr>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['numpiece']; ?></td>
                    <td><?php echo $row['refpiece']; ?></td>
                    <td><?php echo $row['idtiers']; ?></td>
                    <td><?php echo $row['libelle']; ?></td>
                    <td><?php echo $row['debit']; ?></td>
                    <td><?php echo $row['credit']; ?></td>
                    <td><?php echo $row['nom']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <table>
            <tr>
                <td>Montant total débit :</td>
                <td><?php echo $totaldebit; ?> Ar</td>
            </tr>
            <tr>
                <td>Montant total crédit :</td>
                <td><?php echo $totalcredit; ?> Ar</td>
            </tr>
            <tr>
                <td>Solde débiteur :</td>
                <td><?php echo $soldedebiteur; ?> Ar</td>
            </tr>
            <tr>
                <td>Solde créditeur :</td>
                <td><?php echo $soldecrediteur; ?></td>
            </tr>
            <td colspan="8"><input style="width: 100%; border-color:white" type="button" value="retour" onclick="window.location='loadGrandLivre?idexercice=<?php echo $idexercice;?>'"></td>           
        </table>
    </center>
</body>
</html>