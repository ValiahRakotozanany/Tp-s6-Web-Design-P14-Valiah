<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mycontroller extends CI_Controller
{
    public function index()
    {
        $this->load->Model("Model");
        $data = array();
        $count = $this->Model->countArticle();
        $nbrpage = ($count[0]['nbr'] % 3) + ($count[0]['nbr'] / 3);
        $data['nbrpage'] = $nbrpage;
        if (isset($_GET['page']) && $_GET['page'] > 1) {
            $data['Article'] = $this->Model->SelectArticle($_GET['page'] + 1);
        } else if (isset($_GET['page']) &&($_GET['page']) == 1) {
            $data['Article'] = $this->Model->SelectArticle(0);
        } else {
            $data['Article'] = $this->Model->SelectArticle(0);
        }
        // $data['Article'] = $this->Model->SelectArticle();

        $this->load->view('index', $data);
    }

    public function detail($slug)
    {
        $this->load->model('Model');
        $data['Detail'] = $this->Model->getArticleById($slug);
        $this->load->view('Detail', $data);
    }
}
    /* public function index()
    {
        $this->load->view('indexx');
    }

    public function insertCompteYels()
    {
        $this->load->Model("Model");
        $this->Model->insertCompte($this->input->post('compte'), $this->input->post('texte'));
        $this->load->view('indexx.php');
    }

    public function insertJournalYels()
    {
        $this->load->Model("Model");
        $this->Model->insertJournal($this->input->post('codejournal'), $this->input->post('nom'));
        $this->journaux();
    }

    public function listeJournaux()
    {
        $idExercice = $this->input->get('idExo');
        $this->load->model("Model");
        $liste = array();
        $liste['liste'] = $this->Model->listeJournauxParExo($idExercice);
        $this->load->view('listeJournaux', $liste);
    }

    public function journaux()
    {
        $this->load->model("Model");
        $liste = array();
        $liste['liste'] = $this->Model->journaux();
        $this->load->view('journaux', $liste);
    }

    public function Exercice()
    {
        $this->load->model("Model");
        $exercice = array();
        $exercice['ex'] = $this->Model->listeExercice();
        $this->load->view('Exercice', $exercice);
    }

    public function Tiers()
    {
        $this->load->view('Tiers');
    }


    public function load()
    {
        $this->load->model("Model");
        $ccompte = array();
        $ccompte['compte'] = $this->Model->compte();
        $this->load->view('index', $ccompte);
    }

    public function insert()
    {
        $this->load->model("Model");
        $err['err'] = 'erreur';
        $ccompte = array();
        $ccompte['cc'] = $this->Model->compte();
        $ncompte = $this->input->post('Ncompte');
        $texte = $this->input->post('texte');
        $compte = $this->input->post('compte');
        $list = array();
        if ($texte == '' || $compte == '' || $ncompte == '') {
            $this->load->view('index', $err);
        } else {
            $compt = $ncompte . $compte;
            if (strlen($compt) < 5) {
                for ($i = strlen($compt); $i < 5; $i++) {
                    $compt = $compt . '0';
                }
                if (strlen($compt) < 14) {
                    $this->Model->insertCompte($texte, $compt);
                    $list['list'] = $this->Model->lister();
                    $this->load->view('Liste', $list, $ccompte);
                }
            }
            if (strlen($compt) > 13) {
                $err['err'] = 'Le nombre 13 doit être entre 5 et 13';
                $this->load->view('index', $err, $ccompte);
            }
        }
    }
    public function insertExercice()
    {
        $this->load->model("Model");
        $datedebut = $this->input->post('datedebut');
        $nom = $this->input->post('nom');
        $this->Model->insertExercice($nom, $datedebut);
        $moisDebut = $this->Model->getMoisExercice();
        $annee = $moisDebut[0]['annee'];
        $annee1 = $moisDebut[0]['annee'] + 1;
        $idExercice = $this->Model->getidExo();
        $id = $idExercice[0]['id'];
        $journal = $this->Model->nbJournal();
        $exercice = array();
        $exercice['ex'] = $this->Model->listeExercice();
        $exercice['erreur'] = "misy erreur fa tsy aiko ";
        for ($j = 1; $j < $journal[0]['nd']; $j++) {
            for ($i = $moisDebut[0]['mois']; $i <= 12; $i++) {
                $this->Model->insertExJournal($j, $id, $i, $annee);
                if ($i == 12) {
                    if ($moisDebut[0]['mois'] > 1) {
                        for ($z = 1; $z < $moisDebut[0]['mois']; $z++) {
                            $this->Model->insertExJournal($j, $id, $z, $annee1);
                        }
                    }
                }
            }
        }
        $this->load->view('Exercice', $exercice);
    }

    public function insertEcriture()
    {
        $this->load->model("Model");
        $idExercice = $this->input->get('idExercice');
        $idjournal = $this->input->get('idJournal');
        $mois = $this->input->get('mois');
        $annee = $this->input->get('annee');
        $listeEcriture = array();
        $listeEcriture['compte'] = $this->Model->compte();
        $listeEcriture['liste'] = $this->Model->listeEcritureParJournalEx($idExercice, $idjournal, $mois, $annee);
        $listeEcriture['annee'] = $annee;
        $listeEcriture['mois'] = $mois;
        $listeEcriture['idJournal'] = $idjournal;
        $listeEcriture['idExercice'] = $idExercice;        
        $this->load->view('listeEcriture', $listeEcriture);
    }

    public function insertCsv()
    {
        $this->load->model("Model");
        $csv = $this->input->post('csv');
        $fp = fopen($csv, "r");
        while (!feof($fp)) {
            $line = fgets($fp);
            $champ = array();
            $champ = explode(',', $line);
            echo  strtr($csv, "[]//", " ");
            $this->Model->insertCompte($champ[0], $champ[1]);
        }
        fclose($fp);
    }

    public function pageInsert()
    {
        $this->load->model("Model");
        $idExercice = $this->input->get('idExercice');
        $idjournal = $this->input->get('idJournal');
        $mois = $this->input->get('mois');
        $annee = $this->input->get('annee');
        $refPiece = $this->input->get('refPiece');
        $listeEcriture = array();
        $listeEcriture['compte'] = $this->Model->compte();
        $listeEcriture['tiers'] = $this->Model->tiers();
        $listeEcriture['liste'] = $this->Model->ecriture($refPiece, $idExercice, $idjournal);
        /* if(count($listeEcriture['liste'])!=0){
            if($listeEcriture['liste'][0]['etatValider'] ==0){                
            }
        }
        $listeEcriture['annee'] = $annee;
        $listeEcriture['mois'] = $mois;
        $listeEcriture['refpiece'] = $refPiece;
        $listeEcriture['idJournal'] = $idjournal;
        $listeEcriture['idExercice'] = $idExercice;
        $listeEcriture['devise'] = $this->Model->devise();
        //var_dump($listeEcriture['liste']);
        $this->load->view('pageInsertEcriture', $listeEcriture);
    }

    public function pageInsertYels($message)
    {
        $this->load->model("Model");
        $idExercice = $this->input->get('idExercice');
        $idjournal = $this->input->get('idJournal');
        $mois = $this->input->get('mois');
        $annee = $this->input->get('annee');
        $refPiece = $this->input->get('refPiece');
        $listeEcriture = array();
        $listeEcriture['compte'] = $this->Model->compte();
        $listeEcriture['tiers'] = $this->Model->tiers();
        $listeEcriture['liste'] = $this->Model->ecriture($refPiece, $idExercice, $idjournal);
        /* if(count($listeEcriture['liste'])!=0){
            if($listeEcriture['liste'][0]['etatValider'] ==0){                
            }
        }
        $listeEcriture['messageyels'] =$message;
        $listeEcriture['annee'] = $annee;
        $listeEcriture['mois'] = $mois;
        $listeEcriture['refpiece'] = $refPiece;
        $listeEcriture['idJournal'] = $idjournal;
        $listeEcriture['idExercice'] = $idExercice;
        $listeEcriture['devise'] = $this->Model->devise();
        //var_dump($listeEcriture['liste']);
        $this->load->view('pageInsertEcriture', $listeEcriture);
    }

    public function setecriture()
    {
        $this->load->model("Model");
        $refPiece = $this->input->get('refpiece');
        $idCompte = $this->input->get('idCompte');
        $idTiers = $this->input->get('idTiers');
        $libelle = $this->input->get('libelle');
        $debit = $this->input->get('debit');
        $credit = $this->input->get('credit');
        $idExercice = $this->input->get('idExercice');
        $idJournal = $this->input->get('idJournal');
        $annee = $this->input->get('annee');
        $mois = $this->input->get('mois');
        $jour = $this->input->get('jour');
        $tauxchange = $this->input->get('tauxchange');
        $idDevise = $this->input->get('devise');
        $idCompte = $this->Model->idCompte($idCompte);
        $idTiers = $this->Model->idTiers($idTiers);
        if ($debit != 0) {
            $debit = $tauxchange * $debit;
        }
        if ($credit != 0) {
            $credit = $tauxchange * $credit;
        }
        $numpiece = $this->Model->maxNumPiece();
        if ($numpiece[0]['max'] == '' || $numpiece[0]['max'] == null) {
            $numpiece[0]['max'] = 1;
            $_SESSION['numpiece'] = $numpiece[0]['max'];
        } else {
            $_SESSION['numpiece'] = $numpiece[0]['max'];
        }
        $listeEcriture["refpiece"] = $refPiece;
        $_SESSION["numpiece"] = $numpiece[0]['max'];
        $listeEcriture = array();
        $listeEcriture["annee"] = $annee;
        $listeEcriture["mois"] = $mois;
        $listeEcriture["refpiece"] = $refPiece;
        $date = $jour . "-" . $mois . "-" . $annee;
        $listeEcriture["idJournal"] = $idJournal;
        $listeEcriture["idExercice"] = $idExercice;
        $listeEcriture['devise'] = $this->Model->devise();
        $listeEcriture['compte'] = $this->Model->compte();
        $listeEcriture['tiers'] = $this->Model->tiers();
        //$listeEcriture['liste'] = $this->Model->ecriture($refPiece, $idExercice, $idJournal);
        $listeEcriture['liste'] = $this->Model->ecriture($refPiece, $idExercice, $idJournal);
        //$_SESSION['date'] = $date;        
        echo    count($listeEcriture['liste']);
        if (count($listeEcriture['liste']) == 0) {
            echo "ato ve";
            //echo   $_SESSION['numpiece'];
          //  echo   $_SESSION['refPiece'];
            $_SESSION['numpiece'] = $numpiece[0]['max'] + 1;
            $this->Model->setecriture($date, $refPiece, $idCompte[0]['id'], $idTiers[0]['id'], $libelle, $debit, $credit, $idExercice, $idJournal, $_SESSION['numpiece'], $idDevise, $tauxchange);
            $listeEcriture['liste'] = $this->Model->ecriture($refPiece, $idExercice, $idJournal);
            //$_SESSION['refPiece'] = $refPiece;
            //$_SESSION['date'] = $date;
        } else if (count($listeEcriture['liste']) > 0) {
            if ($listeEcriture['liste'][0]['etatclock'] == 0 && $listeEcriture['liste'][0]['etatvalider'] == 0  ) {
                echo "ato";
                $this->Model->setecriture($date, $refPiece, $idCompte[0]['id'], $idTiers[0]['id'], $libelle, $debit, $credit, $idExercice, $idJournal, $_SESSION['numpiece'], $idDevise, $tauxchange);
                $listeEcriture['liste'] = $this->Model->ecriture($refPiece, $idExercice, $idJournal);
            } else if ($listeEcriture['liste'][0]['etatvalider'] == 1 && $listeEcriture['liste'][0]['etatclock'] == 0) {
                $listeEcriture['liste'] = $this->Model->ecriture($refPiece, $idExercice, $idJournal);
                $this->Model->setecriture($listeEcriture['liste'][0]['date'], $listeEcriture['liste'][0]['refpiece'], $idCompte[0]['id'], $idTiers[0]['id'], $libelle, $debit, $credit, $idExercice, $idJournal, $listeEcriture['liste'][0]['numpiece'], $idDevise, $tauxchange);
                $listeEcriture['liste'] = $this->Model->ecriture($refPiece, $idExercice, $idJournal);
            } else if ($listeEcriture['liste'][0]['etatclock'] == 1) {
                $listeEcriture['message'] = "Vous ne pouvez plus toucher à cette ecriture car elle est fermé . ";
            }
            $listeEcriture["date"] = $date;
        }
        $listeEcriture["refpiece"] = $refPiece;
        $this->load->view('pageInsertEcriture', $listeEcriture);
    }

    public function deleteEcriture()
    {
        $this->load->model("Model");
        $idJournal = $this->input->get('idJournal');
        $idExercice = $this->input->get('idExercice');
        $id = $this->input->get('id');
        $refPiece = $this->input->get('refPiece');
        $listeEcriture = array();
        $listeEcriture = $this->Model->ecriture($refPiece, $idExercice, $idJournal);
        if (isset($listeEcriture)) {
            if ($listeEcriture[0]['etatclock'] == 0) {
                $listeEcriture['liste'] = $this->Model->deleteEcriture($id);
            }
            if ($listeEcriture[0]['etatclock'] == 1) {
                $listeEcriture['messageDelete'] = "Vous ne pouvez plus modifier cette écriture ";
            }
        }
        $this->pageInsert();
    }

    public function detailsEcriture()
    {
        $this->load->model("Model");
        $refPiece = $this->input->get('refPiece');
        $idExercice = $this->input->get('idExercice');
        $idJournal = $this->input->get('idJournal');
        $listeEcriture['devise'] = $this->Model->devise();
        $listeEcriture['liste'] = $this->Model->ecriture($refPiece, $idExercice, $idJournal);
        $listeEcriture['annee'] = $listeEcriture['liste'][0]['annee'];
        $listeEcriture['mois'] = $listeEcriture['liste'][0]['mois'];
        $listeEcriture['idJournal'] = $listeEcriture['liste'][0]['idjournal'];
        $listeEcriture['idExercice'] = $listeEcriture['liste'][0]['idexercice'];
        $listeEcriture['compte'] = $this->Model->compte();
        $listeEcriture['tiers'] = $this->Model->tiers();
        $this->load->view('pageInsertEcriture', $listeEcriture);
    }

    public function fermer()
    {
        $this->load->model("Model");
        $refPiece = $this->input->get('refPiece');
        $idExercice = $this->input->get('idExercice');
        $idJournal = $this->input->get('idJournal');
        $equilibre = array();
        $equilibre['liste'] = $this->Model->equilibrer($refPiece, $idExercice, $idJournal);
        if ($equilibre['liste'][0]['totaldebit'] == $equilibre['liste'][0]['totalcredit']) {
            if ($equilibre['liste'][0]['etatvalider'] == 1) {
                $this->Model->fermer($refPiece);
                $equilibre['messageFemer'] = " Cette écriture est fermé,vous ne pourez plus inserer ni modifier cette écriture .";
            }
        } else {
            $equilibre['messageFermer'] = "Vous devez d'abord équilibrer vos soldes avant de fermer ⚖ et valider votre écriture";
        }
        $listeEcriture['liste'] = $this->Model->ecriture($refPiece, $idExercice, $idJournal);
        $this->pageInsert();
    }
    //72,125
    public function equilibrer()
    {
        $this->load->model("Model");
        $refPiece = $this->input->get('refPiece');
        $equilibre = array();
        $idJournal = $this->input->get('idJournal');
        $date = $this->input->get('date');
        $idExercice  = $this->input->get('idExercice');
        $libelle  = $this->input->get('libelle');
        $tauxchange  = $this->input->get('tauxchange');
        $numpiece  = $this->input->get('numpiece');
        $devise  = $this->input->get('devise');
        $message="";
        $equilibre['liste'] = $this->Model->equilibrer($refPiece, $idExercice, $idJournal);
        if ($equilibre['liste']['0']['totaldebit'] > $equilibre['liste']['0']['totalcredit']) {
            $debit = $equilibre['liste']['0']['totaldebit'];
            $credit = $equilibre['liste']['0']['totalcredit'];
            $reste = $debit - $credit;
            $this->Model->setecriture($date, $refPiece, 125, 1, $libelle, 0, $reste, $idExercice, $idJournal, $numpiece, $devise, $tauxchange);
            $equilibre['equilibre'] = $this->Model->equilibrer($refPiece, $idExercice, $idJournal);
            $message = "équilibré";
        }
        if ($equilibre['liste']['0']['totaldebit'] < $equilibre['liste']['0']['totalcredit']) {
            $debit = $equilibre['liste']['0']['totaldebit'];
            $credit = $equilibre['liste']['0']['totalcredit'];
            $reste = $credit - $debit;
            $message = "équilibré";
            $this->Model->setecriture($date, $refPiece, 72, 1, $libelle, $reste, 0, $idExercice, $idJournal, $numpiece, $devise, $tauxchange);
            $equilibre['equilibre'] = $this->Model->equilibrer($refPiece, $idExercice, $idJournal);
        }
        $this->pageInsertYels($message);
    }

    public function testeValider()
    {
        $this->load->model("Model");
        $refPiece = $this->input->get('refPiece');
        $idJournal = $this->input->get('idJournal');
        $idExercice  = $this->input->get('idExercice');
        $equilibre = array();
        $equilibre['liste'] = $this->Model->equilibrer($refPiece, $idExercice, $idJournal);
        $debit = $equilibre['liste']['0']['totaldebit'];
        $credit = $equilibre['liste']['0']['totalcredit'];
        $message ="";
        if ($credit == $debit) {
            $this->Model->valider($refPiece, $idJournal, $idExercice);
            $message = "Bien validé";
        } else {
            $message = "Les soldes ne sont pas encore équilibrés";
            //$this->pageInsert();
        }
        $this->pageInsertYels($message);
       // $this->pageInsert();
    }

    public function compteajax()
    {
        $compte = $this->input->get('q');
        $this->load->model("Model");
        $tab = $this->Model->selectCompte($compte);
        for ($i = 0; $i < count($tab); $i++) {
            echo "<div id='comptelist' onclick='select(" . $tab[$i]['numerocompte'] . ")'>" . $tab[$i]['numerocompte'] . "-" . $tab[$i]['nomcompte'] . "</div>";
        }
    }

    public function tiersajax()
    {
        $compte = $this->input->get('q');
        $this->load->model("Model");
        $tab = $this->Model->TierSelect($compte);
        for ($i = 0; $i < count($tab); $i++) {                    
            echo "<div id='tierslist' onclick='tierselect(".$tab[$i]['compte'] .")'>" . $tab[$i]['compte'] . "-" . $tab[$i]['fournisseur'] . "</div>";
        }
    }

    public function detailgrandlivre()
    {
        $this->load->model("Model");
        $tab['idcompte'] = $this->input->get('idcompte');
        $tab['num'] = $this->input->get('num');
        $tab['compte'] = $this->input->get('compte');
        $tab['idexercice'] = $this->input->get('idexercice');
        $tab['grandlivre'] = $this->Model->grandLivre($this->input->get('idcompte'), $this->input->get('idexercice'));
        $debitamount = 0;
        $creditamount = 0;
        foreach ($tab['grandlivre'] as $row) {
            $debitamount = (float)$row['debit']+ $debitamount;
            $creditamount = (float)$row['credit']+ $creditamount;
        }
        $tab['totaldebit'] = $debitamount;
        $tab['totalcredit'] = $creditamount;
        $sd = 0;
        $sc = 0;
        if ($debitamount > $creditamount) {
            $sc = $debitamount - $creditamount;
        }
        if ($debitamount < $creditamount) {
            $sd = $debitamount - $creditamount;
        }
        $tab['soldedebiteur'] = $sd*(-1);
        $tab['soldecrediteur'] = $sc*(-1);
        $this->load->view("detailgrandlivre", $tab);
    }

    public function loadGrandLivre()
    {
        $this->load->model("Model");
        $tab['listecompte'] = $this->Model->compte();
        $tab['idexercice'] = $this->input->get('idexercice');
        $this->load->view("grandlivre", $tab);
    }

    public function showPDF()
    {
        $this->load->model("Model");
        $this->load->helper("url_helper");
        $data = array();
        $data['liste'] = $this->Model->compte();
        $this->load->view('listepdf', $data);
    }
}*/
