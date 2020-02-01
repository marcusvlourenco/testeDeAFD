<?php
    function geraEstados($estados){
        $estadosArray=str_split($estados);
        $tamE=strlen($estados);
        if($tamE<30){//se quantidade de estados for de s0 a s9
            $todosEstados = str_split(str_replace(',', "", $estados), 2);        
        }else{//se maior
            $outputE1 = array_slice($estadosArray, 0, 29);//pega parcela de s0 a s9
            $outputE2 = array_slice($estadosArray, 30, $tamE);//pega resto de $estados
            $outputE3 = implode('', $outputE1);
            $outputE4 = implode('', $outputE2);
            $outputEs1 = str_split(str_replace(',', "", $outputE3), 2);//da primeira parte, retira ',' e cria array de 2 em 2 caracteres
            $outputEs2 = str_split(str_replace(',', "", $outputE4), 3);//da segunda parte, retira ',' e cria array de 3 em 3 caracteres
            $todosEstados=array_merge($outputEs1, $outputEs2);//junta a segunda parte
        }
        return $todosEstados;
    }
    function geraEstadosFinal($estadosF){    
        $estadosFArray=str_split($estadosF);     
        $tamEF=strlen($estadosF);
        if($tamEF<30){//se quantidade de estados for de s0 a s9
            $todosEstadosFinal = str_split(str_replace(',', "", $estadosF), 2);            
        }else{//se maior
            $outputEF1 = array_slice($estadosFArray, 0, 29);//pega parcela de s0 a s9
            $outputEF2 = array_slice($estadosFArray, 30, $tamEF);//pega resto de $estados final
            $outputEF3 = implode('', $outputEF1);
            $outputEF4 = implode('', $outputEF2);
            $outputEsF1 = str_split(str_replace(',', "", $outputEF3), 2);//da primeira parte, retira ',' e cria array de 2 em 2 caracteres
            $outputEsF2 = str_split(str_replace(',', "", $outputEF4), 3);//da segunda parte, retira ',' e cria array de 3 em 3 caracteres
            $todosEstadosFinal=array_merge($outputEsF1, $outputEsF2);//junta a segunda parte
        }
        return $todosEstadosFinal;        
    }
    function testeEntrada($alfabeto,$estados,$estadoI,$estadosF){
        $j=0;
        $tamA=strlen($alfabeto);
        $tamE=strlen($estados);
        $tamI=strlen($estadoI);
        $alfabetoArray=str_split($alfabeto);
        $estadosArray=str_split($estados);
        $estadoIArray=str_split($estadoI);        
        //teste Estado Inicial
        
        if($tamI==2){
            if((!ctype_lower($estadoIArray[0])&&(!ctype_upper($estadoIArray[0])))or((intval($estadoIArray[1])<>0)&&(intval($estadoIArray[1])<>1))or(ctype_lower($estadoIArray[1])or(ctype_upper($estadoIArray[1])))){
                echo "<script>alert('REJEITADO ESTADO INICIAL INSERIDO, O ESTADO INICIAL DEVE TER UM CARACTER COM UM NUMERO JUNTOS!');</script>";//retorna mensagem
                echo "<script>window.history.back()</script>";//retorna para a pagina anterior
            }
        }else{
            echo "<script>alert('REJEITADO ESTADO INICIAL INSERIDO, O ESTADO INICIAL DEVE TER UM CARACTER COM UM NUMERO JUNTOS!');</script>";//retorna mensagem
            echo "<script>window.history.back()</script>";//retorna para a pagina anterior            
        }
        for($i=0;$i<$tamA;$i++){//verifica se alfabeto repete algum simbolo
            if(substr_count($alfabeto, $alfabetoArray[$i])>0){
                echo "<script>alert('REJEITADO ALFABETO INSERIDO, O ALFABETO NÃO DEVE SER REPETIDO!');</script>";//retorna mensagem
                echo "<script>window.history.back()</script>";//retorna para a pagina anterior
                
            }   
            if(($i % 2)==0){
                if(!ctype_lower($alfabetoArray[$i])){//teste se simbolo da palavra é minusculo
                    if(($alfabetoArray[$i]<>'0')&&($alfabetoArray[$i]<>'1')){//se é 1 ou 0
                        echo "<script>alert('REJEITADO ALFABETO INSERIDO, O ALFABETO DEVE SER LETRAS DE A ATÉ Z, MINUSCULAS, INCLUINDO 0 E 1, COM VIRGULA ENTRE CADA SIMBOLO!');</script>";//retorna mensagem
                        echo "<script>window.history.back()</script>";//retorna para a pagina anterior
                    }                    
                }
            }else{
                if($alfabetoArray[$i]<>','){//se tem virgula entre os simbolos
                    echo "<script>alert('REJEITADO ALFABETO INSERIDO, O ALFABETO DEVE SER LETRAS DE A ATÉ Z, MINUSCULAS, INCLUINDO 0 E 1, COM VIRGULA ENTRE CADA SIMBOLO!');</script>";//retorna mensagem
                    echo "<script>window.history.back()</script>";//retorna para a pagina anterior
                }
            }    
        }
        if(($estadosArray[$tamE-1]==',')or(ctype_lower($estadosArray[$tamE-1]))or(ctype_upper($estadosArray[$tamE-1]))){
            echo "<script>alert('REJEITADO ESTADOS INSERIDO, O ESTADO NÃO DEVE TERMINAR EM LETRAS DE A ATÉ Z OU VIRGULA!');</script>";//retorna mensagem
            echo "<script>window.history.back()</script>";//retorna para a pagina anterior
        }
        if((!ctype_lower($estadosArray[0]))&&(!ctype_upper($estadosArray[0]))){//teste se a primeira o simbolo do estado é um caracter alfabetico maiusculo ou minusculo  
            echo "<script>alert('REJEITADO ESTADO(S) INSERIDO(S), O ESTADO DEVE SER LETRAS DE A ATÉ Z, MINUSCULAS OU MAIUSCULAS, COM VIRGULA ENTRE CADA SIMBOLO!');</script>";//retorna mensagem
            echo "<script>window.history.back()</script>";//retorna para a pagina anterior
        } 
        
        if($tamE<30){//para estados de s0 a s9
            for($i=0;$i<$tamE-2;$i+=3){
                $k=$i+1;
                $l=$i+2;
                if(($estadosArray[0]<>$estadosArray[$i])or(intval($estadosArray[$k])<>$j)or($estadosArray[$l]<>',')){//testa se todos os simbolos alfabeticos sao iguais
                   //testa se existe sequencia nos estados, se nao se repetem,
                    //testa se existe separacao de entrada entre os estados
                    echo "<script>alert('REJEITADO ESTADO(S) INSERIDO(S)! \\n OS ESTADOS DEVE SER UMA LETRA DE A ATÉ Z, MINUSCULA OU MAIUSCULA, SEMPRE IGUAIS, ACOMPANHADO DE UM NÚMERO SEQUENCIAL PARA CADA ESTADO!');</script>";//retorna mensagem
                    echo "<script>window.history.back()</script>";//retorna para a pagina anterior
                }        
                $j++;
            }
        }else{
            for($i=0;$i<28;$i+=3){//para os primeiros estados s0, s1, s2, ... , s9
                $k=$i+1;
                $l=$i+2;
                if(($estadosArray[0]<>$estadosArray[$i])or(intval($estadosArray[$k])<>$j)or($estadosArray[$l]<>',')){//testa se todos os simbolos alfabeticos sao iguais
                    //testa se existe sequencia nos estados, se nao se repetem,
                    //testa se existe separacao de entrada entre os estados
                    echo "<script>alert('REJEITADO ESTADO(S) INSERIDO(S)! \\n OS ESTADOS DEVE SER UMA LETRA DE A ATÉ Z, MINUSCULA OU MAIUSCULA, SEMPRE IGUAIS, ACOMPANHADO DE UM NÚMERO SEQUENCIAL PARA CADA ESTADO!');</script>";//retorna mensagem
                    echo "<script>window.history.back()</script>";//retorna para a pagina anterior
                }        
                $j++;
            }
            for($i=30;$i<$tamE-3;$i+=4){//para demais estados iniciando em 30 e irá funcionar até s99, poderia ser testado para s100, mas neste range já é suficiente
                
                $k=$i+1;
                $l=$i+3;
                $m=$k+1;
                $aux=$estadosArray[$k]; 
                $aux.=$estadosArray[$m];//junta os numeros de estado acima de 9, ou seja, 1 e 0=10
                if(($estadosArray[0]<>$estadosArray[$i])or(intval($aux)<>$j)or($estadosArray[$l]<>',')){//testa se todos os simbolos alfabeticos sao iguais
                    //testa se existe sequencia nos estados, se nao se repetem,
                    //testa se existe separacao de entrada entre os estados
                    echo "<script>alert('REJEITADO ESTADO(S) INSERIDO(S)! \\n OS ESTADOS DEVE SER UMA LETRA DE A ATÉ Z, MINUSCULA OU MAIUSCULA, SEMPRE IGUAIS, ACOMPANHADO DE UM NÚMERO SEQUENCIAL PARA CADA ESTADO!');</script>";//retorna mensagem
                    echo "<script>window.history.back()</script>";//retorna para a pagina anterior
                }        
                $j++;
            }
        }           
        $todosEstados=geraEstados($estados);      
        $todosEstadosFinal=geraEstadosFinal($estadosF);
        if (!(in_array($estadoI, $todosEstados))) { //se não encontrar o estado que esta testando dentro dos estados finais
            echo "<script>alert('REJEITADO ESTADO INICIAL INSERIDO, O ESTADO INICIAL NÃO ESTÁ NA LISTA DE ESTADOS!');</script>";//retorna mensagem
            echo "<script>window.history.back()</script>";//retorna para a pagina anterior
        }  
        if(array_diff($todosEstadosFinal, $todosEstados)){
            echo "<script>alert('REJEITADO ESTADO(S) FINAL INSERIDO(S), OS ESTADO(S) FINAL NÃO ESTÁ NA LISTA DE ESTADOS!');</script>";//retorna mensagem
            echo "<script>window.history.back()</script>";//retorna para a pagina anterior
        }   
    }
    
    if(isset($_POST['descricaoF'])){//se a pagina inicia a partir do form enviado, recebe os dados
        $alfabeto = filter_input(INPUT_POST, 'alfabeto');
        $estados = filter_input(INPUT_POST, 'estados');
        $estadoI = filter_input(INPUT_POST, 'estadoI');
        $estadosF = filter_input(INPUT_POST, 'estadosF');
        testeEntrada($alfabeto,$estados,$estadoI,$estadosF);
        $virgula = array(",");
        $estadosFinal=geraEstados($estados);      
        $estadosFFinal=geraEstadosFinal($estadosF);
        $alfabetoFinal = str_split(str_replace($virgula, "", $alfabeto));   
        $estadoIFinal=str_split($estadoI); 
        $gerou=1;    //essa variavel servirá para o form, se gerou for 1, quer dizer que pode mostrar o FT
    }else{//senão, inicia as váriaveis vazias, para o valor dos inputs serem nulos
        $alfabeto="";
        $estados="";
        $estadoI="";
        $estadosF="";        
        $alfabetoFinal = array();
        $estadosFinal = array(); 
        $estadoIFinal=array(); 
        $estadosFFinal = array(); 
        $gerou=0; //variavel que, com valor zero, quer dizer que é a primeira vez que a pagina é chamada
    }
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<title>Bootstrap Example</title>';
    echo '<meta charset="utf-8">';//inicia scrits para melhor design da pagina
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<link href="arquivos/css/bootstrap.css" rel="stylesheet" type="text/css"/>';
    echo '<script src="arquivos/js/bootstrap.min.js" type="text/javascript"></script>';
    echo '<script src="arquivos/js/jquery.min.js" type="text/javascript"></script>';
    echo '<script src="arquivos/js/popper.min.js" type="text/javascript"></script>';
    echo '</head>';
    echo '<body>';
    echo '<div class="container">';
    if($gerou==0){            //primeira vez que pagina é iniciada
        echo '<h2>Preencha os campos da Descrição Formal</h2>';
        echo '<form method="post" action="#" name="descricaoF">';//o form irá enviar inputs para a mesma pagina
        echo '<div class="input-group mb-3">';
        echo '<div class="input-group-prepend">';
        echo '<span class="input-group-text">&Sigma;=</span>';
        echo '</div>';
        echo '<input type="text" class="form-control" value="" id="alfabeto" placeholder="Digite os símbolos, com &#34;,&#34; entre eles. Exemplo: a,b,c,d"  name="alfabeto">';
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<div class="input-group-prepend">';
        echo '<span class="input-group-text">E=</span>';
        echo '</div>';
        echo '<input type="text" class="form-control" id="estados" value="" placeholder="Digite os ESTADOS, com &#34;,&#34; entre eles. Ex: S0,S1,S2" name="estados">';
        echo '</div>';
        echo '<div class="input-group mb-3">';
        echo '<div class="input-group-prepend">';
        echo '<span class="input-group-text">i=</span>';
        echo '</div>';
        echo '<input type="text" class="form-control" id="estadoI" value="" placeholder="Digite o ESTADO INICIAL. Exemplo: S0" name="estadoI">';
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<div class="input-group-prepend">';
        echo '<span class="input-group-text">F=</span>';
        echo '</div>';
        echo '<input type="text" class="form-control" id="estadosF" value="" placeholder="Digite os ESTADOS FINAIS, com &#34;,&#34; entre eles. Ex: S1,S2" name="estadosF">';
        echo '</div>';
        echo '<button type="submit" class="btn btn-secondary" name="descricaoF">Inserir &delta; (Função de Transição)</button>';//botão de envio do form para inserir o FT
    }else{
        echo '<h2>Preencha os campos da Função de Transição</h2>';
        echo '<form method="post" action="testar.php" name="descricaoF">';//o form enviará os inputs para a pagina de teste
        echo '<input type="hidden" id="alfabetoFinal" name="alfabetoFinal" value="'.$alfabeto.'">';//valores das variaveis
        echo '<input type="hidden" id="estadosFinal" name="estadosFinal" value="'.$estados.'">';
        echo '<input type="hidden" id="estadoIFinal" name="estadoIFinal" value="'.$estadoI.'">';
        echo '<input type="hidden" id="estadosFFinal" name="estadosFFinal" value="'.$estadosF.'">';
        echo '<div class="input-group mb-3">';
        echo '<div class="input-group-prepend">';
        echo '<span class="input-group-text">&Sigma;=</span>';
        echo '</div>';
        echo '<input type="text" class="form-control" value="'.$alfabeto.'" id="alfabeto" readonly="readonly" name="alfabeto">';
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<div class="input-group-prepend">';
        echo '<span class="input-group-text">E=</span>';
        echo '</div>';
        echo '<input type="text" class="form-control" id="estados" value="'.$estados.'" readonly="readonly" name="estados">';
        echo '</div>';
        echo '<div class="input-group mb-3">';
        echo '<div class="input-group-prepend">';
        echo '<span class="input-group-text">i=</span>';
        echo '</div>';
        echo '<input type="text" class="form-control" id="estadoI" value="'.$estadoI.'" readonly="readonly" name="estadoI">';
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<div class="input-group-prepend">';
        echo '<span class="input-group-text">F=</span>';
        echo '</div>';
        echo '<input type="text" class="form-control" id="estadosF" value="'.$estadosF.'" readonly="readonly" name="estadosF">';
        echo '</div>';     
        echo '<table class="table table-bordered">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>&delta;</th>';    
        $quantidadeSimbolosAlfabeto=count($alfabetoFinal);
        $quantidadeEstados=count($estadosFinal);
        for($i = 0; $i < $quantidadeSimbolosAlfabeto; $i++){
            echo '<th>'.$alfabetoFinal[$i].'</th>';
        }
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        for($j = 0; $j < $quantidadeEstados; $j++){
            echo '<tr><td>'.$estadosFinal[$j].'</td>';
            for($k = 0; $k < $quantidadeSimbolosAlfabeto; $k++){
                echo '<td><input type="text" class="" id="fT'.$j.$k.'" name="fT'.$j.$k.'"></td>';                            
            }                        
            echo '</tr>'; 
        }
        echo '</tbody>';
        echo '</table>';
        echo '<button type="submit" class="btn btn-secondary" name="descricaoF">Inserir Palavra</button>';
    }
    echo '</form>';
    echo '</div>';
    echo '</body>';
    echo '</html>';