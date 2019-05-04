<?php
class Database{
	public $a;
	private $b;
	protected $c;
	protected $conn;
	public function __destruct(){
		//echo "Bye Bye...";
	}
	public function testPublic($a){
		echo "I'm from Public<br>";
		echo $this->a;
		//$this->testPrivate();

	}

	public function __construct($host,$user,$pass,$db){
		//echo "GoodGood";
		$this->conn=new mysqli($host,$user,$pass,$db);
		//echo $this->conn->errno;
		if($this->conn->connect_errno){
				die($this->conn->connect_error);
		}
		
	}

	public function getAll($table,$cols){
		$sql="SELECT $cols FROM $table";
		$result=$this->conn->query($sql);

		if($result->num_rows>0){
			return $result->fetch_all(MYSQLI_ASSOC);

		}
		else{
			return false;
		}

	}

	public function getAllWithCondition($table,$cols,$condition){
		$sql="SELECT $cols FROM $table WHERE $condition";
		$result=$this->conn->query($sql);

		if($result->num_rows>0){
			return $result->fetch_all(MYSQLI_ASSOC);

		}
		else{
			return false;
		}

	}


	public function getAllwithTable($table,$cols,$css_classes="",$insert_file="insert.php",$edit_file="edit.php",$delete_file="delete.php"){
		$sql="SELECT $cols FROM $table";
		$result=$this->conn->query($sql);

		if($result->num_rows>0){
			$data= $result->fetch_all(MYSQLI_ASSOC);
			$table="<table border=\"1\" width=\"400\" cellpadding=\"5\" class=\"$css_classes\">";
			$table.="<tr>";
				foreach($data[0] as $key=>$val){
					$table.="<th>".ucfirst($key)."</th>";
				}
			$table.="</tr>";
			foreach($data as $row){
				$table.="<tr>";
					foreach($row as $val){
						$table.="<td>$val</td>";
					}
					$table.="<td><a href=\"$edit_file?id=$row[id]\" class=\"btn btn-primary glyphicon glyphicon-pencil\"></a>&nbsp;<a href=\"$delete_file?delid=$row[id]\" class=\"btn btn-danger glyphicon glyphicon-remove\"></a></td>";
				$table.="</tr>";
			}
			$table.="<tr>";
				$table.="<td colspan=\"5\" class=\"text-right\"><a class=\"btn btn-info\" href=\"$insert_file\">Add New Student</a></td>";
			$table.="</tr>";

			$table.="</table>";

			return $table;

		}
		else{
			return false;
		}

	}

	public function getAllByIds($table,$cols,$condition){
		$sql="SELECT $cols FROM $table WHERE $condition";
		$result=$this->conn->query($sql);

		if($result->num_rows>0){
			return $result->fetch_all(MYSQLI_ASSOC);

		}
		else{
			return false;
		}

	}

	public function getById($table,$cols,$condition){
		$sql="SELECT $cols FROM $table WHERE $condition";
		$result=$this->conn->query($sql);

		if($result->num_rows>0){
			return $result->fetch_assoc();

		}
		else{
			return false;
		}

	}

	public function Insert($table,$cols){
		$sql="INSERT INTO $table SET $cols";
		//	echo $sql;
		$result=$this->conn->query($sql);

		if($this->conn->affected_rows>0){
			return true;
		}
		else{
			return false;
		}

	}

	public function Update($table,$update_cols,$condition){
		$sql="UPDATE $table SET $update_cols WHERE $condition";

		$result=$this->conn->query($sql);

		if($this->conn->affected_rows>0){
			return true;
		}
		else{
			return false;
		}
	}

	public function Delete($table,$condition){

		$sql="DELETE FROM $table WHERE $condition";
			//echo $sql;
		$result=$this->conn->query($sql);

		if($this->conn->affected_rows>0){
			return true;
		}
		else{
			return false;
		}

	}


	private function testPrivate(){
		echo "I'm from Private";
	}

	protected function testProtected(){
		echo "I'm from Protected";
	}

	public function Login($table,$cols,$condition){
		$sql="SELECT $cols FROM $table WHERE $condition";
			//echo $sql;
		$result=$this->conn->query($sql);

		if($result->num_rows==1){

			return $result->fetch_assoc();

		}

		else{
			return false;
		}

	}
	public function readMore($content,$start,$end,$id,$btn_text){

		$new_content=explode(" ",$content);

		$to_array=array_slice($new_content,0,50);

		$read_more= implode(" ",$to_array)."&nbsp;&nbsp;"."<a href=\"index.php?readmore=$id\">$btn_text</a>";

		return $read_more;

	}
}

$x=new Database("localhost","root","","cms");

//print_r($x->Login("users","*","email='anik@mail.com' AND password='7c4a8d09ca3762af61e59520943dc26494f8941b'"));
//$x->a="GoodGood";
//$x->testPublic(4);

/*if($x->getAll("students","name,mobile")!=false){
	echo "<pre>";
		print_r($x->getAll("students","*"));
	echo "</pre>";
}*/
/*if($x->getById("students","*","id=1")!=false){
	echo "<pre>";
		print_r($x->getById("students","*","id=1"));
	echo "</pre>";
}*/

/*if($x->getAllByIds("students","*","id in (1,3)")!=false){
	echo "<pre>";
		print_r($x->getAllByIds("students","*","id in (1,3)"));
	echo "</pre>";
}*/

//echo $x->getAllwithTable("students","*");

/*echo $x->Insert("students","name='Mahbub',mobile='01988330022',address='Dhaka,Bangladesh'")?"Insert Success":"Insert Fail!";*/

/*echo $x->Update("students","name='Rokon',mobile='01988330044',address='Gazipur,Bangladesh'","id=5")?"Update Success":"Update Fail!";*/

//echo $x->Delete("students","id=2")?"Delete Success":"Delete Fail!";