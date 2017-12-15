<?php
class peticionesCurl
{
	public function __construct($codeOfRequest){
		switch ($codeOfRequest) {
			case 1 :
				$this->getUsers();
				break;
			// case 2 :
			// 	$this->newUser();
			
			default:
				# code...
				break;
		}
	}
	public function getUsers()
	{//url contra la que atacamos
		$ch = curl_init("http://localhost:8888/Usuarios/fuelphp/public/ControladorUser/users.json");
		//a true, obtendremos una respuesta de la url, en otro caso, 
		//true si es correcto, false si no lo es
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//establecemos el verbo http que queremos utilizar para la petición
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		//obtenemos la respuesta
	 	$response = curl_exec($ch);
		// Se cierra el recurso CURL y se liberan los recursos del sistema
		curl_close($ch);
		if(!$response) {
		    return false;
		}else{
			$arrayUser = json_decode($response, true) ;
			foreach ($arrayUser as $key => $user) {
				$fila = '<tr><td>'.$user['id']."</td><td>".$user['nombre'].'</td><td><button class="btn btn-default" onclick="borrarUser('.$user['id'].')">Borrar Usuario</button></td></tr>';
				echo $fila;
			}
		}
	}


	// public function deleteUsers()
	// {//url contra la que atacamos
	// 	$data = array("idUser" => $idUser);
	// 	$ch = curl_init("http://localhost:8888/Usuarios/fuelphp/public/ControladorUser/delete.json");
	// 	//a true, obtendremos una respuesta de la url, en otro caso, 
	// 	//true si es correcto, false si no lo es
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	//establecemos el verbo http que queremos utilizar para la petición
	// 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
	// 	//obtenemos la respuesta
	//  	$response = curl_exec($ch);
	// 	// Se cierra el recurso CURL y se liberan los recursos del sistema
	// 	curl_close($ch);
	// 	if(!$response) {
	// 	    return false;
	// 	}else{
	// 		$arrayUser = json_decode($response, true) ;
	// 		foreach ($arrayUser as $key => $user) {
	// 			echo ("<tr><td>".$user['id']."</td><td>".$user['nombre']."</td></tr>");
	// 		}
	// 	}
	// }
}