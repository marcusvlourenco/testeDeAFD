<?php     
      echo "Ok";
    $alfabeto = str_split($_POST["alfabeto"]);    
    $estados = str_split($_POST["estados"], 2);
    $estadoI=$_POST["estadoI"];
    $estadosF = str_split($_POST["estadosF"], 2);       
    for($j = 0; $j < count($estados)-1; $j++){
        for($k = 0; $k < count($alfabeto)-2; $k++){               
            $fT[$j][$k]= $_POST["fT".$j.$k];
        }               
    } 
    
    function foo ($arg_1, $arg_2, /* ..., */ $arg_n){
        echo "Exemplo de função.\n";
        return $valor_retornado;
    }
  
