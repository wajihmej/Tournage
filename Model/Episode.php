<?php 
class Episode{
		private $id;
		private $id_proj;
        private $nom;

		public function __construct($id_proj,$nom){
        $this->id_proj=$id_proj;
		$this->nom=$nom;
		}
		public function getid(){
			return $this->id;
		}
		public function getNom(){
			return $this->nom;
		}
		public function getIdProj(){
			return $this->id_proj;
        }

		public function setid($id){
			$this->id=$id;
		}
		public function setNom($nom){
			$this->nom=$nom;
		}
        public function setIdProj($id_proj){
			$this->id_proj=$id_proj;
        }
}

?>