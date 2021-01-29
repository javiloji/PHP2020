<?php

setcookie("user", "Valor de la cookie", time()+3600);

if(isset($_COOKIE["user"])){
    echo $_COOKIE["user"];
}else{
    echo "Creando cookie, regarge la página para ver su valor";
}

// setcookie("user", "Valor de la cookie", time() -3600);


?>