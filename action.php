<?php
include('db.php');

class DataOperation extends Database{
	public function insertData($table,$value){
		$sql="INSERT INTO ".$table." (".implode("," , array_keys($value)).") VALUES (' ".implode(" ',' ", array_values($value)). " ')";/////////////
		// echo $sql;
		mysqli_query($this -> conn,$sql);
		header("location:index.php");
	}

	public function selectData($table){
		$sql="SELECT * FROM " .$table;
		$query=mysqli_query($this->conn,$sql);
		return $query;//index htae ka table //return pyan line 45 ko yout
	}
	public function deleteData($table,$where){
		//delete from about where id='$id';
		$sql="DELETE FROM ".$table." WHERE ".$where;
		// echo $sql;	
		mysqli_query($this->conn,$sql);
		header("location:index.php");
	}

	public function editData($table,$where){
		$sql="SELECT * FROM ".$table." WHERE ".$where;
		// echo $sql;
		$query=mysqli_query($this -> conn,$sql);
		return $query;//input box ka index htae mar mo lo
	}

	public function updateData($table,$value,$where){
		$sql="UPDATE ".$table." SET ".$value." WHERE ".$where;
		mysqli_query($this->conn,$sql);
		header("location:index.php");
	}
}
$obj=new DataOperation;

if(isset($_POST['name']) && isset($_POST['author'])){
	$myarray = array("name"=>$_POST['name'],"author"=>$_POST['author']);
	$obj->insertData("about",$myarray);////////
}
if(isset($_GET['id'])){
	//id='$id';
	$condition = "id='".$_GET['id']."'";
	// echo $condition;
	$obj->deleteData("about",$condition);
}
if(isset($_POST['uid']) && isset($_POST['uname']) && isset($_POST['uauthor'])){
	$a="";
	$condition = "id='".$_POST['uid']."'";
	$myarray=array("name"=>$_POST['uname'],"author"=>$_POST['uauthor']);
	foreach ($myarray as $key => $value) {
		$a.=$key."='".$value."',";
	
	}
	$b=substr($a, 0,-1);
	// echo $b;
	$obj->updateData("about",$b,$condition);
}
?>