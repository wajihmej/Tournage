<?php 
require_once '../config.php';
class ProjetC{

public function afficherProjets(){
    $sql="SELECT * From Projet";
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
        $sql="select * from Projet where email like '".$str."%' or nom like '".$str."%'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }

    function recupererProjet($id){
        $sql="SELECT * from Projet where id=$id";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


public function ajouterProjet($Projet){
    $sql="insert into Projet(nom,type) values(:nom,:type)";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $nom=$Projet->getNom();
    $type=$Projet->getType();

    $req->bindValue(':nom',$nom);
    $req->bindValue(':type',$type);
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}
public function supprimerProjet($id){
    $sql="DELETE FROM Projet where id=:id";
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

    
    function modifierProjet($Projet,$id){
        $sql="UPDATE Projet SET nom=:nom,type=:type WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        $nom=$Projet->getNom();
        $type=$Projet->getType();
        $datas = array(':id'=>$id, ':nom'=>$nom, ':type'=>$type);
        $req->bindValue(':id',$id);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':type',$type);
        
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