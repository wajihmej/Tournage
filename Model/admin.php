<?php 
class Admin{
		private $id;
		private $nom;
        private $email;
        private $mdp;
		private $tel;
		private $dernier_acc;

		public function __construct($nom,$email,$mdp,$tel){
        $this->nom=$nom;
        $this->email=$email;
        $this->mdp=$mdp;
        $this->tel=$tel;

		}
		public function getid(){
			return $this->id;
		}
		public function getNom(){
			return $this->nom;
		}
		public function getEmail(){
			return $this->email;
        }
        public function getMdp(){
			return $this->mdp;
        }
		public function getTel(){
			return $this->tel;
		}
        public function getDernier_acc(){
			return $this->dernier_acc;
        }

		public function setid($id){
			$this->id=$id;
		}
		public function setNom($nom){
			$this->nom=$nom;
		}
        public function setEmail($email){
			$this->email=$email;
        }
        public function setMdp($mdp){
			$this->mdp=$mdp;
        }
        public function setTel($tel){
			$this->tel=$tel;
        }
        public function setDernier_acc($dernier_acc){
			$this->dernier_acc=$dernier_acc;
        }
}

?>