<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Compta-affichage</title>
    <link rel="stylesheet" href="<?php echo site_url()?>../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo site_url()?>../assets/css/styles.css">
</head>

<body style="background: rgba(255,255,255,0.63);">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 4%;background:aquamarine;border-radius: 10px 1px 10px 1px;">
                <nav class="navbar navbar-light navbar-expand-md">
                    <div class="container-fluid"><a class="navbar-brand" href="#">Plan Comptable</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="navbar-nav">
                                <li class="nav-item"></li>
                                <li class="nav-item"></li>
                            </ul>
                            <ul class="navbar-nav">
                                <li class="nav-item"></li>
                                <li class="nav-item"></li>
                                <li class="nav-item"></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="margin-top: 5%;width: 100%;">
                <form>
                    <h3 style="text-align: center;margin-top: 0%;"><a href="listeJournaux?idExo=<?php echo $idexercice; ?>">Journaux D'Exercice </a></p></h3>
                    <p style="text-align: center;"></p>
                </form>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Numéro de compte</th>
                                <th>Libellé</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listecompte as $row) { ?>
                                <tr>
                                    <td><a href="detailgrandlivre?idcompte=<?php echo $row['id'] ?>&&idexercice=<?php echo $idexercice; ?>&&num=<?php echo $row['numerocompte']; ?>&&compte=<?php echo $row['nomcompte']; ?>"><?php echo $row['numerocompte']; ?></a></td>
                                    <td><a href="detailgrandlivre?idcompte=<?php echo $row['id'] ?>&&idexercice=<?php echo $idexercice; ?>&&num=<?php echo $row['numerocompte']; ?>&&compte=<?php echo $row['nomcompte']; ?>"><?php echo $row['nomcompte']; ?></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo site_url()?>../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>