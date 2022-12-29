<?php 
require_once '../config.php';
class EpisodeC{

    public function afficherEpisodes(){
        $sql="SELECT * From Episode";
        $db=config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch(Exception $e){
            die('Erreur:' .$e->getMessage());
        }
    }
    public function afficherEpisodesProjet($id){
        $sql="SELECT * From Episode where id_proj=$id";
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
        $sql="select * from Episode where email like '".$str."%' or nom like '".$str."%'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }

    function recupererEpisode($id){
        $sql="SELECT * from Episode where id=$id";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


public function ajouterEpisode($Episode){
    $sql="insert into Episode(nom,id_proj) values(:nom,:idproj)";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $nom=$Episode->getNom();
    $idproj=$Episode->getIdProj();

    $req->bindValue(':nom',$nom);
    $req->bindValue(':idproj',$idproj);
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}
public function supprimerEpisode($id){
    $sql="DELETE FROM Episode where id=:id";
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

    
    function modifierEpisode($Episode,$id){
        $sql="UPDATE Episode SET nom=:nom,id_proj=:idproj WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        $nom=$Episode->getNom();
        $idproj=$Episode->getIdProj();
        $datas = array(':id'=>$id, ':nom'=>$nom, ':idproj'=>$idproj);
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