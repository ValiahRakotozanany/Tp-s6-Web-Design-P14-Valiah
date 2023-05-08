<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Compta-affichage</title>
    <link rel="stylesheet" href="<?php echo site_url() ?>../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo site_url() ?>../assets/css/styles.css">
</head>

<body style="background: rgba(255,255,255,0.63);">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 4%;background-color:aquamarine;border-radius: 10px 1px 10px 1px;">
                <nav class="navbar navbar-light navbar-expand-md">
                    <div class="container-fluid"><a class="navbar-brand" href="#">Plan Comptable</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a class="nav-link" href="journaux">Journal</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="margin-top: 5%;">
                <form action="<?php echo site_url() ?>insertExercice" method="post">
                    <h1 style="text-align: center;">Insérer exercice</h1>
                    <p style="text-align: center;">Nom de l'exercice</p>
                    <p style="text-align: center;"><input name="nom" class="form-control" type="text" style="width: 32%;margin-left: 34%;" required=""></p>
                    <p style="text-align: center;">Date de début</p>
                    <p style="text-align: center;"><input name="datedebut" class="form-control" style="width: 32%;margin-left: 34%;" required="" type="date"></p>
                    <p style="text-align: center;"><button class="btn btn-primary" type="submit" style="background: rgba(253,71,13,0.84);color: rgb(0,0,0);font-weight: bold;border-style: none;">Valider</button></p>
                    <p style="text-align: center;"></p>
                </form>
            </div>
            <div class="col-md-6" style="margin-top: 5%;">
                <form>
                    <h1 style="text-align: center;margin-top: 0%;">Liste des exercices</h1>
                    <p style="text-align: center;"></p>
                </form>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Date de début</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ex as $exercice) { ?>
                                <tr>
                                    <td><?php echo $exercice['nom']; ?></td>
                                    <td><?php echo $exercice['datedebut']; ?></td>
                                    <td><a href="listeJournaux?idExo=<?php echo $exercice['id'] ?>">les Journaux</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo site_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>