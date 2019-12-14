<html>
    <head>
        <title>Leitura da descrição formal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="Tue, 01 Jan 2030 1:00:00 GMT" />
        <meta http-equiv="pragma" content="no-cache" />
    </head>
    <body>
        <div class="container">
            <div class="form-group">
                <div class="col-md-12" id="demoContainer" style="height: auto">
                    <form id="signupForm" method="post" class="form-horizontal" action="gravaficha.php"  onsubmit="return valida(this);" autocomplete="off">
                        <h1 class="text-center">Inscri&ccedil;&atilde;o</h1><br>
                        <div class="form-group">
                            <input name="ts" type="hidden" id="ts" value="<?php echo microtime();?>" />
                            <label class="col-md-5 control-label">Nome:</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="nome" placeholder="" maxlength="50"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5 control-label">Sobrenome:</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="sobrenome" placeholder="" maxlength="50"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5 control-label">Ano de Nascimento:</label>
                            <div class="col-md-2 center-block">
                                <input type="text" class="form-control" name="anonasc" style="text-align: center;" maxlength="4"  />
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="col-md-5 control-label">Sexo:</label>
                            <div class="col-md-4">
                                <div class="radio">
                                    <label  class="col-md-6">
                                        <input type="radio" name="sexo" value="M" /> Masculino
                                    </label>
                                    <label class="col-md-3">
                                        <input type="radio" name="sexo" value="F" /> Feminino
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5 control-label">Endere&ccedil;o de E-mail:</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="email" maxlength="50"/>
                            </div>
                        </div>                     
                        <div class="form-group">
                            <label class="col-md-5 control-label">Cidade onde reside:</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="cidade" maxlength="50" />
                            </div>
                        </div>
                        
                        <br>
                        <div class="form-group">
                            <div class=" text-center">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Confirmar Inscri&ccedil;&atilde;o</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
