<?php 

class Sql extends PDO {

	private $conexao;



	public function __construct()
	{

		$this->conexao = new PDO("pgsql:dbname=dbphp7; host=localhost", "postgres", "aldo1020");

	}





	private function setParams($steatment, $parameters = array())
	{

		foreach ($parameters as $key => $value) {

			$this->bsetParam($key, $value);
			
		}
	}






	private function setParam($steatment, $key, $value)
	{

		$steatment->bindParam($key, $value);
	}





	public function query($rawQuery, $params = array())
	{

		$stmt = $this->conexao->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt;

	}




	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


}


 ?>