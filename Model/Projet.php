<?php 
class Projet{
		private $id;
		private $nom;
        private $type;

		public function __construct($nom,$type){
        $this->nom=$nom;
        $this->type=$type;
		}
		public function getid(){
			return $this->id;
		}
		public function getNom(){
			return $this->nom;
		}
		public function getType(){
			return $this->type;
        }

		public function setid($id){
			$this->id=$id;
		}
		public function setNom($nom){
			$this->nom=$nom;
		}
        public function setType($type){
			$this->type=$type;
        }
}

?>