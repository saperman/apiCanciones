function NewUser(){
  var mensajeDevuelta = document.getElementById("mensajeDevuleto");
  var name = document.getElementById("name").innerHTML;
  var params = "&name="+name
  var ajax_url = "http://localhost:8888/UsuariosBueno/fuelphp/public/create.json";
  var ajax_request = new XMLHttpRequest();
  ajax_request.onreadystatechange = function(){
    if (ajax_request.readyState == 4) {
      var response = JSON.parse(ajax_request.responseText);
      mensajeDevuelta.innerHTML = response;
    } else {
      // aun no esta listo
    }
  }
  ajax_request.open("POST", ajax_url, true);
  ajax_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  //Enviamos la solicitud junto con los parámetros
  ajax_request.send(params);
}
      // function UpdateList(){

      //   // var ajax_url = "http://localhost:8888/Usuarios/fuelphp-1.8/public/users.json";
      //   // var ajax_request = new XMLHttpRequest();
      //   // var tabla = document.getElementById("tableBody");
        
      //   // ajax_request.onreadystatechange = function(){
      //   //   if (ajax_request.readyState == 4) {
      //   //       if(var response = JSON.parse(ajax_request.responseText);){
      //   //         for(users in response.data){
      //   //           var fila = "<td>"+response.data.id+"</td><td>"+response.data.name+"</td>";
      //   //           tabla.innerHTML = fila;
      //   //         }
      //   //       }
      //   //   } else {
      //   //     // aun no esta listo
      //   //   }

      //   // }
      //   // ajax_request.open("GET", ajax_url, true);
        
      // }