<?php
  $page_title = 'Agregar usuarios';
  require_once('includes/load.php');

header('Content-Type: aplication/json');
$array = json_decode(file_get_contents("php://input"),true);


?>
<?php
  if($array["guardar"]==0)
  {
	  $email = $array["email"];
	  $password = sha1($array["password"]);
	  $login = $array["login"];
  
        $query = "INSERT INTO users (";
        $query .="email,password,login,status";
        $query .=") VALUES (";
        $query .=" '{$email}', '{$password}', '{$login}','1'";
        $query .=")";
        
        if($db->query($query)){
          //sucess
           $data['mensaje'] = 'Registro Exitoso';
        }
         else {
          //failed
           $data['mensaje'] = 'Error al intentar registrar';
        }
        
             
        //returns data as JSON format
        echo json_encode($data);
        
  }
  
?>
