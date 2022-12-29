<?php 
require_once '../config.php';
class AdminC{

    public function afficher($user){
        $id=$user->getid();
        $nom=$user->getNom();
        $prenom=$user->getPrenom();
        $email=$user->getEmail();
        $mdp=$user->getMdp();

}    
    
public function afficherAdmins(){
    $sql="SELECT * From admin";
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
        $sql="select * from admin where email like '".$str."%' or nom like '".$str."%'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }

    function recupererAdmin($id){
        $sql="SELECT * from admin where id=$id";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
        function recupereremail($email){
        $sql="SELECT * from admin where email=:email";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
        $req->bindValue(':email',$email);
        $req->execute();
        $res=$req->fetchAll();
        return $res;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

            //chya3mel update lil immage ama fil asel yajouti fil path
    function ajouterAdminimg($email,$image){
        $sql="UPDATE admin SET image=:image WHERE email=:email";
        $db = config::getConnexion();
        try{
        
        $req=$db->prepare($sql);
    
        $req->bindValue(':email',$email);
        $req->bindValue(':image',$image);

        
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        
    }
    function ajouterAdminToken($email,$token){
        $sql="UPDATE admin SET mdp=:token WHERE email=:email";
        $db = config::getConnexion();
        try{
        
        $req=$db->prepare($sql);
    
        $req->bindValue(':email',$email);
        $req->bindValue(':token',password_hash($token, PASSWORD_DEFAULT));

        
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        
    }
    function ajouterAdminDernieracc($email){
        $sql="UPDATE admin SET dernier_acc=now() WHERE email=:email";
        $db = config::getConnexion();
        try{
        
        $req=$db->prepare($sql);
    
        $req->bindValue(':email',$email);

        
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        
    }
public function ajouterAdmin($user){
    $sql="insert into admin(nom,email,mdp,tel) values(:nom,:email, :mdp,:tel)";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $nom=$user->getNom();
    $email=$user->getEmail();
    $mdp=password_hash($user->getMdp(), PASSWORD_DEFAULT);
    $tel=$user->getTel();

    $req->bindValue(':nom',$nom);
    $req->bindValue(':email',$email);
    $req->bindValue(':mdp',$mdp);
    $req->bindValue(':tel',$tel);
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}
public function supprimerAdmin($id){
    $sql="DELETE FROM admin where id=:id";
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

    function modifierAdminPwd($admin,$id){
        $sql="UPDATE admin SET nom=:nom,email=:email,mdp=:mdp,tel=:tel WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        $nom=$admin->getNom();
        $email=$admin->getEmail();
        $mdp=password_hash($admin->getMdp(), PASSWORD_DEFAULT);
        $tel=$admin->getTel();
        $datas = array(':id'=>$id, ':nom'=>$nom, ':email'=>$email, ':mdp'=>$mdp,':tel'=>$tel);
        $req->bindValue(':id',$id);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':email',$email);
        $req->bindValue(':mdp',$mdp);
        $req->bindValue(':tel',$tel);
        
            $s=$req->execute();
            
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
        
    }
       function modifierAdmin($admin,$id){
        $sql="UPDATE admin SET nom=:nom,email=:email,tel=:tel WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        $nom=$admin->getNom();
        $email=$admin->getEmail();
        $tel=$admin->getTel();
        $datas = array(':id'=>$id, ':nom'=>$nom, ':email'=>$email,':tel'=>$tel);
        $req->bindValue(':id',$id);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':email',$email);
        $req->bindValue(':tel',$tel);
        
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