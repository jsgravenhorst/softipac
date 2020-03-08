<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>Login - APA AUTISMO CALI</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.10, minimum-scale=1.0,  maximum-scale=1.0, user-scalable=0">
        <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="js/datatables/jquery.dataTables.min.css" rel="stylesheet">
        <link href="js/datatables/dataTables.fontAwesome.css" rel="stylesheet">
        <link href="js/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="js/chosen/chosen.min.css" rel="stylesheet">
        <link href="js/validation/formValidation.min.css" rel="stylesheet">
        <link href="js/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    
    <body>
        
        <div class="login-page">
            
            <div class="header">
                <div style='display:inline-block;'>
                    <img src='images/ApaLogo.gif'/>
                    <h1>SOFTIPAC</h1>
                </div>
                <h2>Ingrese sus datos de acceso</h2>        
            </div> <!-- header -->
            
            <div class="form-box">            
                <form id="formlogueo" role="form" method='post'  action='' name='datos'>

                    <div id="mensaje" class='form-group'>
						
					</div>
                    
                    <div class="form-group">
						<label>Usuario</label>
						<div class="input-group"> 
    						<input type="text" name="nick" class="form-control">
    						<div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
					</div><!-- .form-group -->
                                        
                    <div class="form-group">
                        <label>Contrase&ntilde;a</label>                        
                        <div class="input-group">                            
                            <input type="password" name="password" class="form-control">                         
                            <div class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </div>                         
                        </div>                                    
                    </div><!-- .form-group -->                    
                    
                    <div class="form-group">
                        <center>                      
                            <input type="submit" name="loguear" value="Ingresar" class="btn btn-blue">
                        </center>
                    </div><!-- .form-group -->  
                    
                </form><!-- .form -->            
            </div> <!-- .form-box -->        
        </div> <!--.login-page -->

        <script src="js/jquery.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/datatables/jquery.dataTables.min.js"></script>
        <script src="js/datatables/dataTables.bootstrap.min.js"></script>
        <script src="js/chosen/chosen.jquery.min.js"></script>
        <script src="js/jquery.form.min.js"></script>
        <script src="js/validation/formValidation.min.js"></script>
        <script src="js/validation/bootstrap.min.js"></script>
        <script src="js/moment.min.js"></script>
        <script src="js/datepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="js/bootbox.min.js"></script>
        <script src="js/jquery.site.js"></script>
        <script src="js/funciones.js"></script>
        
    </body>

</html>