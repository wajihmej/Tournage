<?php 
require_once '../config.php';
class ActeurC{

    public function afficherActeurs(){
        $sql="SELECT * From Acteur";
        $db=config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch(Exception $e){
            die('Erreur:' .$e->getMessage());
        }
    }
    public function afficherActeursProjet($id){
        $sql="SELECT * From Acteur where id_proj=$id";
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
        $sql="select * from Acteur where email like '".$str."%' or nom like '".$str."%'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }

    function recupererActeur($id){
        $sql="SELECT * from Acteur where id=$id";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


public function ajouterActeur($Acteur){
    $sql="insert into Acteur(nom_acteur,nom_personnage,Contact,Mensuration_haut,mensuration_bas,pointure_chaussures,image,id_proj) values(:nomAct,:nomPerso,:contact,:menth,:mentb,:pointure,:image,:idproj)";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $nomAct=$Acteur->getNomAct();
    $nomPerso=$Acteur->getNomPerso();
    $contact=$Acteur->getContact();
    $menth=$Acteur->getMentH();
    $mentb=$Acteur->getMentB();
    $pointure=$Acteur->getPointure();
    $image=$Acteur->getImage();
    $idproj=$Acteur->getIdProj();

    $req->bindValue(':nomAct',$nomAct);
    $req->bindValue(':nomPerso',$nomPerso);
    $req->bindValue(':contact',$contact);
    $req->bindValue(':menth',$menth);
    $req->bindValue(':mentb',$mentb);
    $req->bindValue(':pointure',$pointure);
    $req->bindValue(':image',$image);
    $req->bindValue(':idproj',$idproj);
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}
        
public function supprimerActeur($id){
    $sql="DELETE FROM Acteur where id=:id";
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

    
    function modifierActeur($Acteur,$id){
        $sql="UPDATE Acteur SET nom_acteur=:nomAct,nom_personnage=:nomPerso,Contact=:contact,Mensuration_haut=:menth,mensuration_bas=:mentb,pointure_chaussures=:pointure,id_proj=:idproj WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        $req->bindValue(':nomAct',$nomAct);
        $req->bindValue(':nomPerso',$nomPerso);
        $req->bindValue(':contact',$contact);
        $req->bindValue(':menth',$menth);
        $req->bindValue(':mentb',$mentb);
        $req->bindValue(':pointure',$pointure);
        $req->bindValue(':idproj',$idproj);
            $datas = array(':id'=>$id, ':nomAct'=>$nomAct, ':idproj'=>$idproj);
        
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