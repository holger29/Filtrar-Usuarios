<?php 
//crear una funcion que busque un Valor que se encuentre dentro de un array
function buscaValor($arr,$vb){ 
    foreach($arr as $value){
        if($value==$vb){return true;}
    }
    return false;  
}
/*if (buscaValor($array, $valorBuscado)){
    echo "$valorBuscado ". "se encuentra dentro del arreglo";
}else{
    echo "$valorBuscado ". "no se encuentra dentro del arreglo";
}*/
?>