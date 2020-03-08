$(document).ready(function(){
    
    $("#formlogueo").on("submit", function(event){
        event.preventDefault();
        var cadenalogueo = $(this).serializeArray();
        
        $.ajax({
            url:"mod_aplicacion/admin_validaingreso.php",
            type:"post",
            data:{nick:cadenalogueo[0].value, password:cadenalogueo[1].value}
        }).done(function(data){
            if(data == "success"){
                $(location).attr('href','views/panel.php');
            }else{
                $("#mensaje").html("<div class='alert alert-danger'>Usuario o Contrase&ntilde;a incorrectos</div>");
            }
        });
        
    });
    
    $("#form_Usuario").on("submit", function(event){
        
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("form_Usuario"));
        
        $.ajax({
            url:"../mod_aplicacion/admin_usuarios_nuevo.php",
            type:"post",
            dataType: "html",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){$('.cargando').show();},
        }).done(function(data){
            if(data == "success"){
                $('.cargando').hide();
                $('#modal_exito').modal('show');
                $(location).attr('href','usuario.php');
            }else{
                $('.cargando').hide();
                $('#modal_error').modal('show');
            }
        });
    });
    
    
    $("#form_UsuarioMod").on("submit", function(event){
        
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("form_UsuarioMod"));
        formData.append("opcion", "actualizar");
        $.ajax({
            url:"../mod_aplicacion/admin_usuarios.php",
            type:"post",
            dataType: "html",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){$('.cargando').show();},
        }).done(function(data){
            if(data){
                $('.cargando').hide();
                $('#modal_exito').modal('show');
                $(location).attr('href','usuario_listado.php');
            }else{
                $('.cargando').hide();
                $('#modal_error').modal('show');
            }
        });
    });
    
    
    //inserta los registros de la Agenda
    $("#form_Agenda").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var idcita = $("#idcita").val();
        var formData = new FormData(document.getElementById("form_Agenda"));
        if(idcita !== ""){
            formData.append("opcion", "actualizar");
        }else{
            formData.append("opcion", "insertar");
        }
        
        $.ajax({
            url:"../mod_aplicacion/admin_agenda.php",
            type:"post",
            dataType: "html",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){$('.cargando').show();},
        }).done(function(data){
            if(data == "success"){
                $('.cargando').hide();
                $('#modal_exito').modal('show');
                if(idcita != "" ) {
                    $(location).attr('href','agenda_listado.php');
                }else
                {
                    $(location).attr('href','agenda.php');
                }

            }else{
                $('.cargando').hide();
                $('#modal_error').modal('show');
            }
        });
    });

    //inserta los registros de la Cita de Informacion
    $("#form_Cita").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var idtipocita = $("#idtipocita").val();
        var formData = new FormData(document.getElementById("form_Cita"));
        var agenda = 1;
        //formData.append("opcion", "insertar");
        if( idtipocita === "" ){
            formData.append("opcion", "insertar");
            //alert("insertando cita");
        }else{
            formData.append("opcion", "actualizar");
        }
        $.ajax({
            url:"../mod_aplicacion/admin_citainformacion.php",
            type:"post",
            dataType: "html",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){$('.cargando').show();},
        }).done(function(data){
            if(data == "success"){
                $('.cargando').hide();
                $('#modal_exito').modal('show');
                if(idtipocita == agenda ){
                    $(location).attr('href','agenda_listado.php');
                }else{
                    $(location).attr('href','citasinformacion_listado.php');
                }
            }else{
                $('.cargando').hide();
                $('#modal_error').modal('show');
            }
        });
    });
    
    $('#fechaCitaIni').change(function(){ //Obtiene las horas disponibles de acuerdo a la fecha seleccionada
        var fechacita = $('#fechaCitaIni').val();
        $.post("../mod_aplicacion/cargarHoras.php", { fechacita: fechacita }, function(data){
            $("#horacita").html(data);
        });
    });
    
    $("#actualizausu").on("submit",function(event){
       
        event.preventDefault(); //neutralizar el formulario
        var cadenaUpusu=$(this).serializeArray();  //trae todos los valores del html
        
        $.ajax({
            url:"mod_aplicacion/usuarios.php",
            type:"post",
            data:{opcion:"actualizar",idusuario:cadenaUpusu[0].value, nombres:cadenaUpusu[1].value, apellidos:cadenaUpusu[2].value, usuario:cadenaUpusu[3].value, password:cadenaUpusu[4].value},
        }).done(function(data){
            if(data == "success"){
                $("#mensajeupdate").html("<div class='form-group'><div class='alert alert-success'>Los datos han sido actualizados con &eacute;xito</div></div>");
            }else{
                $("#mensajeupdate").html("<div class='alert alert-warning'>Se present&oacute; un error al actualizar los datos</div>");
            }
        });
    });
    
});

    function cargarDatos(){
        $.post("../mod_aplicacion/cargarListasAgenda.php",function(data){
            for(var i in data){
                if(i == 0){
                    $.each(data[i], function( key, value ) {
                        var opt = "<option value='"+value.id+"'>"+value.nombre+"</option>";
                        $("#pacienteIdTipoDocumento").append(opt);
                    });
                }
                if(i == 1){
                    $.each(data[i], function( key, value ) {
                        var opt = "<option value='"+value.id+"'>"+value.nombre+"</option>";
                        $("#pacienteIdGenero").append(opt);
                    });
                }
                if(i == 2){
                    $.each(data[i], function( key, value ) {
                        var opt = "<option value='"+value.id+"'>"+value.nombre+"</option>";
                        $("#pacienteIdEscolaridad").append(opt);
                    });
                }
                if(i == 4){
                    $.each(data[i], function( key, value ) {
                        var opt = "<option value='"+value.id+"'>"+value.nombre+"</option>";
                        if(value.id != 1 && value.id != 2){
                            $("#acudienteIdTipoDocumento").append(opt);
                            $("#madreIdTipoDocumento").append(opt);
                            $("#padreIdTipoDocumento").append(opt);
                        }
                    });
                }
                if(i == 5){
                    $.each(data[i], function( key, value ) {
                        var opt = "<option value='"+value.id+"'>"+value.nombre+"</option>";
                        if(value.id != 1){
                            $("#acudienteIdParentesco").append(opt);
                        }
                    });
                }
                if(i == 6){
                    $.each(data[i], function( key, value ) {
                        var opt = "<option value='"+value.id+"'>"+value.nombre+"</option>";
                        if(value.id != 1 && value.id != 4){
                            $("#acudienteIdEscolaridad").append(opt);
                            $("#madreIdEscolaridad").append(opt);
                            $("#padreIdEscolaridad").append(opt);
                        }
                    });
                }
            }
        },'json');
    }
    
    function subirArchivos(directorio){
        $("#modal_SubirArchivos").modal("show");
        $("#carpeta").val(directorio);
    }
    
    function eliminarArchivos(idanexo){
        $("#modal_confirm_del").modal("show");
        $("#textorespuesta").html("&Eacute;sta operaci&oacute;n eliminar&aacute; el archivo ");
        $("#modal-btn-si").on("click", function(){
            $("#modal_confirm_del").modal('hide');
            $.post("../mod_aplicacion/admin_archivo_eliminar.php",{idanexo:idanexo},function(data){
                if(data == "success"){
                    $("#modal_exito").modal('show');
                    $("#modal_listArchivos").modal('hide');
                }else{
                    $("#mensaje").html("<div class='alert alert-danger'>Error al eliminar el Archivo</div>");
                }
            });
        });
        $("#modal-btn-no").on("click", function(){
            $("#modal_confirm_del").modal('hide');
        });
    }
    
    function cargarListArchivos(idusuario){
        $.post("../mod_aplicacion/admin_cargar_listArchivos.php",{idusuario:idusuario},function(data){
            $("#listArchivos").html(data);
        });
    }

    function programarEvaluacion(idpaciente, nombres)
    {
        $("#idpacienteprogramacion").val(idpaciente);
        $("#pacienteprogramacion").text(nombres);
        $('#modal_ProgramEvaluacion').modal('show');
    }
    
    
    function cancelarCita(tipocita_idtipocita,idcita)
    {
        var ruta;

        if(tipocita_idtipocita == 1)
        {
            ruta = "../mod_aplicacion/admin_agenda.php";
        }else
        {
            ruta = "../mod_aplicacion/admin_citainformacion.php";
        }

        if (confirm("Confirma cancelar la cita ? "))
        {
            $.post(ruta,{opcion:"cancelar",idcita:idcita},function(data)
            {
                if(data == "success")
                {
                    $('#modal_exito').modal('show');
                    $(location).attr('href','agenda_listado.php');
                }else
                {
                    $('#modal_error').modal('show');
                }
            });
        }
    }
    
    function editarCita(idpaciente, idcita, idtipocita) {
        $.post("../mod_aplicacion/admin_agenda.php",{opcion:"consultar", idpaciente:idpaciente, idcita:idcita},function(data){
            for (var i in data)
            {
                datos = data[i];
                $("#fechaCitaIni").val(datos.fecha);
                $("#horacita").html("<option value='"+datos.idhora+"'>"+datos.hora+"</option>");
                $("#pacienteIdDocumento").val(datos.pacienteIdDocumento);
                $("#pacienteIdUsuario").val(datos.pacienteIdUsuario);
                $("#pacienteIdParentesco").val(datos.pacienteIdParentesco);
                $("#pacienteIdTipoDocumento").html("<option value='"+datos.pacienteIdTipoDocumento+"'>"+datos.pacienteTipoDocumento+"</option>");
                $("#pacienteDocumento").val(datos.pacienteDocumento);
                $("#pacienteNombres").val(datos.pacienteNombres);
                $("#pacientePrimerApellido").val(datos.pacientePrimerApellido);
                $("#pacienteSegundoApellido").val(datos.pacienteSegundoApellido);
                $("#pacienteFechaNacimiento").val(datos.pacienteFechaNacimiento);
                $("#pacienteEdad").val(datos.pacienteEdad);
                $("#pacienteMeses").val(datos.pacienteMeses);
                $("#pacienteIdGenero").html("<option value='"+datos.pacienteIdGenero+"'>"+datos.genero+"</option>");
                $("#pacienteIdEscolaridad").html("<option value='"+datos.pacienteIdEscolaridad+"'>"+datos.pacienteEscolaridad+"</option>");
                $("#pacienteTutela").html("<option value='"+datos.pacienteTutela+"'>"+datos.pacienteTutela+"</option>");
                //$("#pacienteIdEps").html("<option value='"+datos.pacienteIdEps+"'>"+datos.pacienteEps+"</option>");
                $("#pacienteIdEps").val(datos.pacienteIdEps);
                $("#pacienteEps").val(datos.pacienteEps);
                $("#diagnosticos").val(datos.diagnosticos);
                $("#acudienteIdTipoDocumento").html("<option value='"+datos.acudienteIdTipoDocumento+"'>"+datos.acudienteTipoDocumento+"</option>");
                $("#acudienteIdDocumento").val(datos.acudienteIdDocumento);
                $("#acudienteIdUsuario").val(datos.acudienteIdUsuario);
                $("#acudienteDocumento").val(datos.acudienteDocumento);
                $("#acudienteIdParentesco").html("<option value='"+datos.acudienteIdParentesco+"'>"+datos.acudienteParentesco+"</option>");
                $("#acudienteNombres").val(datos.acudienteNombres);
                $("#acudientePrimerApellido").val(datos.acudientePrimerApellido);
                $("#acudienteSegundoApellido").val(datos.acudienteSegundoApellido);
                $("#acudienteEdad").val(datos.acudienteEdad);
                $("#acudienteIdEscolaridad").html("<option value='"+datos.acudienteIdEscolaridad+"'>"+datos.acudienteEscolaridad+"</option>");
                $("#acudienteOcupacion").val(datos.acudienteOcupacion);
                $("#acudienteDireccion").val(datos.acudienteDireccion);
                $("#acudienteTelefonoFijo").val(datos.acudienteTelefonoFijo);
                $("#acudienteTelefonoCelular").val(datos.acudienteTelefonoCelular);
                $("#acudienteEmail").val(datos.acudienteEmail);
                $("#observacion").val(datos.observacion);

                cargaHora(datos.fecha);
            }
                
        },'json');
    }
    
    function editarCitaInformacion(idpaciente, idcita, idtipocita) {
        var agenda = 1;
        var padre = 2;
        var madre = 3;
        $.post("../mod_aplicacion/admin_citainformacion.php",{opcion:"consultar", idpaciente:idpaciente, idcita:idcita, idtipocita:idtipocita},function(data){
            for (var i in data)
            {
                datos = data[i];
                $("#fechaCitaIni").val(datos.fecha);
                $("#horacita").html("<option value='"+datos.idhora+"'>"+datos.hora+"</option>");
                if(idtipocita != agenda){
                    $("#aplica").val(datos.nombre_aplicador);
                }
                $("#pacienteIdDocumento").val(datos.pacienteIdDocumento);
                $("#pacienteIdUsuario").val(datos.pacienteIdUsuario);
                $("#pacienteIdParentesco").val(datos.pacienteIdParentesco);
                $("#pacienteIdTipoDocumento").html("<option value='"+datos.pacienteIdTipoDocumento+"'>"+datos.pacienteTipoDocumento+"</option>");
                $("#pacienteDocumento").val(datos.pacienteDocumento);
                $("#pacienteNombres").val(datos.pacienteNombres);
                $("#pacientePrimerApellido").val(datos.pacientePrimerApellido);
                $("#pacienteSegundoApellido").val(datos.pacienteSegundoApellido);
                $("#pacienteFechaNacimiento").val(datos.pacienteFechaNacimiento);
                $("#pacienteEdad").val(datos.pacienteEdad);
                $("#pacienteMeses").val(datos.pacienteMeses);
                $("#pacienteIdGenero").html("<option value='"+datos.pacienteIdGenero+"'>"+datos.genero+"</option>");
                $("#pacienteIdEscolaridad").html("<option value='"+datos.pacienteIdEscolaridad+"'>"+datos.pacienteEscolaridad+"</option>");
                $("#pacienteTutela").html("<option value='"+datos.pacienteTutela+"'>"+datos.pacienteTutela+"</option>");
                //$("#pacienteIdEps").html("<option value='"+datos.pacienteIdEps+"'>"+datos.pacienteEps+"</option>");
                $("#pacienteIdEps").val(datos.pacienteIdEps);
                $("#pacienteEps").val(datos.pacienteEps);
                $("#diagnosticos").val(datos.diagnosticos);
                $("#remitido").val(datos.remitido);
                $("#acudienteIdTipoDocumento").html("<option value='"+datos.acudienteIdTipoDocumento+"'>"+datos.acudienteTipoDocumento+"</option>");
                $("#acudienteIdDocumento").val(datos.acudienteIdDocumento);
                $("#acudienteIdTipoUsuario").val(datos.acudienteIdTipoUsuario);
                $("#acudienteIdUsuario").val(datos.acudienteIdUsuario);
                $("#acudienteDocumento").val(datos.acudienteDocumento);
                $("#acudienteIdParentesco").html("<option value='"+datos.acudienteIdParentesco+"'>"+datos.acudienteParentesco+"</option>");
                $("#acudienteNombres").val(datos.acudienteNombres);
                $("#acudientePrimerApellido").val(datos.acudientePrimerApellido);
                $("#acudienteSegundoApellido").val(datos.acudienteSegundoApellido);
                $("#acudienteEdad").val(datos.acudienteEdad);
                $("#acudienteIdEscolaridad").html("<option value='"+datos.acudienteIdEscolaridad+"'>"+datos.acudienteEscolaridad+"</option>");
                $("#acudienteOcupacion").val(datos.acudienteOcupacion);
                $("#acudienteDireccion").val(datos.acudienteDireccion);
                $("#acudienteTelefonoFijo").val(datos.acudienteTelefonoFijo);
                $("#acudienteTelefonoCelular").val(datos.acudienteTelefonoCelular);
                $("#acudienteEmail").val(datos.acudienteEmail);
                $("#motivoConsulta").val(datos.motivoconsulta);
                $("#diagnosticos").val(datos.diagnosticos);
                $("#remitido").val(datos.remitido);
                $("#expectativas").val(datos.expectativas);
                $("#recomTenerCta").val(datos.recomtenercta);
                $("#inFoGral").val(datos.infogral);
                
                if(datos.padreIdUsuario > 0){
                    $("#padreIdTipoDocumento").html("<option value='"+datos.padreIdTipoDocumento+"'>"+datos.padreTipoDocumento+"</option>");
                    $("#padreIdDocumento").val(datos.padreIdDocumento);
                    $("#padreDocumento").val(datos.padreDocumento);
                    $("#padreIdTipoUsuario").val(datos.padreIdTipoUsuario);
                    $("#padreIdUsuario").val(datos.padreIdUsuario);
                    $("#padreNombres").val(datos.padreNombres);
                    $("#padrePrimerApellido").val(datos.padrePrimerApellido);
                    $("#padreSegundoApellido").val(datos.padreSegundoApellido);
                    $("#padreEdad").val(datos.padreEdad);
                    $("#padreIdEscolaridad").html("<option value='"+datos.padreIdEscolaridad+"'>"+datos.padreEscolaridad+"</option>");
                    $("#padreOcupacion").val(datos.padreOcupacion);
                    $("#padreDireccion").val(datos.padreDireccion);
                    $("#padreTelefonoFijo").val(datos.padreTelefonoFijo);
                    $("#padreTelefonoCelular").val(datos.padreTelefonoCelular);
                    $("#padreEmail").val(datos.padreEmail);
                }
                    
                if(datos.madreIdUsuario > 0){
                    $("#madreIdTipoDocumento").html("<option value='"+datos.madreIdTipoDocumento+"'>"+datos.madreTipoDocumento+"</option>");
                    $("#madreIdDocumento").val(datos.madreIdDocumento);
                    $("#madreDocumento").val(datos.madreDocumento);
                    $("#madreIdTipoUsuario").val(datos.madreIdTipoUsuario);
                    $("#madreIdUsuario").val(datos.madreIdUsuario);
                    $("#madreNombres").val(datos.madreNombres);
                    $("#madrePrimerApellido").val(datos.madrePrimerApellido);
                    $("#madreSegundoApellido").val(datos.madreSegundoApellido);
                    $("#madreEdad").val(datos.madreEdad);
                    $("#madreIdEscolaridad").html("<option value='"+datos.madreIdEscolaridad+"'>"+datos.madreEscolaridad+"</option>");
                    $("#madreOcupacion").val(datos.madreOcupacion);
                    $("#madreDireccion").val(datos.madreDireccion);
                    $("#madreTelefonoFijo").val(datos.madreTelefonoFijo);
                    $("#madreTelefonoCelular").val(datos.madreTelefonoCelular);
                    $("#madreEmail").val(datos.madreEmail);
                }
            }
                
        },'json');
    }
    
    function cargaHora(fechacita){ //Obtiene las horas disponibles de acuerdo a la fecha seleccionada
        $.post("../mod_aplicacion/cargarHoras.php", { fechacita: fechacita }, function(data){
            $("#horacita").append(data);
        });
    }
    
    function subirImagenes(idprod, folder){
        $(location).attr('href','imagenes.php?idprod='+idprod+'&folder='+folder+'');
    }

    function cargarUsuarios(){
        $.post("../mod_aplicacion/admin_usuarios.php",{opcion:"consulta"},function(data){
           $("#usuario-table").html(data); 
        });
    }
    
    function cargarUsuariosMod(idusuario) {
        $.post("../mod_aplicacion/usuarios.php",{opcion:idusuario},function(data){
            $("#usuariocon").html(data);
        });
    }
