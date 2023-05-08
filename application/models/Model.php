<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model
{

    public function SelectArticle($offset)
    {
        $request = "select * from V_Article  LIMIT 3 OFFSET ".$offset;
        $query = $this->db->query($request);
        return $query->result_array();
    }
    public function countArticle()
    {
        $request = "select count(id) as nbr from V_Article";
        $query = $this->db->query($request);
        return $query->result_array();
    }

    

    public function getArticleById($slug)
    {
        $split = explode("-", $slug);
            $split = explode(".", $split[count($split)-1]);
            $id = $split[0];
            $requete="select * from V_Article WHERE id = %s";
            $requete = sprintf($requete,$id);
            $query=$this->db->query($requete);
            return $query->result_array();
    }
}

 /*   public function insertEcriture($date, $refPiece, $idcompte, $idtiers, $libelle, $debit, $credit)
    {
        //echo $idNumCompte;
        //echo strlen($idNumCompte);
        // $this->db->query('INSERT INTO Compte(,idNumCompte) VALUES (\'' . $description . '\',\'' . $idNumCompte . '\')');
        $sql = "Insert into Ecriture(Date,refPiece,idcompte,intitule,idtiers,libelle,debit,credit) values ('" . $date . "','" . $refPiece . "'," . $idcompte . "," . $idtiers . ",'" . $libelle . "'," . $debit . "," . $credit . ")";
        $ex = $this->db->query($sql);
    }

  /*  public function selectCompte($value)
    {
        $request = "select * from compte where numerocompte like'" . $value . "%'";
        $query = $this->db->query($request);
        return $query->result_array();
    }
    public function TierSelect($value)
    {
        $request = "select * from tiers where fournisseur like'" . $value . "%'";
        $query = $this->db->query($request);
        return $query->result_array();
    }

    public function insertCompte($numero, $nomCompte)
    {
        $nomC = $this->db->escape($nomCompte);
        $sql = "Insert into compte(numeroCompte,nomCompte) values ('" . $numero . "'," . $nomC . ")";
        $this->db->query($sql);
    }

    public function journaux()
    {
        $sql = "select * from journal";
        $sql = $this->db->query($sql);
        return $sql->result_array();
    }

    public function compte()
    {
        $sql = "select * from compte";
        $sql = $this->db->query($sql);
        return $sql->result_array();
    }

    public function listeExercice()
    {
        $sql = "select * from exercice";
        $query = $this->db->query("SELECT * from exercice");
        return $query->result_array();
    }

    public function getMoisExercice()
    {
        $sql = " select extract(month from dateDebut) as mois,extract(year from dateDebut) as annee from exercice  order by id desc limit 1";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function getidExo()
    {
        $sql = " select  id from exercice  order by id desc limit 1";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function listeJournauxParExo($idExercice)
    {
        $sql = " select j.nom as nom ,jj.id as id , jj.mois as mois,m.mois as nommois , jj.annee as annee ,ex.nom as nomExercice, jj.idExercice as idExercice, jj.idjournal as idjournal from journalexo jj join journal j on j.id = jj.idjournal join exercice ex on ex.id = jj.idexercice join mois m on jj.mois=m.id where jj.idExercice = " . $idExercice;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function listeJournaux()
    {
        $sql = "select nom from journal group by nom";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public  function insertExercice($nom, $dateDebut)
    {
        $sql = "insert into Exercice(nom,dateDebut) values('" . $nom . "','" . $dateDebut . "')";
        $this->db->query($sql);
        return 1;
    }

    public function nbJournal()
    {
        $sql = " select * from nbjournal";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function insertJournal($codejournal, $nom)
    {
        $sql = "insert into Journal(codejournal, nom) values('" . $codejournal . "', '" . $nom . "')";
        $this->db->query($sql);
    }

    public function insertExJournal($idJournal, $idExercice, $mois, $annee)
    {
        $sql = "insert into JournalExo(idJournal,idExercice,mois,annee) values (" . $idJournal . "," . $idExercice . "," . $mois . "," . $annee . ")";
        $this->db->query($sql);
    }


    public function listeEcritureParJournalEx($idExercice, $idJournal, $mois, $annee)
    {
        $sql = "select refpiece ,etatclock from ecriture where idExercice = " . $idExercice . " and idJournal = " . $idJournal . " and extract(month from date) = " . $mois . " and extract(year from date) =" . $annee . " group by refPiece,etatclock";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function setecriture($date, $refPiece, $idCompte, $idTiers, $libelle, $debit, $credit, $idExercice, $idJournal, $numpiece, $idDevise, $tauxchange)
    {
        $sql = "insert into Ecriture(date,refPiece,idcompte,idtiers,libelle,debit,credit,idExercice,idJournal,numpiece,devise,tauxchange) values ('" . $date . "','" . $refPiece . "'," . $idCompte . "," . $idTiers . ",'" . $libelle . "'," . $debit . "," . $credit . "," . $idExercice . "," . $idJournal . "," . $numpiece . "," . $idDevise . "," . $tauxchange . ")";
        // echo $sql;
        $this->db->query($sql);
    }

    public function ecriture($refpiece, $idExercice, $idJournal)
    {
        $sql = "select ecriture.*, d.devise as deviseNom ,extract(year from date) as annee,extract(day from date) as jour,extract(month from date) as mois,c.nomcompte as nomcompte , c.numerocompte as numerocompte,t.compte as tiers , ecriture.etatclock as etatclock ,t.fournisseur as fournisseur from ecriture JOIN compte c on c.id = ecriture.idCompte JOIN tiers t on t.id = ecriture.idTiers JOIN devise d on d.id= ecriture.devise where refPiece = '" . $refpiece . "' and idexercice = " . $idExercice . " and idjournal = " . $idJournal . " order by id asc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function tiers()
    {
        $sql = "select * from tiers";
        $sql = $this->db->query($sql);
        return $sql->result_array();
    }

    public function deleteEcriture($idEcriture)
    {
        $sql = "delete from Ecriture where id = " . $idEcriture;
        $this->db->query($sql);
    }

    public function equilibrer($refPiece, $idExercice, $idJournal)
    {
        $sql = "select sum(debit) as totalDebit, sum(credit) as totalCredit ,etatValider from ecriture where refPiece = '" . $refPiece . "' and idexercice = " . $idExercice . " and idjournal = " . $idJournal . " group by etatValider";        
        $sql = $this->db->query($sql);
        return $sql->result_array();
    }

    public function fermer($refPiece)
    {
        $sql = "update ecriture set etatclock = 1 where refpiece = '" . $refPiece . "'";
        $this->db->query($sql);
    }

    public function numpiece($refPiece)
    {
        $sql = "select numpiece from ecriture where refpiece = '" . $refPiece . "' order by id desc limit 1 ";
        $sql = $this->db->query($sql);
        return $sql->result_array();
    }

    public function devise()
    {
        $sql = "select * from devise";
        $sql = $this->db->query($sql);
        return $sql->result_array();
    }

    public function maxNumPiece()
    {
        $sql = "select max(numpiece) as max from ecriture ";
        $sql = $this->db->query($sql);
        return $sql->result_array();
    }


    public function grandLivre($compte, $exo)
    {
        $sql = "select * from ecriture e , journalexo j , journal jj where j.id = e.idjournal and j.idjournal=jj.id and e.idcompte = '" . $compte . "' and e.idexercice = " . $exo ." and e.etatvalider = 1";
        $sql = $this->db->query($sql);
        return $sql->result_array();
    }

    public function idCompte($numeroCompte)
    {
        $sql = "select id from compte where numerocompte = '" . $numeroCompte . "' limit 1";
        $sql = $this->db->query($sql);
        return $sql->result_array();
    }

    public function idTiers($compte)
    {
        $sql = "select id from tiers where compte = '" . $compte . "' limit 1";
        $sql = $this->db->query($sql);
        return $sql->result_array();
    }

    public function valider($etatValider, $idJournal, $idExercice)
    {
        $sql = "update Ecriture set etatvalider = 1 where refpiece='" . $etatValider . "' and idJournal='" . $idJournal . "' and idExercice='" . $idExercice . "' ";        
        $sql = $this->db->query($sql);
    }
}
*/