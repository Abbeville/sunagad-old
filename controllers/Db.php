<?php 
class Db
{
	public function __construct()
	{
		return true;
	}

	public static function con($host = "localhost",$user = "root",$pass = "", $db = "sunagad")
	{
		$con = new mysqli($host,$user,$pass,$db);
		return $con;
	}

	public static function select($table, $where = NULL, $order = NULL, $limit = NULL )
	{
		$query = "SELECT * FROM ".$table;
		if($where != NULL)
		{
			$query .= " WHERE ".$where;
		}
		if($order != NULL)
		{
			$query .= " ORDER BY ".$order;
		}

		if($limit != NULL)
		{
			$query .= " LIMIT ".$limit;
		}

		$run = self::con()->query($query);
		$count = $run->num_rows;
		$data = array();
		if($count > 0)
		{
			while($row = $run->fetch_object())
			{
				$data[] = $row;
			}
		}
		return $data;
	}

	public static function insert($table,$data)
	{
		$query = "INSERT INTO ".$table;
		$values = " VALUES('',";
		foreach ($data as $value)
		{
			$value = addslashes($value);
			$values .= "'".$value."', ";
		}

		$values = substr($values, 0, -2);
		$values .= ")";
		$values = substr($values, 0, 8).substr($values, 11);
		$query .= $values;
		$run = self::con()->query($query);

		if ($run) {
			return true;
		}
		// return false;
		return $query;
	}

	public static function statCounter($table,$params = NULL)
	{
		$query = "SELECT * FROM ".$table;
		if($params != NULL)
		{
			$query .= " WHERE ".$params;
		}
		$run = self::con()->query($query);
		return $run->num_rows;
	}

	public static function insertLeave($data = array()){
		$staff_id = $data['staff_id'];
		$start_date = $data['start_date'];
		$end_date = $data['end_date'];
		$note = $data['note'];

		$run = self::con()->query("INSERT INTO leaves (staff_id, start_date, end_date, note) VALUES('$staff_id', '$start_date', '$end_date', '$note')");
		return true;
	}

	public static function insertBed($data = array()){
		$patient = $data['patient'];
		$ward = $data['ward'];
		$bed = $data['bed'];
		$data['status'] = 1;
		$status = $data['status'];

		$run = self::con()->query("INSERT INTO bedding (ward,patient, bed, status) VALUES('$ward','$patient', '$bed', '$status')");
		return true;
	}

	public static function updater($table, $params,$where)
	{
		$query = "UPDATE ".$table." SET ";
		foreach($params as $field=>$value)
		{
			$query .= $field." = '".$value."', ";
		}

		$query = substr($query, 0, -2);
		$query .= " WHERE ".$where;
		self::con()->query($query);
	}
	public static function delete($table,$id)
	{
		$query = "DELETE FROM ".$table;
		if(is_array($id))
		{
			$val = "";
			foreach($id as $key=>$value)
			{
				$val .= $key . " = '".$value."'";
			}
		}
		else
		{
			echo "Please, only an array is required for parameter two";
			exit;
		}

		$query .= " WHERE ".$val;
		self::con()->query($query);
	}

}