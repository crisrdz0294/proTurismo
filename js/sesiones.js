/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function VerificarLogin(){
     $(document).ready(function () {

        $.post('business/sesionesAction.php', {
            logear: 'logear',
            emailLogin: document.getElementById("emailLogin").value,
            passwordLogin: document.getElementById("passwordLogin").value,

        },
                function (responseText)
                {
                  if(responseText=="index.php"){
                      alert("Error usuario o contraseña incorrectos");
                  }

                       location.href=responseText;

                    //var url = "index.php";

                        }
                                );
                            });
}
