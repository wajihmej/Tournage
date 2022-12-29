<?php 
class Sequence{
		private $id;
		private $id_episode;
        private $nom;

		public function __construct($id_episode,$nom){
        $this->id_episode=$id_episode;
		$this->nom=$nom;
		}
		public function getid(){
			return $this->id;
		}
		public function getNom(){
			return $this->nom;
		}
		public function getIdEp(){
			return $this->id_episode;
        }

		public function setid($id){
			$this->id=$id;
		}
		public function setNom($nom){
			$this->nom=$nom;
		}
        public function setIdEp($id_episode){
			$this->id_episode=$id_episode;
        }
}

?>