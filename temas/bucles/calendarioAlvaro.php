<?php

    $diaSemana=['L','M','X','J','V','S','D'];                   
    $mes=10;                                                   
    $anno=2019;                                               
    $festivos=[12,27];                                        
    $diasMes=0;                                                
    $diaActual=date("d");                                       
    $primerDiaSemana=date("N", mktime(0,0,0,$mes,1,$anno));     
    $diaImprimido=1;                                            

    switch ($mes) {     
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            $diasMes=31;
            break;
        case 2:
            $diasMes=(annoBisiesto($anno)) ? 29 : 28;
            break;        
        case 4:            
        case 6:            
        case 9:            
        case 11:
            $diasMes=30;
            break;
        
    }

    echo "Calendario de $mes/$anno";

    //Imprimimos calendario
    echo "<table border='1'>";
    echo "<tr>";
    for ($i=0; $i<7; $i++) 
        echo "<td>$diaSemana[$i]</td>";
    echo "<tr>";
    for ($i=0; $i<6; $i++) {
        echo "<tr>";
        for ($j=1; $j<8; $j++) {
            if ($diaImprimido==1 && $j<$primerDiaSemana) 
                echo "<td bgcolor=\"#CCCCCC\"></td>"; 
            else {
                if ($diaImprimido<=$diasMes) {
                    if ($diaImprimido==$diaActual) 
                        echo "<td bgcolor=\"#73ff00\">$diaImprimido</td>";
                    else {
                        if ($j==7 || esFestivo($diaImprimido, $festivos)) 
                            echo "<td bgcolor=\"#FF0000\">$diaImprimido</td>";
                        else 
                            echo "<td>$diaImprimido</td>";
                    }
                    $diaImprimido++;
                }
                else 
                    echo "<td bgcolor=\"#CCCCCC\"></td>";
            }
        }
        echo "</tr>";
        if ($diaImprimido>$diasMes) 
            break;
    }
    echo "</table>";

    echo "<br/><a href="."../verCodigo.php?src=".str_replace("&bsol;","",__FILE__)."><button>Ver código</button></a>";

   
    function annoBisiesto($anno){
        if (($anno%4)!==0 && ($anno%100)!==0) return FALSE;
        elseif (($anno%4)==0 && ($anno%100)!==0) return TRUE;
        elseif (($anno%4)==0 && ($anno%100)==0 && ($anno%400)!==0) return FALSE;
    }
    
    function esFestivo($dia,$festivos) {
        for ($i=0; $i<sizeof($festivos); $i++)
            if ($dia==$festivos[$i]) return TRUE;
        return FALSE;
    }
?>