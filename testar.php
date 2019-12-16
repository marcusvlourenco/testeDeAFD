<?php         

        $alf = $_POST["alfabeto"];
        $ests = $_POST["estados"];
        $estI = $_POST["estadoI"];
        $estsF = $_POST["estadosF"]; 
        $quantA=$_POST["quantA"];
        $quantE=$_POST["quantE"];           
        for($j = 0; $j < $quantE; $j++){
            for($k = 0; $k < $quantA; $k++){               
                $fT[$j][$k]= $_POST["fT".$j.$k];
            }               
        } 
    
    $virgula = array(",");
    $alfabeto1 = str_replace($virgula, "", $alf);
    $estados1 = str_replace($virgula, "", $ests);
    $estadosF1 = str_replace($virgula, "", $estsF);    
    $alfabeto = str_split($alfabeto1);    
    $estados = str_split($estados1, 2);
    $estadoI=str_split($estI); 
    $estadosF = str_split($estadosF1, 2);
    if(isset($_POST['testePalavra'])){
        $palav = $_POST["palavra"];   
        
        $palavra=str_split($palav);  
        testeAFD($alfabeto, $estadoI, $estadosF, $palavra, $fT, $quantA);
    }   
        
    function testeAFD ($alfabeto, $estadoI, $estadosF, $palavra, $fT, $quantA){
        $estadoAtual=$estadoI;       
        $i=0;
        $j=0;
        $m=0;
        $p=0;
        $vazio="";
        $simboloAtual=$palavra[$m];    
        $quantP=count($palavra);   
        $quantEF=count($estadosF);                   
        $status=2;      
        for($n=0;$n<$quantA;$n++){
            for($o=0;$o<$quantP;$o++){
                if($alfabeto[$n]==$palavra[$o]){
                    $p=$p+1;                 
                }
            }                
        }if($quantP!=$p){
            echo "<script>alert('REJEITA');</script>";
        }else{        
            while($status==2){
                $j= (int)$estadoAtual[1];//transforma valor do estado em numérico para posição FT eixo x            
                for($k=0;$k<$quantA;$k++){//loop para capturar posição do simbolo
                    if($alfabeto[$k]==$simboloAtual){//teste entre os simbolos
                        $i= $k;//captura valor para posição FT eixo y                    
                    } 
                }
                $estadoMatriz=$fT[$j][$i];//captura estado da posicao do estado X simbolo                   
                if(($estadoMatriz == $vazio)||($palavra[$m] == $vazio)){//teste verifica se é vazio, sem transição
                    echo "<script>alert('REJEITA');</script>";
                    $status=0;//retorna para REJEITAR
                }else if(($simboloAtual==$palavra[$quantP-1])){//se for último simbolo da palavra     

                    for($l=0;$l<$quantEF;$l++){//loop para buscar se é um dos estados finais
                        if(($estadosF[$l]==$estadoAtual)||($estadoMatriz==$estadosF[$l])){//se for estado final
                            echo "<script>alert('ACEITA');</script>";
                            $status=1;//retorna para ACEITAR              
                        }else{
                            echo "<script>alert('REJEITA');</script>";
                            $status=0;//retorna para REJEITAR
                        }                    
                    }                
                }else{                
                    $estadoAtual=$estadoMatriz;//se nenhuma das opções, recebe próximo estado
                    $m=$m+1;                  
                    $simboloAtual=$palavra[$m];                
                }  
            }         
        }   
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Teste de Palavra</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Teste de Palavra</h2>
  
  <form method="post" action="#" name="testePalavra">
        <input type="hidden" id="alfabeto" name="alfabeto" value="<?php echo $alf; ?>">
            <input type="hidden" id="estados" name="estados" value="<?php echo $ests; ?>">
            <input type="hidden" id="estadoI" name="estadoI" value="<?php echo $estI; ?>">
            <input type="hidden" id="estadosF" name="estadosF" value="<?php echo $estsF; ?>">
            <input type="hidden" id="quantA" name="quantA" value="<?php echo $quantA; ?>">
            <input type="hidden" id="quantE" name="quantE" value="<?php echo $quantE; ?>">
            <input type="hidden" id="quantE" name="quantE" value="<?php echo $quantE; ?>">
                    
                    
                <?php 
                    
                    for($j = 0; $j < $quantE; $j++){
                        for($k = 0; $k < $quantA; $k++){
                            echo "<input type='hidden' value='".$fT[$j][$k]."' id='fT".$j.$k."' name='fT".$j.$k."'>";                            
                        }           
                    }                                                                
                ?> 
    
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Palavra = </span>
        </div>
        <input type="text" class="form-control" id="palavra" placeholder="Digite a palavra, de acordo com a Descrição Formal. Exemplo: aabbc"  name="palavra">
        
        <button type="submit" class="btn btn-secondary" name="testePalavra">Testar Palavra</button>
         
  </form>
</div>
</body>
</html>

     
