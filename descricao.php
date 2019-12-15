<!DOCTYPE html>
<html lang="en">
    <head>
        <title>AFD - Descrição do Trabalho</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <h3 clas="">Trabalho de Linguagens Formais e Autômatos – Autômato Finito Determinístico</h3>
            </br>
            </br>
            <h4 clas="">OBJETIVO</h4>  
            <p>Implementar um algoritmo para o funcionamento de um Autômato Finito Determinístico, e que realize o teste de palavras fornecidas pelo usuário.</p>
            </br>
            <h4 clas="">DESCRIÇÃO</h4>
            <p>O trabalho consiste em implementar um programa que em um primeiro momento leia a descrição formal de uma AFD do usuário, e em seguida teste palavras por ele fornecidas, respondendo se as palavras pertencem ou não à linguagem descrita pelo autômato.</p>
            </br>
            <h4 clas="">IMPLEMENTAÇÃO</h4>
            <p>Uma possível implementação do AFD se daria de modo que a descrição formal do AFD {E, Σ, δ, i, F} é inserida em um programa, e após isso pode se testar uma palavra, e o programa responde se a palavra pertence ou não à linguagem que o AFD reconhece</p>
            </br>
            <p>Início</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;Estado Atual &#60;- Estado Inicial;</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;Para i variar do Símbolo inicial da fita até o símbolo final</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Faça Se Existe δ (Estado Atual, i)</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Então Estado Atual &#60;- δ (Estado Atual, i);</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Senão REJEITA;</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;Se Estado Atual é Final</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Então ACEITA;</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Senão REJEITA;</p>
            <p>Fim.</p>  
        </div>
    </body>
</html>
