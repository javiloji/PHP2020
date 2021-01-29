<?php

include "Empleado.php";

$empleado1 = new Empleado("Manuel",4000);
$empleado2 = new Empleado("Ana",2040);
$empleado4 = new Empleado("Maria",1500);
$empleado3 = new Empleado("Alonso",3200);

$empleado1->pagar();
$empleado2->pagar();
$empleado3->pagar();
$empleado4->pagar();

?>