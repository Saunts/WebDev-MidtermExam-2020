<?php
	class Student{
		var $id;
		var $name;
		var $tugas;
		var $uts;
		var $uas;
		var $grade;
		function __construct($id, $firstname, $lastname, $tugas, $uts, $uas){
			$this->id =$id;
			$this->name = $firstname . $lastname;
			$this->tugas = $tugas;
			$this->uts = $uts;
			$this->uas = $uas;
			$this->grade = ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);
		}
		public function getid() {return $this->id;}
		public function getname() {return $this->name;}
		public function gettugas() {return $this->tugas;}
		public function getuts(){return $this->uts;}
		public function getuas() {return $this->uas;}
		public function getgrade() {
			if($this->grade > 80) return "A";
			else if($this->grade > 65) return "B";
			else if($this->grade > 45) return "C";
			else return "D";
		}
		public function getlulus() {
			if($this->grade > 45) return "LULUS";
			else return "TIDAK LULUS";
		}
	}
?>