$(document).ready(function(){
    
    //inserta los registros de la Constitucion
    $("#formConstitucion").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var idpaciente = $("#idpaciente").val();
        var formData = new FormData(document.getElementById("formConstitucion"));
        formData.append("opcion", "insertarconstitucion");

        $.ajax({
            url:"../mod_aplicacion/admin_historia_psico.php",
            type:"post",
            dataType: "html",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            //beforeSend: function(){$('.cargando').show();},
        }).done(function(data){
            if(data == "success"){
                $("#nombresConstitucion").val("");
                $("#apellidosConstitucion").val("");
                $("#edadConstitucion").val("");
                $("#acudienteIdParentesco").val("");
                $("#ocupacionConstitucion").val("");
                $('#modal_AddConstitucion').modal('hide');
                $('#modal_exito').modal('show');
                cargarConstitucion(idpaciente);
            }else{
                $('#modal_AddConstitucion').modal('hide');
                $('#modal_error').modal('show');
            }
        });
    });
    
    //inserta los registros de la Tratamientos
    $("#formTratamiento").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var idhistoria = $("#idhistoriatrat").val();
        var formData = new FormData(document.getElementById("formTratamiento"));
        formData.append("opcion", "insertarTratamiento");

        $.ajax({
            url:"../mod_aplicacion/admin_historia_psico.php",
            type:"post",
            dataType: "html",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            //beforeSend: function(){$('.cargando').show();},
        }).done(function(data){
            if(data == "success"){
                $("#tratamientoProblemaInstitucion").val("");
                $("#tratamientoProblemaProfesion").val("");
                $("#tratamientoProblemaTiempo").val("");
                $("#tratamientoProblemaEdad").val("");
                $("#tratamientoProblemaDuracion").val("");
                $("#tratamientoProblemaResultados").val("");
                $('#modal_AddTratamientos').modal('hide');
                $('#modal_exito').modal('show');
                cargarTratamientos(idhistoria);
            }else{
                $('#modal_AddTratamientos').modal('hide');
                $('#modal_error').modal('show');
            }
        });
    });

    //Actualiza los datos generales de la historia clinica
    $("#formDatosGrales").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("formDatosGrales"));
        formData.append("opcion", "actualizaDatosGrales");

        $.ajax({
            url:"../mod_aplicacion/admin_historia_psico.php",
            type:"post",
            dataType: "html",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            //beforeSend: function(){$('.cargando').show();},
        }).done(function(data){
            if(data == "success"){
                $('#modal_exito').modal('show');
            }else{
                $('#modal_error').modal('show');
            }
        });
    });
    
    
    //Actualiza los datos tab consulta de la historia clinica
    $("#formConsulta").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("formConsulta"));
        formData.append("opcion", "actualizaTabConsulta");

        $.ajax({
            url:"../mod_aplicacion/admin_historia_psico.php",
            type:"post",
            dataType: "html",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            //beforeSend: function(){$('.cargando').show();},
        }).done(function(data){
            if(data == "success"){
                $('#modal_exito').modal('show');
            }else{
                $('#modal_error').modal('show');
            }
        });
    });
    
    
    //Actualiza los datos tab antecedentes de la historia clinica
    $("#formAntecedentes").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("formAntecedentes"));
        formData.append("opcion", "actualizaTabAntecedentes");

        $.ajax({
            url:"../mod_aplicacion/admin_historia_psico.php",
            type:"post",
            dataType: "html",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            //beforeSend: function(){$('.cargando').show();},
        }).done(function(data){
            if(data == "success"){
                $('#modal_exito').modal('show');
            }else{
                $('#modal_error').modal('show');
            }
        });
    });
    
    
    //Actualiza los datos tab Postnatales de la historia clinica
    $("#formPostnatal").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("formPostnatal"));
        formData.append("opcion", "actualizaTabPostnatal");

        $.ajax({
            url:"../mod_aplicacion/admin_historia_psico.php",
            type:"post",
            dataType: "html",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            //beforeSend: function(){$('.cargando').show();},
        }).done(function(data){
            if(data == "success"){
                $('#modal_exito').modal('show');
            }else{
                $('#modal_error').modal('show');
            }
        });
    });
    
    //Actualiza los datos tab Lenguajes de la historia clinica
    $("#formLenguaje").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("formLenguaje"));
        formData.append("opcion", "actualizaTabLenguaje");

        $.ajax({
            url:"../mod_aplicacion/admin_historia_psico.php",
            type:"post",
            dataType: "html",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            //beforeSend: function(){$('.cargando').show();},
        }).done(function(data){
            if(data == "success"){
                $('#modal_exito').modal('show');
            }else{
                $('#modal_error').modal('show');
            }
        });
    });

    //Actualiza los datos tab Emocional de la historia clinica
    $("#formEmocional").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("formEmocional"));
        formData.append("opcion", "actualizaTabEmocional");

        $.ajax({
            url:"../mod_aplicacion/admin_historia_psico.php",
            type:"post",
            dataType: "html",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
        }).done(function(data){
            if(data == "success"){
                $('#modal_exito').modal('show');
            }else{
                $('#modal_error').modal('show');
            }
        });
    });
    
    //Actualiza los datos tab Sensorial de la historia clinica
    $("#formSensorial").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("formSensorial"));
        formData.append("opcion", "actualizaTabSensorial");

        $.ajax({
            url:"../mod_aplicacion/admin_historia_psico.php",
            type:"post",
            dataType: "html",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
        }).done(function(data){
            if(data == "success"){
                $('#modal_exito').modal('show');
            }else{
                $('#modal_error').modal('show');
            }
        });
    });
    
    
    //Actualiza los datos tab Desempeno Actual de la historia clinica
    $("#formDesActual").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("formDesActual"));
        formData.append("opcion", "actualizaTabDesActual");

        $.ajax({
            url:"../mod_aplicacion/admin_historia_psico.php",
            type:"post",
            dataType: "html",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            //beforeSend: function(){$('.cargando').show();},
        }).done(function(data){
            if(data == "success"){
                $('#modal_exito').modal('show');
            }else{
                $('#modal_error').modal('show');
            }
        });
    });
    
    //Actualiza los datos tab Desempeno Actual de la historia clinica
    $("#formHabilidades").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("formHabilidades"));
        formData.append("opcion", "actualizaTabHabilidades");

        $.ajax({
            url:"../mod_aplicacion/admin_historia_psico.php",
            type:"post",
            dataType: "html",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            //beforeSend: function(){$('.cargando').show();},
        }).done(function(data){
            if(data == "success"){
                $('#modal_exito').modal('show');
            }else{
                $('#modal_error').modal('show');
            }
        });
    });
    
    
    //Actualiza la informacion del informe Final
    $("#formInformeFinal").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("formInformeFinal"));
        formData.append("opcion", "actualizaInformeFinal");

        $.ajax({
            url:"../mod_aplicacion/admin_historia_psico.php",
            type:"post",
            dataType: "html",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
        }).done(function(data){
            if(data == "success"){
                $('#modal_exito').modal('show');
            }else{
                $('#modal_error').modal('show');
            }
        });
    });
    
    
    //Actualiza los datos de la programacion
    $("#formProgramacion").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var idedit = $("#idedit").val();
        var formData = new FormData(document.getElementById("formProgramacion"));
        if(idedit == 1){
            formData.append("opcion", "actualizarProgramacion");
        }else{
            formData.append("opcion", "insertarProgramacion");
        }
        
        $.ajax({
            url:"../mod_aplicacion/admin_historia_psico.php",
            type:"post",
            dataType: "html",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            //beforeSend: function(){$('.cargando').show();},
        }).done(function(data){
            if(data == "success"){
                $('#modal_exito').modal('show');
                location.reload();
            }else{
                $('#modal_error').modal('show');
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

    function crearHistoria(idpaciente, idcita, idarea, idterapeuta){
            $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"insertarhistoria", idpaciente:idpaciente, idcita:idcita, idarea:idarea, idterapeuta:idterapeuta},function(data){
            if(data > 0){
                $(location).attr('href','psicologia_historia.php?var='+idpaciente+'&cita='+idcita+'&idhist='+data);
            }else{
                alert("No se pudo crear la Historia");
            }
        });
    }
    
    function consultaHistoria(idpaciente, idcita, idarea, idterapeuta) {
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarhistoria", idpaciente:idpaciente, idcita:idcita, idarea:idarea},function(data){
            if(data > 0){
                $(location).attr('href','psicologia_historia.php?var='+idpaciente+'&cita='+idcita+'&idhist='+data+'&idarea='+idarea);
            }else{
                crearHistoria(idpaciente, idcita, idarea, idterapeuta);
            }
        });
    }
    
    //informe final
    function consultaInformeFinal(idpaciente, idcita, idarea, idterapeuta) {
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarInformeFinal", idpaciente:idpaciente, idcita:idcita, idarea:idarea},function(data){
            if(data > 0){
                $(location).attr('href','psicologia_informes.php?var='+idpaciente+'&cita='+idcita+'&idinforme='+data+'&idhist='+data+'&idarea='+idarea);
            }else{
                crearInformeFinal(idpaciente, idcita, idarea,idterapeuta);
            }
        });
    }
    
    function crearInformeFinal(idpaciente, idcita, idarea,idterapeuta){
            $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"insertarInformeFinal", idpaciente:idpaciente, idcita:idcita, idarea:idarea, idterapeuta:idterapeuta},function(data){
            if(data > 0){
                $(location).attr('href','psicologia_informes.php?var='+idpaciente+'&cita='+idcita+'&idinforme='+data+'&idhist='+data);
            }else{
                alert("No se pudo crear la Historia");
            }
        });
    }
    
    function cargaInformeFinal(idpaciente,idarea){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"cargarInformeFinal", idpaciente:idpaciente, idarea:idarea},function(dataInfo){
            for (var i in dataInfo)
            {
                datosInfo = dataInfo[i];
                $("#ObjEvaluacionObservacion").text(datosInfo.objetivo);
                $("#MetEvaluacionObservacion").text(datosInfo.metodoeval);
                $("#ResultadosObservacion").text(datosInfo.resultados);
                $("#ConclusionesObservacion").text(datosInfo.conclusiones);
                $("#RecomendacionesObservacion").text(datosInfo.recomendaciones);
                
            }
        },'json');
    }
    
    // Cargar los datos del Informe Final
    
    function  cargaDatosInforme(idpaciente)
    {
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultardatosInf", idpaciente:idpaciente},function(data){
            for (var i in data)
            {
                datos = data[i];
                $("#pacienteLugarNacimiento").text(datos.lugarnacimiento);
                $("#pacienteInformante").text(datos.informante);
            }
        },'json');

    }
    
    
    ////TAB DATOS GENERALES
    
    function cargaDatosGenerales(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultardatos", idpaciente:idpaciente, idhistoria:idhistoria},function(data){
            for (var i in data)
            {
                datos = data[i];
                $("#remitidoRemision").val(datos.remitidopor);
                $("#motivoRemision").val(datos.motivo);
                $("#pacienteCiudad").val(datos.ciudad);
                $("#pacienteDireccion").val(datos.direccion);
                $("#pacienteInformante").val(datos.informante);
                $("#pacienteLugarNacimiento").val(datos.pacienteLugarNacimiento);
                
            }
        },'json');
    }
    
    function cambiarConstitucion(idpaciente){
        var valor = "";
        if($("#CkConst"+idpaciente+":checked").val() != null ){
            valor = "S";
        }else{
            valor = "N";
        }
        
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"actualizarconstitucion", idpaciente:idpaciente, valor:valor},function(data){
            if(data == "success"){
                alert("Constitucion cambiada con Exito");
                //$('#modal_exito').modal('show');
            }else{
                alert("Error actualizando Constitucion");
                //$('#modal_error').modal('show');
            }
        });
    }
    
    function cargarConstitucion(idpaciente, vista){
        if(vista == "informe"){
            var disabled = "disabled";
        }else{
            var disabled = $("#verBoton").val();
        }
        
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarconstitucion", idpaciente:idpaciente, disabled:disabled},function(data){
            $("#constitucion").html(data);
        });
    }
    
    ////TAB CONSULTA
    
    function cargaMotivo(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarmotivo", idpaciente:idpaciente, idhistoria:idhistoria},function(datam){
            for (var i in datam)
            {
                datosm = datam[i];
                $("#motivoConsultaObservacion").text(datosm.motivoConsulta);
                
            }
        },'json');
    }
    
    function cargaMotivoInforme(idpaciente){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarmotivoPaciente", idpaciente:idpaciente},function(datam){
            for (var i in datam)
            {
                datosm = datam[i];
                $("#motivoConsultaObservacion").text(datosm.motivoConsulta);
                
            }
        },'json');
    }
    
    function cargaDiagnosticoPrevio(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarDiagnosticoPrevio", idpaciente:idpaciente, idhistoria:idhistoria},function(data){
            for (var i in data)
            {
                datos = data[i];
                $("#diagnosticos").text(datos.diagnosticos);
                
            }
        },'json');
    }
    
    function cargaAnteDif(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultaAnteDif", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDif){
            for (var i in dataDif)
            {
                datosDif = dataDif[i];
                $("#idantecedente").val(datosDif.idantecedente);
                $("#edadIniDif").val(datosDif.edadIniDif);
                $("#porqueante").text(datosDif.porqueante);
                $("#otrasConductas").text(datosDif.otrasConductas);
                
            }
        },'json');
    }
    
    function cargarTratamientos(idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarTratamientos", idhistoria:idhistoria},function(data){
            $("#tratamientosProblema").html(data);
        });
    }
    
    function cargarTratamientosUsuario(idpaciente){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarTratamientosUsuario", idpaciente:idpaciente},function(data){
            $("#tratamientosProblema").html(data);
        });
    }
    
    ////TAB ANTECEDENTES
    
    function cargaAntFamiliar(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarAntFamiliar", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAntFam){
            for (var i in dataAntFam)
            {
                datosAntFam = dataAntFam[i];
                $("#idantecedente2").val(datosAntFam.idantecedente);
                $("#lineamaterna").val(datosAntFam.lineamaterna);
                $("#lineapaterna").text(datosAntFam.lineapaterna);
                
            }
        },'json');
    }
    
    function cargaAntPrenatal(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarAntPrenatal", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAntPre){
            for (var i in dataAntPre)
            {
                datosAntPre = dataAntPre[i];
                $("#idantecedente3").val(datosAntPre.idantecedente);
                $("#embarazodeseado").val(datosAntPre.embarazodeseado);
                $("#anticonceptivos").val(datosAntPre.anticonceptivos);
                $("#abortivas").val(datosAntPre.abortivas);
                $("#adoptado").val(datosAntPre.adoptado);
                $("#actitudembarazo").val(datosAntPre.actitudembarazo);
                $("#consgpadres").val(datosAntPre.consgpadres);
                $("#enfinfecciosas").val(datosAntPre.enfinfecciosas);
                $("#enferuptivas").val(datosAntPre.enferuptivas);
                $("#enfotras").val(datosAntPre.enfotras);
                $("#dftcemocionales").val(datosAntPre.dftcemocionales);
                $("#controlmedico").val(datosAntPre.controlmedico);
                $("#rayosx").val(datosAntPre.rayosx);
                $("#ecografias").val(datosAntPre.ecografias);
  
            }
        },'json');
    }
    
    
    function cargaAntParto(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarAntParto", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAntParto){
            for (var i in dataAntParto)
            {
                datosAntParto = dataAntParto[i];
                $("#idantecedente4").val(datosAntParto.idantecedente);
                $("#duracion").val(datosAntParto.duracion);
                $("#parto").val(datosAntParto.parto);
                $("#inducido").val(datosAntParto.inducido);
                $("#lugar").val(datosAntParto.lugar);
                $("#atendidopor").val(datosAntParto.atendidopor);
                $("#dificultades").val(datosAntParto.dificultades);
                $("#incubadora").val(datosAntParto.incubadora);
                $("#defectoscong").val(datosAntParto.defectoscong);
                $("#talla").val(datosAntParto.talla);
                $("#peso").val(datosAntParto.peso);
                $("#observacionesParto").val(datosAntParto.observaciones);
  
            }
        },'json');
    }
    
    
    ////TAB POSTNATALES
    
    function cargaAntPostnatal(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarAntPostnatal", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAntPost){
            for (var i in dataAntPost)
            {
                datosAntPost = dataAntPost[i];
                $("#idantecedente5").val(datosAntPost.idantecedente);
                $("#enfposnatal").val(datosAntPost.enfposnatal);
                $("#alergiasposnatal").val(datosAntPost.alergiasposnatal);
                $("#convulsiones").val(datosAntPost.convulsiones);
                $("#cardiacos").val(datosAntPost.cardiacos);
                $("#respiratorios").val(datosAntPost.respiratorios);
                $("#eruptivaposnatal").val(datosAntPost.eruptivaposnatal);
                $("#vacunas").val(datosAntPost.vacunas);
                $("#eeg").val(datosAntPost.eeg);
                $("#tomoaxcomp").val(datosAntPost.tomoaxcomp);
                $("#potenevocauditivos").val(datosAntPost.potenevocauditivos);
                $("#neurologo").val(datosAntPost.neurologo);
                $("#otrosprofesionales").val(datosAntPost.otrosprofesionales);
                
            }
        },'json');
    }
    
    function cargaDesarrollo(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarDesarrollo", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDllo){
            for (var i in dataDllo)
            {
                datosDllo = dataDllo[i];
                $("#iddesarrollo1").val(datosDllo.iddesarrollo);
                $("#seleccionMaterna").val(datosDllo.seleccionMaterna);
                $("#desdeMaterna").val(datosDllo.desdeMaterna);
                $("#hastaMaterna").val(datosDllo.hastaMaterna);
                $("#seleccionTetero").val(datosDllo.seleccionTetero);
                $("#desdeTetero").val(datosDllo.desdeTetero);
                $("#hastaTetero").val(datosDllo.hastaTetero);
                $("#difgenpaciente").val(datosDllo.difgenpaciente);
                
            }
        },'json');
    }
    
    function cargaEleAlim(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarEleAlim", idpaciente:idpaciente, idhistoria:idhistoria},function(dataEleAlim){
            for (var i in dataEleAlim)
            {
                datosEleAlim = dataEleAlim[i];
                $("#iddesarrollo2").val(datosEleAlim.iddesarrollo);
                $("#cuchara").val(datosEleAlim.cuchara);
                $("#tenedor").val(datosEleAlim.tenedor);
                $("#cuchillo").val(datosEleAlim.cuchillo);
                $("#vaso").val(datosEleAlim.vaso);
                $("#pitillo").val(datosEleAlim.pitillo);

            }
        },'json');
    }
    
    function cargaDifComida(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarDifComida", idpaciente:idpaciente, idhistoria:idhistoria},function(dataComida){
            for (var i in dataComida)
            {
                datosComida = dataComida[i];
                $("#iddesarrollo3").val(datosComida.iddesarrollo);
                $("#cogerla").val(datosComida.cogerla);
                $("#robarla").val(datosComida.robarla);
                $("#derramar").val(datosComida.derramar);
                $("#sobreselectividad").val(datosComida.sobreselectividad);
                $("#obsrdifcomida").val(datosComida.obsrdifcomida);
                $("#horario").val(datosComida.horario);
                $("#lugarcomida").val(datosComida.lugarcomida);
                $("#dondecomida").val(datosComida.dondecomida);

            }
        },'json');
    }
    
    ////TAB LENGUAJE
    
    function cargaDllolenguaje(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarDllolenguaje", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDlloLeng){
            for (var i in dataDlloLeng)
            {
                datosDlloLeng = dataDlloLeng[i];
                $("#iddesarrollo4").val(datosDlloLeng.iddesarrollo);
                $("#balbuceo").val(datosDlloLeng.balbuceo);
                $("#edadbalbuceo").val(datosDlloLeng.edadbalbuceo);
                $("#observacionbalbuceo").val(datosDlloLeng.observacionbalbuceo);
                $("#palabras").val(datosDlloLeng.palabras);
                $("#edadpalabras").val(datosDlloLeng.edadpalabras);
                $("#observacionpalabras").val(datosDlloLeng.observacionpalabras);
                $("#frases").val(datosDlloLeng.frases);
                $("#edadfrases").val(datosDlloLeng.edadfrases);
                $("#observacionfrases").val(datosDlloLeng.observacionfrases);
                $("#expdesea").val(datosDlloLeng.expdesea);
                $("#nombraobjetos").val(datosDlloLeng.nombraobjetos);
                $("#claridadhablar").val(datosDlloLeng.claridadhablar);
                $("#narrahechos").val(datosDlloLeng.narrahechos);
                $("#senalaobjetos").val(datosDlloLeng.senalaobjetos);
                $("#buscaobjetos").val(datosDlloLeng.buscaobjetos);
                $("#primerapersona").val(datosDlloLeng.primerapersona);
                $("#respreguntas").val(datosDlloLeng.respreguntas);
                $("#hacepreguntas").val(datosDlloLeng.hacepreguntas);
                $("#dialoga").val(datosDlloLeng.dialoga);
                $("#diflenguaje").val(datosDlloLeng.diflenguaje);
   
            }
        },'json');
    }
    
    function cargaDifHabla(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarDifHabla", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDifHabla){
            for (var i in dataDifHabla)
            {
                datosDifHabla = dataDifHabla[i];
                $("#iddesarrollo5").val(datosDifHabla.iddesarrollo);
                $("#ecolalia").val(datosDifHabla.ecolalia);
                $("#obsrdifhabla").val(datosDifHabla.obsrdifhabla);
                $("#sondifhabla").val(datosDifHabla.sondifhabla);
                $("#preservdifhabla").val(datosDifHabla.preservdifhabla);
                $("#gritosdifhabla").val(datosDifHabla.gritosdifhabla);
                $("#tonofindifhabla").val(datosDifHabla.tonofindifhabla);
      
            }
        },'json');
    }
    
    function cargaComNoVerbal(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarComNoVerbal", idpaciente:idpaciente, idhistoria:idhistoria},function(dataNoVerbal){
            for (var i in dataNoVerbal)
            {
                datosNoVerbal = dataNoVerbal[i];
                $("#iddesarrollo6").val(datosNoVerbal.iddesarrollo);
                $("#entiendegestos").val(datosNoVerbal.entiendegestos);
                $("#utilizagestos").val(datosNoVerbal.utilizagestos);
                $("#utilizasenal").val(datosNoVerbal.utilizasenal);

            }
        },'json');
    }
    
    ////TAB EMOCIONAL
    
    function cargaDlloSoEmocional(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarDlloSoEmocional", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDlloEmo){
            for (var i in dataDlloEmo)
            {
                datosDlloEmo = dataDlloEmo[i];
                $("#iddesarrollo7").val(datosDlloEmo.iddesarrollo);
                $("#primerasonrisa").val(datosDlloEmo.primerasonrisa);
                $("#levantabrazos").val(datosDlloEmo.levantabrazos);
                $("#llantoporaus").val(datosDlloEmo.llantoporaus);
                $("#reconvoces").val(datosDlloEmo.reconvoces);
                $("#otrosemocional").val(datosDlloEmo.otros);
                $("#contvisualesp").val(datosDlloEmo.contvisualesp);
                $("#contdemanda").val(datosDlloEmo.contdemanda);
                $("#buscaconsfamlia").val(datosDlloEmo.buscaconsfamlia);
                $("#resptaemociones").val(datosDlloEmo.resptaemociones);
                $("#risasinmotivo").val(datosDlloEmo.risasinmotivo);
                $("#llantosinmotivo").val(datosDlloEmo.llantosinmotivo);
                $("#interpares").val(datosDlloEmo.interpares);
                $("#interadulto").val(datosDlloEmo.interadulto);
                $("#usojuguetes").val(datosDlloEmo.usojuguetes);
                $("#juegos").val(datosDlloEmo.juegos);
                $("#anticipapeligros").val(datosDlloEmo.anticipapeligros);
   
            }
        },'json');
    }
    
    
    function cargaResistencia(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarResistencia", idpaciente:idpaciente, idhistoria:idhistoria},function(dataResis){
            for (var i in dataResis)
            {
                datosResis = dataResis[i];
                $("#iddesarrollo8").val(datosResis.iddesarrollo);
                $("#cambioshorarios").val(datosResis.cambioshorarios);
                $("#cambiorutas").val(datosResis.cambiorutas);
                $("#ubicacionesp").val(datosResis.ubicacionesp);
                $("#apegoobjetos").val(datosResis.apegoobjetos);
                $("#actvrepetiivas").val(datosResis.actvrepetiivas);

            }
        },'json');
    }
    
    
    
    ////TAB SENSORIAL
    
    function cargaAuditiva(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarAuditiva", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAU){
            for (var i in dataAU)
            {
                datosAU = dataAU[i];
                $("#idrespuestasensorial").val(datosAU.idrespuestasensorial);
                $("#resptanombre").val(datosAU.resptanombre);
                $("#resptasonidos").val(datosAU.resptasonidos);
                $("#sospechasordera").val(datosAU.sospechasordera);
                $("#otrossensorial").val(datosAU.otros);
                $("#sonidosesp").val(datosAU.sonidosesp);
                $("#sonidosext").val(datosAU.sonidosext);
                $("#tapaoidos").val(datosAU.tapaoidos);
                $("#golpeaobj").val(datosAU.golpeaobj);
                $("#audicion").val(datosAU.audicion);
                $("#observacionauditiva").val(datosAU.observacionauditiva);
   
            }
        },'json');
    }
    
    
    function cargaVisual(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarVisual", idpaciente:idpaciente, idhistoria:idhistoria},function(dataVisual){
            for (var i in dataVisual)
            {
                datosVisual = dataVisual[i];
                
                $("#orientamirada").val(datosVisual.orientamirada);
                $("#buscamirada").val(datosVisual.buscamirada);
                $("#giraobjetos").val(datosVisual.giraobjetos);
                $("#miradaperdida").val(datosVisual.miradaperdida);
                $("#reojo").val(datosVisual.reojo);
                $("#acercaaleja").val(datosVisual.acercaaleja);
                $("#observacionvisual").val(datosVisual.observacionvisual);

            }
        },'json');
    }
    
    
    function cargaReceptor(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consutlarReceptor", idpaciente:idpaciente, idhistoria:idhistoria},function(dataRec){
            for (var i in dataRec)
            {
                datosRec = dataRec[i];
                
                $("#olfativo").val(datosRec.olfativo);
                $("#gustativo").val(datosRec.gustativo);
                $("#tactil").val(datosRec.tactil);
                $("#puntapies").val(datosRec.puntapies);
                $("#aleteos").val(datosRec.aleteos);
                $("#balanceo").val(datosRec.balanceo);
                $("#juegosaliva").val(datosRec.juegosaliva);
                $("#escupir").val(datosRec.escupir);
                $("#mvtoextrept").val(datosRec.mvtoextrept);
                $("#autoagresiones").val(datosRec.autoagresiones);
                
            }
        },'json');
    }
    
    
    function cargaSueno(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consutlarSueno", idpaciente:idpaciente, idhistoria:idhistoria},function(dataSueno){
            for (var i in dataSueno)
            {
                datosSueno = dataSueno[i];
                
                $("#camaindepte").val(datosSueno.camaindepte);
                $("#cuartoindepte").val(datosSueno.cuartoindepte);
                $("#justificacion").val(datosSueno.justificacion);
                $("#horariosueno").val(datosSueno.horario);
                $("#difisueno").val(datosSueno.difisueno);

            }
        },'json');
    }
    
    
    ////TAB DESEMPENO
    
    function cargaDesempeno(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarDesempeno", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDES){
            for (var i in dataDES)
            {
                datosDES = dataDES[i];
                $("#idrepertoriobasico").val(datosDES.idrepertoriobasico);
                $("#contactovisual").val(datosDES.contactovisual);
                $("#periodosatencion").val(datosDES.periodosatencion);
                $("#imitacionmotora").val(datosDES.imitacionmotora);
                $("#seguinstrucciones").val(datosDES.seguinstrucciones);
                $("#esqcorporal").val(datosDES.esqcorporal);
   
            }
        },'json');
    }
    
    function cargaHigiene(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarHigiene", idpaciente:idpaciente, idhistoria:idhistoria},function(dataHigiene){
            for (var i in dataHigiene)
            {
                datosHigiene = dataHigiene[i];
                $("#corporal").val(datosHigiene.corporal);
                $("#cepillado").val(datosHigiene.cepillado);
                $("#manos").val(datosHigiene.manos);
                $("#cara").val(datosHigiene.cara);
                $("#peinado").val(datosHigiene.peinado);
                $("#toalla").val(datosHigiene.toalla);
                $("#controlesfinter").val(datosHigiene.controlesfinter);

            }
        },'json');
    }
    
    ////TAB HABILIDADES
    
    function cargaHabilidades(idpaciente,idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarHabilidades", idpaciente:idpaciente, idhistoria:idhistoria},function(dataHAB){
            for (var i in dataHAB)
            {
                datosHAB = dataHAB[i];
                $("#habilespeciales").val(datosHAB.habilespeciales);
                $("#dificultadescond").val(datosHAB.dificultadescond);
                $("#caractambiente").val(datosHAB.caractambiente);

            }
        },'json');
    }
    
    
    ////TAB PRENDAS VESTIR
    
    function cargaPrendasVestir(idhistoria){
        
        var verBoton = $("#verBoton").val();
        
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarPrendasVestir", idhistoria:idhistoria, verBoton:verBoton},function(data){
            $("#prendasVestir").html(data);
        });
    }
    
    function cargaHabilidadMotriz(idhistoria){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"consultarHabilidadMotriz", idhistoria:idhistoria},function(data){
            $("#habilidadMotriz").html(data);
        });
    }
    ///////////////////////
    
    
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
                
                $("#lbpacienteNombres").text(datos.pacienteNombres+" "+datos.pacientePrimerApellido+" "+datos.pacienteSegundoApellido);
                $("#lbpacienteFechaNacimiento").text(datos.pacienteFechaNacimiento);
                $("#lbpacienteEdad").text(datos.pacienteEdad);
                $("#lbpacienteMeses").text(datos.pacienteMeses);
                $("#lbpacienteDireccion").text(datos.pacientedireccion);
                $("#lbpacienteCiudad").text(datos.pacienteciudadresidencia);
                $("#lbpacienteIdEps").text(datos.pacienteEps);
                
                $("#pacientePrimerApellido").val(datos.pacientePrimerApellido);
                $("#pacienteSegundoApellido").val(datos.pacienteSegundoApellido);
                $("#pacienteLugarNacimiento").val(datos.pacienteLugarNacimiento);
                $("#pacienteFechaNacimiento").val(datos.pacienteFechaNacimiento);
                $("#pacienteEdad").val(datos.pacienteEdad);
                $("#pacienteMeses").val(datos.pacienteMeses);
                $("#pacienteIdGenero").html("<option value='"+datos.pacienteIdGenero+"'>"+datos.genero+"</option>");
                $("#pacienteIdEscolaridad").html("<option value='"+datos.pacienteIdEscolaridad+"'>"+datos.pacienteEscolaridad+"</option>");
                $("#pacienteTutela").html("<option value='"+datos.pacienteTutela+"'>"+datos.pacienteTutela+"</option>");
                //$("#pacienteIdEps").html("<option value='"+datos.pacienteIdEps+"'>"+datos.pacienteEps+"</option>");
                $("#pacienteEps").val(datos.pacienteEps);
                $("#diagnosticos").val(datos.diagnosticos);
                $("#remitido").val(datos.remitido);
                $("#acudienteIdTipoDocumento").html("<option value='"+datos.acudienteIdTipoDocumento+"'>"+datos.acudienteTipoDocumento+"</option>");
                $("#acudienteIdDocumento").val(datos.acudienteIdDocumento);
                $("#acudienteIdTipoUsuario").val(datos.acudienteIdTipoUsuario);
                $("#acudienteIdUsuario").val(datos.acudienteIdUsuario);
                $("#acudienteDocumento").val(datos.acudienteDocumento);
                //$("#acudienteIdParentesco").html("<option value='"+datos.acudienteIdParentesco+"'>"+datos.acudienteParentesco+"</option>");
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
                    $("#padreIdEscolaridad").val(datos.padreEscolaridad);
                    $("#padreOcupacion").val(datos.padreOcupacion);
                    $("#padreDireccion").val(datos.padreDireccion);
                    $("#padreTelefonoFijo").val(datos.padreTelefonoFijo);
                    $("#padreTelefonoCelular").val(datos.padreTelefonoCelular);
                    $("#padreEmail").val(datos.padreEmail);
                    
                    $("#lbpadreNombres").text(datos.padreNombres+" "+datos.padrePrimerApellido+" "+datos.padreSegundoApellido);
                    $("#lbpadreEdad").text(datos.padreEdad);
                    $("#lbpadreIdEscolaridad").text(datos.padreEscolaridad);
                    $("#lbpadreOcupacion").text(datos.padreOcupacion);
                    $("#lbpadreTelefonoFijo").text(datos.padreTelefonoFijo);
                    $("#lbpadreTelefonoCelular").text(datos.padreTelefonoCelular);
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
                    $("#madreIdEscolaridad").val(datos.madreEscolaridad);
                    $("#madreOcupacion").val(datos.madreOcupacion);
                    $("#madreDireccion").val(datos.madreDireccion);
                    $("#madreTelefonoFijo").val(datos.madreTelefonoFijo);
                    $("#madreTelefonoCelular").val(datos.madreTelefonoCelular);
                    $("#madreEmail").val(datos.madreEmail);
                    
                    $("#lbmadreNombres").text(datos.madreNombres+" "+datos.madrePrimerApellido+" "+datos.madreSegundoApellido);
                    $("#lbmadreEdad").text(datos.madreEdad);
                    $("#lbmadreIdEscolaridad").text(datos.madreEscolaridad);
                    $("#lbmadreOcupacion").text(datos.madreOcupacion);
                    $("#lbmadreTelefonoFijo").text(datos.madreTelefonoFijo);
                    $("#lbmadreTelefonoCelular").text(datos.madreTelefonoCelular);
                }
            }
                
        },'json');
    }
    
    function cargaHora(fechacita){ //Obtiene las horas disponibles de acuerdo a la fecha seleccionada
        $.post("../mod_aplicacion/cargarHoras.php", { fechacita: fechacita }, function(data){
            $("#horacita").append(data);
        });
    }

    function generarProgramacionPdf(idpaciente){
        window.location.href='psicologia_programacion_pdf.php?var='+idpaciente;
    }
    
    function generarInformePdf(idpaciente){
       window.location.href='psicologia_informe_pdf.php?var='+idpaciente;
    }
    
    function generarInformeWord(idpaciente){
      // window.location.href='psicologia_informe_word.php?var='+idpaciente;
       window.location.href='imprimir_cheque.php';
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