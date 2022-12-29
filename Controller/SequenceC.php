<?php 
require_once '../config.php';
class SequenceC{

    public function afficherSequences(){
        $sql="SELECT * From Sequence";
        $db=config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch(Exception $e){
            die('Erreur:' .$e->getMessage());
        }
    }
    public function afficherSequencesEpisode($id){
        $sql="SELECT * From Sequence where id_episode=$id";
        $db=config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch(Exception $e){
            die('Erreur:' .$e->getMessage());
        }
    }

    public function afficherSelectionner($idep){
        $sql="SELECT * From seq_act_cost where id_ep='".$idep."'";
        $db=config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch(Exception $e){
            die('Erreur:' .$e->getMessage());
        }
    }
    function rechercherTicket($str){
        $sql="select * from Sequence where email like '".$str."%' or nom like '".$str."%'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }

    function recupererSequence($id){
        $sql="SELECT * from Sequence where id=$id";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    
    public function ajouterSelectionner($idact,$idcos,$idseq,$idep){
        $sql="insert into seq_act_cost(id_act,id_cost,id_seq,id_ep) values(:idact,:idcos,:idseq,:idep)";
        $db=config::getConnexion();
        try{
        $req=$db->prepare($sql);
    
        $req->bindValue(':idact',$idact);
        $req->bindValue(':idcos',$idcos);
        $req->bindValue(':idseq',$idseq);
        $req->bindValue(':idep',$idep);
        $req->execute();
        }
        catch(Exception $e){
            die('Erreur:' .$e->getMessage());
        }
        
    }
    
public function ajouterSequence($Sequence){
    $sql="insert into Sequence(nom,id_episode) values(:nom,:idep)";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $nom=$Sequence->getNom();
    $idep=$Sequence->getIdEp();

    $req->bindValue(':nom',$nom);
    $req->bindValue(':idep',$idep);
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}
public function supprimerSequence($id){
    $sql="DELETE FROM Sequence where id=:id";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $req->bindValue(':id',$id);
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}

    
    function modifierSequence($Sequence,$id){
        $sql="UPDATE Sequence SET nom=:nom,id_episode=:idep WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $nom=$Sequence->getNom();
        $idep=$Sequence->getIdEp();
        $req->bindValue(':id',$id);

        $req->bindValue(':nom',$nom);
        $req->bindValue(':idep',$idep);
        $datas = array(':id'=>$id, ':nom'=>$nom, ':idep'=>$idep);

            $s=$req->execute();
            
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
        
    }
}
?>