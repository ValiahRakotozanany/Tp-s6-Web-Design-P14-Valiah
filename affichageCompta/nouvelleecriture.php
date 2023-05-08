<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Compta-affichage</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background: rgba(255,255,255,0.63);">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 4%;background: rgba(255,153,0,0.96);border-radius: 10px 1px 10px 1px;">
                <nav class="navbar navbar-light navbar-expand-md">
                    <div class="container-fluid"><a class="navbar-brand" href="#">Plan Comptable</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="navbar-nav">
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
                    <h1 style="text-align: center;margin-top: 0%;">Nouvelle écriture</h1>
                    <p style="text-align: center;"></p>
                </form>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NoPièce</th>
                                <th>Libellé</th>
                                <th>Référence pièce</th>
                                <th>Jour</th>
                                <th>Compte</th>
                                <th>Tiers</th>
                                <th>Devise</th>
                                <th>Taux de change</th>
                                <th>Débit</th>
                                <th>Crédit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" style="width: 104%;background: rgba(255,255,255,0.61);border-color: rgba(0,0,0,0.54);border-top-color: rgb(0,;border-right-color: 0,;border-bottom-color: 0);border-left-color: 0,;margin: 0%;margin-left: 10%;margin-right: 0%;"></td>
                                <td><input type="text" style="width: 104%;background: rgba(255,255,255,0.61);border-color: rgba(0,0,0,0.54);border-top-color: rgb(0,;border-right-color: 0,;border-bottom-color: 0);border-left-color: 0,;margin: 0%;margin-left: 10%;margin-right: 0%;"></td>
                                <td><input type="text" style="width: 104%;background: rgba(255,255,255,0.61);border-color: rgba(0,0,0,0.54);border-top-color: rgb(0,;border-right-color: 0,;border-bottom-color: 0);border-left-color: 0,;margin: 0%;margin-left: 10%;margin-right: 0%;"></td>
                                <td><input type="text" style="width: 104%;background: rgba(255,255,255,0.61);border-color: rgba(0,0,0,0.54);border-top-color: rgb(0,;border-right-color: 0,;border-bottom-color: 0);border-left-color: 0,;margin: 0%;margin-left: 10%;margin-right: 0%;"></td>
                                <td><input type="text" style="width: 104%;background: rgba(255,255,255,0.61);border-color: rgba(0,0,0,0.54);border-top-color: rgb(0,;border-right-color: 0,;border-bottom-color: 0);border-left-color: 0,;margin: 0%;margin-left: 10%;margin-right: 0%;"></td>
                                <td><input type="text" style="width: 104%;background: rgba(255,255,255,0.61);border-color: rgba(0,0,0,0.54);border-top-color: rgb(0,;border-right-color: 0,;border-bottom-color: 0);border-left-color: 0,;margin: 0%;margin-left: 10%;margin-right: 0%;"></td>
                                <td><select style="background: rgba(255,255,255,0.28);color: rgba(0,0,0,0.66);margin: 0%;margin-left: 10%;margin-right: 0%;width: 104%;">
                                        <option value="dollar" selected="">Dollar</option>
                                        <option value="euro">Euro</option>
                                        <option value="ariary">Ariary</option>
                                    </select></td>
                                <td><input type="text" style="width: 104%;background: rgba(255,255,255,0.61);border-color: rgba(0,0,0,0.54);border-top-color: rgb(0,;border-right-color: 0,;border-bottom-color: 0);border-left-color: 0,;margin: 0%;margin-left: 10%;margin-right: 0%;"></td>
                                <td><input type="text" style="width: 104%;background: rgba(255,255,255,0.61);border-color: rgba(0,0,0,0.54);border-top-color: rgb(0,;border-right-color: 0,;border-bottom-color: 0);border-left-color: 0,;margin: 0%;margin-left: 10%;margin-right: 0%;"></td>
                                <td><input type="text" style="width: 104%;background: rgba(255,255,255,0.61);border-color: rgba(0,0,0,0.54);border-top-color: rgb(0,;border-right-color: 0,;border-bottom-color: 0);border-left-color: 0,;margin: 0%;margin-left: 10%;margin-right: 0%;"></td>
                                <td><button class="btn btn-primary" type="submit" style="background: rgba(253,71,13,0.84);color: rgb(0,0,0);font-weight: bold;border-style: none;text-align: center;margin: 0%;margin-left: 10%;margin-right: 0%;width: 104%;">Ajouter</button></td>
                            </tr>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>