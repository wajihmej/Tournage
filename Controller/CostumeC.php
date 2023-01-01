<?php 
require_once '../config.php';
class CostumeC{

    public function afficherCostumes(){
        $sql="SELECT * From Costume";
        $db=config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch(Exception $e){
            die('Erreur:' .$e->getMessage());
        }
    }
    public function afficherCostumesProjet($id){
        $sql="SELECT * From Costume where id_proj=$id";
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
        $sql="select * from Costume where email like '".$str."%' or nom like '".$str."%'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }

    function recupererCostume($id){
        $sql="SELECT * from Costume where id=$id";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function recupererCostumeByNum($num){
        $sql="SELECT * from Costume where numero_costume='".$num."'";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function ajouterCostumeImg($idcost,$image){
        $sql="insert into imagescost(idcost,image) values(:idcost,:image)";
        $db = config::getConnexion();
        try{
        
        $req=$db->prepare($sql);
    
        $req->bindValue(':idcost',$idcost);
        $req->bindValue(':image',$image);

        
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        
    }

    function afficherimages($idcost){
        $sql="SELECT * from imagescost where idcost=$idcost";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }        
    }

public function ajouterCostume($Costume){
    $sql="insert into Costume(numero_costume,nom_personnage,Description,id_proj) values(:numcost,:nomPerso,:description,:idproj)";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $numcost=$Costume->getNumCost();
    $nomPerso=$Costume->getNomPerso();
    $description=$Costume->getDescription();
    $idproj=$Costume->getIdProj();

    $req->bindValue(':numcost',$numcost);
    $req->bindValue(':nomPerso',$nomPerso);
    $req->bindValue(':description',$description);
    $req->bindValue(':idproj',$idproj);
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}
        
public function supprimerCostumeImg($id){
    $sql="DELETE FROM imagescost where idcost='".$id."'";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}
public function supprimerCostume($id){
    $sql="DELETE FROM Costume where id='".$id."'";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}

    
    function modifierCostume($Costume,$id){
        $sql="UPDATE Costume SET nom_Costume=:nomAct,nom_personnage=:nomPerso,Description=:description,id_proj=:idproj WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $nomcost=$Costume->getNumCost();
        $nomPerso=$Costume->getNomPerso();
        $description=$Costume->getDescription();
        $idproj=$Costume->getIdProj();
    
        $req->bindValue(':id',$id);
        $req->bindValue(':nomcost',$nomcost);
        $req->bindValue(':nomPerso',$nomPerso);
        $req->bindValue(':description',$description);
        $req->bindValue(':idproj',$idproj);
        $req->execute();
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