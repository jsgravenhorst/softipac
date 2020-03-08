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
                $(location).attr('href','agenda.php');
            }else{
                $('.cargando').hide();
                $('#modal_error').modal('show');
            }
        });
    });

    //inserta los registros de la Cita de Informacion
    $("#form_Cita").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("form_Cita"));
        formData.append("opcion", "insertar");
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
                $(location).attr('href','agenda.php');
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
            /*for (var i in data)
            {
                datos = data[i];
                var opt = "<option value='"+datos.idtipodocumento+"'>"+datos.nombre+"</option>";
                $("#pacienteIdTipoDocumento").append(opt);
            }*/
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
                if(i == 3){
                    $.each(data[i], function( key, value ) {
                        var opt = "<option value='"+value.id+"'>"+value.nombre+"</option>";
                        $("#pacienteIdEps").append(opt);
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
                $("#pacienteIdEps").html("<option value='"+datos.pacienteIdEps+"'>"+datos.pacienteEps+"</option>");
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
                
                //Si está consultando la cita de información desde el listado de agenda y el acudiente es el padre
                if(idtipocita == 1 && datos.acudienteIdParentesco == 2){
                    $("#padreIdTipoDocumento").html("<option value='"+datos.acudienteIdTipoDocumento+"'>"+datos.acudienteTipoDocumento+"</option>");
                    $("#padreDocumento").val(datos.acudienteDocumento);
                    $("#padreNombres").val(datos.acudienteNombres);
                    $("#padrePrimerApellido").val(datos.acudientePrimerApellido);
                    $("#padreSegundoApellido").val(datos.acudienteSegundoApellido);
                    $("#padreEdad").val(datos.acudienteEdad);
                    $("#padreIdEscolaridad").html("<option value='"+datos.acudienteIdEscolaridad+"'>"+datos.acudienteEscolaridad+"</option>");
                    $("#padreOcupacion").val(datos.acudienteOcupacion);
                    $("#padreDireccion").val(datos.acudienteDireccion);
                    $("#padreTelefonoFijo").val(datos.acudienteTelefonoFijo);
                    $("#padreTelefonoCelular").val(datos.acudienteTelefonoCelular);
                    $("#padreEmail").val(datos.acudienteEmail);
                }
                
                //Si está consultando la cita de información desde el listado de agenda y el acudiente es la madre
                if(idtipocita == 1 && datos.acudienteIdParentesco == 3){
                    $("#madreIdTipoDocumento").html("<option value='"+datos.acudienteIdTipoDocumento+"'>"+datos.acudienteTipoDocumento+"</option>");
                    $("#madreDocumento").val(datos.acudienteDocumento);
                    $("#madreNombres").val(datos.acudienteNombres);
                    $("#madrePrimerApellido").val(datos.acudientePrimerApellido);
                    $("#madreSegundoApellido").val(datos.acudienteSegundoApellido);
                    $("#madreEdad").val(datos.acudienteEdad);
                    $("#madreIdEscolaridad").html("<option value='"+datos.acudienteIdEscolaridad+"'>"+datos.acudienteEscolaridad+"</option>");
                    $("#madreOcupacion").val(datos.acudienteOcupacion);
                    $("#madreDireccion").val(datos.acudienteDireccion);
                    $("#madreTelefonoFijo").val(datos.acudienteTelefonoFijo);
                    $("#madreTelefonoCelular").val(datos.acudienteTelefonoCelular);
                    $("#madreEmail").val(datos.acudienteEmail);
                }

                cargaHora(datos.fecha);
            }
                
        },'json');
    }
    
    function cargaHora(fechacita){ //Obtiene las horas disponibles de acuerdo a la fecha seleccionada
        $.post("../mod_aplicacion/cargarHoras.php", { fechacita: fechacita }, function(data){
            $("#horacita").append(data);
        });
    }

    function cargarCategoria() {
        $.post("mod_aplicacion/categoria.php",{opcion:"consulta"},function(data){
            $("#authors-table").html(data);
        });
    }
    
    function cargarCategoriaMod(idicatidioma) {
        $.post("mod_aplicacion/categoria.php",{opcion:idicatidioma},function(data){
            $("#categoriacon").html(data);
        });
    }
    
    function cargarSubCategoria(){
        $.post("mod_aplicacion/subcategoria.php",{opcion:"consulta"},function(data){
           $("#subcat-table").html(data); 
        });
    }
    
    function cargarSubCategoriaMod(idicatidioma) {
        $.post("mod_aplicacion/subcategoria.php",{opcion:idicatidioma},function(data){
            $("#subcategoriacon").html(data);
        });
    }
    
    function cargarProductos(){
        $.post("mod_aplicacion/productos.php",{opcion:"consulta"},function(data){
           $("#producto-table").html(data); 
        });
    }
    
    function cargarProductosMod(idprodidioma) {
        $.post("mod_aplicacion/productos.php",{opcion:"modificacion",idprodidioma:idprodidioma},function(data){
            $("#productocon").html(data);
        });
    }
    
    function eliminarProducto(idprod) {
        if (confirm("Desea eliminar este registro? ")){
            $.post("mod_aplicacion/productos.php",{opcion:"eliminar",idprod:idprod},function(data){
                if(data == "success"){
                    $("#mensajeproducto").html("<div class='alert alert-success'>Producto eliminado con &eacute;xito</div>");
                    $(location).attr('href','productos.php');
                }else{
                    $("#mensajeproducto").html("<div class='alert alert-danger'>Error al eliminar el producto</div>");
                }
            });
        }
    }
    
    function cargarImgProductos(){
        $.post("mod_aplicacion/productos.php",{opcion:"consultalist"},function(data){
           $("#imgproducto-table").html(data); 
        });
    }
    
    function cargarImagenes(idprod){
        $.post("mod_aplicacion/imagenes.php",{opcion:"consulta",idprod:idprod},function(data){
           $("#imagenes-table").html(data); 
        });
    }
    
    function subirImagenes(idprod, folder){
        $(location).attr('href','imagenes.php?idprod='+idprod+'&folder='+folder+'');
    }
    
    function eliminarImagen(idimagen) {
        if (confirm("Desea eliminar este registro? ")){
            $.post("mod_aplicacion/imagenes.php",{opcion:"eliminar",idimagen:idimagen},function(data){
                if(data == "success"){
                    $("#mensaje").html("<div class='alert alert-success'>Imagen eliminada con &eacute;xito</div>");
                    $(location).attr('href','imgproductos.php');
                }else{
                    $("#mensaje").html("<div class='alert alert-danger'>Error al eliminar la Imagen</div>");
                }
            });
        }
    }
    
    function cargarSeccion(seccion){
        $.post("mod_aplicacion/secciones.php",{opcion:"consulta",seccion:seccion},function(data){
           $("#seccion-table").html(data); 
        });
    }
    
    function cargarSeccionMod(seccion,idicatidioma) {
        $.post("mod_aplicacion/secciones.php",{opcion:idicatidioma,seccion:seccion},function(data){
            for (var i in data)
            {
                datos = data[i];
                $("#idsecidioma").val(datos.idsecidioma);
                $("#titulo").val(datos.titulo);
                $("#nombreidioma").val(datos.nombreidioma);
                $("#descripcion").val(datos.descripcion);
            }
                
        },'json');
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

    function eliminarUsuario(idusuario) {
        if (confirm("Desea eliminar este registro? ")){
            $.post("../mod_aplicacion/usuarios.php",{opcion:"eliminar",idusuario:idusuario},function(data){
                if(data == "success"){
                    $("#mensaje").html("<div class='alert alert-success'>Usuario eliminado con &eacute;xito</div>");
                    $(location).attr('href','usuarios.php');
                }else{
                    $("#mensaje").html("<div class='alert alert-danger'>Error al eliminar el usuario</div>");
                }
            });
        }
    }