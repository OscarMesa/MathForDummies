<?php 

	// $ar = array();
	// $ar[0] =  array('Title' => 'hola esta un prueba', 'ID' =>1 );
	// $ar[1] =  array('Title' => 'matermaticas', 'ID' =>2);
	// $ar[2] =  array('Title' => 'hacer casa ', 'ID' =>3);
	// $ar[3] =  array('Title' => 'scpaasdfsadf', 'ID' =>4 );
	// $ar[4] =  array('Title' => 'matermaticas1', 'ID' =>5);
	// $ar[5] =  array('Title' => 'matermaticas2', 'ID' =>6);
	// $ar[6] =  array('Title' => 'matermaticas34', 'ID' =>7);
	// echo json_encode($ar);

	$method = $_GET['method'];
	$AutoComplete = new AutoComplete();
	$AutoComplete->{$method}($_POST['filter']['filters'][0]['value']);

	class AutoComplete
	{
		private $cnn;
		
		public function __construct($argument="")
		{
			$this->cnn = $this->conectaDb('localhost','math','root','');
			// $query = $this->cnn->prepare("SELECT * FROM tipo_curso WHERE id=?");
			// $query->execute(array(1));

			// $row = $query->fetch();

			// print_r($row);

			
			// while($row = $query->fetch()):

			// 	echo $row['email'];

			// endwhile;
	
		}
		public function conectaDb($host = 'localhost',$database = "math", $user = "root", $pass ="")
		{
		    try {
		        $db = new PDO("mysql:dbname=".$database.";host=".$host, $user, $pass);
		        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        return($db);
		    }catch( PDOException $e){
				echo "Error Connection: " . $e->getMessage();
			}
		}
		public function AllCurses($value)
		{
			$tables = array();
			$query = $this->cnn->prepare('SELECT * FROM tipo_curso WHERE nombre LIKE "%'.$value.'%"');
			$query->execute();
			foreach ($query as $row) {
				$tables[] = array(  'Id'=>$row[0],
									'nombre'=>utf8_encode($row[1]));
			}
			echo json_encode($tables);
		}
		public function AllTechers($value)
		{
			$tables = array();
			$query = $this->cnn->prepare('SELECT id_usuario,nombre,apellido1,apellido2 FROM usuarios WHERE tipo_perfil = 2 AND nombre LIKE "%'.$value.'%"');
			$query->execute();
			foreach ($query as $row) {
				$tables[] = array(  'Id'=>$row[0],
									'nombre'=>	utf8_encode($row[1]),
									'apellido1' => utf8_encode($row[2]),
									'apellido2' => utf8_encode($row[3]));
			}
			echo json_encode($tables);

		}
	}


?>

