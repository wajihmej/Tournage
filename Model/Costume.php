<?php 
class Costume{
		private $id;
		private $numero_costume;
        private $nom_personnage;
        private $description;
		private $id_proj;

		public function __construct($numero_costume,$nom_personnage,$description,$id_proj){
        $this->numero_costume=$numero_costume;
		$this->nom_personnage=$nom_personnage;
		$this->description=$description;
		$this->id_proj=$id_proj;
		}
		public function getid(){
			return $this->id;
		}
		public function getNumCost(){
			return $this->numero_costume;
		}
		public function getNomPerso(){
			return $this->nom_personnage;
		}
		public function getDescription(){
			return $this->description;
        }
		public function getIdProj(){
			return $this->id_proj;
        }

		public function setid($id){
			$this->id=$id;
		}
		public function setNumCost($numero_costume){
			$this->numero_costume=$numero_costume;
		}
		public function setNomPerso($nom_personnage){
			$this->nom_personnage=$nom_personnage;
		}
        public function setDescription($description){
			$this->description=$description;
        }
        public function setIdProj($id_proj){
			$this->id_proj=$id_proj;
        }
}

?>