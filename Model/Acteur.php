<?php 
class Acteur{
		private $id;
		private $nom_acteur;
        private $nom_personnage;
        private $contact;
        private $mensuration_haut;
        private $mensuration_bas;
        private $pointure_chaussures;
        private $image;
		private $id_proj;

		public function __construct($nom_acteur,$nom_personnage,$contact,$mensuration_haut,$mensuration_bas,$pointure_chaussures,$image,$id_proj){
        $this->nom_acteur=$nom_acteur;
		$this->nom_personnage=$nom_personnage;
		$this->contact=$contact;
		$this->mensuration_haut=$mensuration_haut;
		$this->mensuration_bas=$mensuration_bas;
		$this->pointure_chaussures=$pointure_chaussures;
		$this->image=$image;
		$this->id_proj=$id_proj;
		}
		public function getid(){
			return $this->id;
		}
		public function getNomAct(){
			return $this->nom_acteur;
		}
		public function getNomPerso(){
			return $this->nom_personnage;
		}
		public function getContact(){
			return $this->contact;
        }
		public function getMentH(){
			return $this->mensuration_haut;
        }
		public function getMentB(){
			return $this->mensuration_bas;
        }
		public function getPointure(){
			return $this->pointure_chaussures;
        }
		public function getImage(){
			return $this->image;
        }
		public function getIdProj(){
			return $this->id_proj;
        }

		public function setid($id){
			$this->id=$id;
		}
		public function setNomAct($nom_acteur){
			$this->nom_acteur=$nom_acteur;
		}
		public function setNomPerso($nom_personnage){
			$this->nom_personnage=$nom_personnage;
		}
        public function setContact($contact){
			$this->contact=$contact;
        }
        public function setMentH($mensuration_haut){
			$this->mensuration_haut=$mensuration_haut;
        }
        public function setMentB($mensuration_bas){
			$this->mensuration_bas=$mensuration_bas;
        }
        public function setPointure($pointure_chaussures){
			$this->pointure_chaussures=$pointure_chaussures;
        }
        public function setImage($image){
			$this->image=$image;
        }
        public function setIdProj($id_proj){
			$this->id_proj=$id_proj;
        }
}

?>