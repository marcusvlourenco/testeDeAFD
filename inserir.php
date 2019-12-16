<?php
  if(isset($_POST['descricaoF'])){
    $alfabeto = $_POST["alfabeto"];
    $estados = $_POST["estados"];
    $estadoI = $_POST["estadoI"];
    $estadosF = $_POST["estadosF"]; 
    $gerou=1;    
    $virgula = array(",");
    $alfabeto1 = str_replace($virgula, "", $alfabeto);
    $estados1 = str_replace($virgula, "", $estados);
    $estadosF1 = str_replace($virgula, "", $estadosF);
    
    
    $alfabetoFinal = str_split($alfabeto1);    
    $estadosFinal = str_split($estados1, 2);
    $estadoIFinal=str_split($estadoI); 
    $estadosFFinal = str_split($estadosF1, 2);
    $vazio="";
    
  }else{
    $gerou=0; 
    $alfabeto="";
    $estados="";
    $estadoI="";
    $estadosF="";
    
    $alfabetoFinal = array();    
    $estadosFinal = array(); 
    $estadoIFinal=array(); 
    $estadosFFinal = array(); 
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Preencha os campos da Descrição Formal</h2>
  <?php
        if($gerou==0){            
    ?>
        <form method="post" action="#" name="descricaoF">
    <?php
        }else{
    ?>
        <form method="post" action="testar.php" name="descricaoF2">
            <input type="hidden" id="alfabetoFinal" name="alfabetoFinal" value="<?php echo $alfabetoFinal; ?>">
            <input type="hidden" id="estadosFinal" name="estadosFinal" value="<?php echo $estadosFinal; ?>">
            <input type="hidden" id="estadoIFinal" name="estadoIFinal" value="<?php echo $estadoIFinal; ?>">
            <input type="hidden" id="estadosFFinal" name="estadosFFinal" value="<?php echo $estadosFFinal; ?>">
                        
    <?php        
        }
    ?> 
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">&Sigma;=</span>
        </div>
        <input type="text" class="form-control" value="<?php echo $alfabeto; ?>" id="alfabeto" placeholder="Digite os símbolos, com a &#34;,&#34; entre eles. Exemplo: a,b,c,d"  name="alfabeto">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="input-group-prepend">
          <span class="input-group-text">E=</span>
        </div>
        <input type="text" class="form-control" id="estados" value="<?php echo $estados; ?>" placeholder="Digite todos os ESTADOS,com a &#34;,&#34; entre eles. Exemplo: S0,S1,S2" name="estados">
    </div>  
      
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">i=</span>
        </div>
        <input type="text" class="form-control" id="estadoI" value="<?php echo $estadoI; ?>" placeholder="Digite o ESTADO INICIAL. Exemplo: S0" name="estadoI">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="input-group-prepend">
          <span class="input-group-text">F=</span>
        </div>
        <input type="text" class="form-control" id="estadosF" value="<?php echo $estadosF; ?>" placeholder="Digite os ESTADOS FINAIS,com a &#34;,&#34; entre eles. Exemplo: S1,S2" name="estadosF">
    </div>
            
      
            
            
            
            
    <?php
        if($gerou==0){            
    ?>
        <button type="submit" class="btn btn-secondary" name="descricaoF">Inserir &delta; (Função de Transição)</button>
    <?php
        }else{
                      
    ?>       
        
        
        
        <table class="table table-bordered">
            <thead>
              <tr>
                  <th>&nbsp;</th>
                  <?php 
                    $quantA=count($alfabetoFinal);
                    $quantE=count($estadosFinal);
                    for($i = 0; $i < $quantA; $i++){
                        echo "<th>".$alfabetoFinal[$i]."</th>";
                    }
                  ?>                
              </tr>
            </thead>
            <tbody>
                <?php 
                    
                    for($j = 0; $j < $quantE; $j++){
                        echo "<tr><td>".$estadosFinal[$j]."</td>";
                        for($k = 0; $k < $quantA; $k++){
                            echo "<td><input type=\"text\" class=\"\" id=\"fT".$j.$k."\" name=\"fT".$j.$k."\"></td>";                            
                        }                        
                        echo "</tr>"; 
                    }                                                                
                ?>                            
            </tbody>
          </table>
        
            <input type="hidden" id="quantA" name="quantA" value="<?php echo $quantA; ?>">
            <input type="hidden" id="quantE" name="quantE" value="<?php echo $quantE; ?>">
        
        
        <button type="submit" class="btn btn-secondary" name="descricaoF">Testar Palavra</button>
    <?php        
        }
    ?> 
  </form>
</div>
</body>
</html>
