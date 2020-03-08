$(document).ready(function(){
    
    //inserta los registros de la Constitucion
    $("#formConstitucion").on("submit", function(event)
    {
        event.preventDefault(); //neutralizar el formulario
        var idpaciente = $("#idpaciente").val();
        var formData = new FormData(document.getElementById("formConstitucion"));
        formData.append("opcion", "insertarconstitucion");

        $.ajax({
            url:"../mod_aplicacion/fonoaudiologia/admin_historia_psico.php",
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
                //$("#acudienteIdParentesco").val("");
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

    //Actualiza los datos tab anamnesis de la historia clinica de fono
    $("#formUPAnamnesis").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("formUPAnamnesis"));
        formData.append("opcion", "actualizarAnamnesis");

        $.ajax({
            url:"../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",
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
    
    //Actualiza los datos tab Desarrollo lenguaje de la historia clinica de fono
    $("#formDlloLeng").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("formDlloLeng"));
        formData.append("opcion", "actualizarDlloLeng");

        $.ajax({
            url:"../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",
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
    
    
    //Actualiza los datos tab Hisoria escolar de la historia clinica de fono
    $("#formHistEscolar").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("formHistEscolar"));
        formData.append("opcion", "actualizarHistEscolar");

        $.ajax({
            url:"../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",
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
    
    
     //Actualiza los datos tab alimentacion de la historia clinica de fono
    $("#formAlimentacion").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("formAlimentacion"));
        formData.append("opcion", "actualizarAlimentacion");

        $.ajax({
            url:"../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",
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
    
    
    //Actualiza los datos tab Impresion diagnostica de la historia clinica de fono
    $("#formImpDiagnostica").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("formImpDiagnostica"));
        formData.append("opcion", "actualizarImpDiagnostica");

        $.ajax({
            url:"../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",
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
            //beforeSend: function(){$('.cargando').show();},
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
            //beforeSend: function(){$('.cargando').show();},
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
                /*if(i == 3){
                    $.each(data[i], function( key, value ) {
                        $("#pacienteIdEps").val(value.nombre);
                    });
                }*/
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

    function crearHistoria(idpaciente, idcita, idarea, idTerapeuta){
            $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"insertarhistoria", idpaciente:idpaciente, idcita:idcita, idarea:idarea, idTerapeuta:idTerapeuta},function(data){
            if(data > 0){
                $(location).attr('href','fonoaudiologia_historia.php?var='+idpaciente+'&cita='+idcita+'&idhist='+data);
            }else{
                alert("No se pudo crear la Historia");
            }
        });
    }
    
    function consultaHistoria(idpaciente, idcita, idarea, idTerapeuta) {
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarhistoria", idpaciente:idpaciente, idcita:idcita, idarea:idarea},function(data){
            if(data > 0){
                $(location).attr('href','fonoaudiologia_historia.php?var='+idpaciente+'&cita='+idcita+'&idhist='+data+'&idarea='+idarea);
            }else{
                crearHistoria(idpaciente, idcita, idarea, idTerapeuta);
            }
        });
    }
    
    //informe final
    function consultaInformeFinalFono(idpaciente, idcita, idarea, idterapeuta) {
        var idHist;
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarIdHistoriaPsico", idpaciente:idpaciente},function(dataPsico){
            idHist = dataPsico;
        });
        
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarInformeFinalFono", idpaciente:idpaciente, idcita:idcita, idarea:idarea}, function(dataCons){
            if(dataCons > 0){
                $(location).attr('href','fonoaudiologia_informes.php?var='+idpaciente+'&cita='+idcita+'&idinforme='+dataCons+'&idhist='+idHist+'&idarea='+idarea+'idTerapeuta'+idterapeuta);
            }else{
                crearInformeFinal(idpaciente, idcita, idarea, idterapeuta);
            }
        });
    }
    
    function crearInformeFinal(idpaciente, idcita, idarea, idTerapeuta){
        var idHist;
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarIdHistoriaPsico", idpaciente:idpaciente},function(dataPsico){
            idHist = dataPsico;
        });
        
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"insertarInformeFinalFono", idpaciente:idpaciente, idcita:idcita, idarea:idarea, idTerapeuta:idTerapeuta}, function(dataCrea){
            if(dataCrea > 0){
                $(location).attr('href','fonoaudiologia_informes.php?var='+idpaciente+'&cita='+idcita+'&idinforme='+dataCrea+'&idhist='+idHist+'&idarea='+idarea+'idTerapeuta'+idTerapeuta);
            }else{
                alert("No se pudo crear el informe");
            }
        });
    }
    
    function cargaInformeFinal(idpaciente,idinforme){
        $.post("../mod_aplicacion/admin_historia_psico.php",{opcion:"cargarInformeFinalFono", idpaciente:idpaciente, idinforme:idinforme}, function(dataInfo){
            for (var i in dataInfo)
            {
                datosInfo = dataInfo[i];
                $("#HistoriaObservacion").text(datosInfo.historia);
                $("#ObjEvaluacionObservacion").text(datosInfo.objetivo);
                $("#MetEvaluacionObservacion").text(datosInfo.metodoeval);
                $("#ResultadosObservacion").text(datosInfo.resultados);
                $("#ConclusionesObservacion").text(datosInfo.conclusiones_idea);
                $("#RecomendacionesObservacion").text(datosInfo.recomendaciones);
                
            }
        },'json');
    }
    
    ////TAB DATOS GENERALES
    
    function cargarHistoriaPsicoId(idpaciente){
        
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarHistoriaPsicoId", idpaciente:idpaciente},function(dataP){
            for (var i in dataP)
            {    
                datosP = dataP[i];
                $(".idhistoriapsico").val(datosP.idhistoriaclinica);
            }
        },'json');
    }
    
    function cargarIdHistoriaPsico(idpaciente){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarIdHistoriaPsico", idpaciente:idpaciente},function(data){
            for (var i in data)
            {   
                datos = data[i];
                var idhistoriapsico = datos.idhistoriaclinica;
            }
        },'json');
        return idhistoriapsico;
    }
    
    function cargaDatosPsicologia(idpaciente){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarIdHistoriaPsico", idpaciente:idpaciente},function(dataPsico){
            $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultardatos", idpaciente:idpaciente, idhistoria:dataPsico},function(data){
                for (var i in data)
                {
                    datos = data[i];
                    $("#InformantePac").text(datos.informante);
                    $("#remitidoRemision").val(datos.remitidopor);
                    $("#motivoRemision").val(datos.motivo);
                }
            },'json');
        });
    }
    
    function cargaDatosGenerales(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultardatos", idpaciente:idpaciente, idhistoria:idhistoria},function(data){
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
    
    //Se utiliza esta funcion para cargar los datos de historia clinica
    function cargarConstitucion(idpaciente, vista){
        if(vista == "informe"){
            var disabled = "disabled";
        }else{
            var disabled = $("#verBoton").val();
        }
        
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarconstitucion", idpaciente:idpaciente, disabled:disabled},function(data){
            $("#constitucion").html(data);
        });
    }
    
    ////TAB CONSULTA
    
    function cargaMotivo(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarmotivo", idpaciente:idpaciente, idhistoria:idhistoria},function(datam){
            for (var i in datam)
            {
                datosm = datam[i];
                $("#motivoConsultaObservacion").text(datosm.motivoConsulta);
                $("#pacienteInstitucion").val(datosm.institucion);
                
            }
        },'json');
    }
    
    function cargaMotivoInforme(idpaciente){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarmotivoPaciente", idpaciente:idpaciente},function(datam){
            for (var i in datam)
            {
                datosm = datam[i];
                $("#motivoConsultaObservacion").text(datosm.motivoConsulta);
                
            }
        },'json');
    }
    
    function cargaNroHnos(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaNroHnos", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDif){
            for (var i in dataDif)
            {
                datosDif = dataDif[i];
                $("#numerohermanos").val(datosDif.numerohermanos);
                $("#lugarocupa").val(datosDif.lugarocupa);
                
            }
        },'json');
    }
    
    function cargaAnteFamFono(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAnteFamFono", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAnt2){
            for (var i in dataAnt2)
            {
                datosAnt2 = dataAnt2[i];
                $("#idantecedente2").val(datosAnt2.idantecedente);
                $("#transtornoneurologico").val(datosAnt2.transtornoneurologico);
                $("#problemaspsiquiatrico").val(datosAnt2.problemaspsiquiatrico);
                $("#deficienciasvisaudt").val(datosAnt2.deficienciasvisaudt);
                $("#alteracionlenguaje").val(datosAnt2.alteracionlenguaje);
                $("#deficitcongnitivo").val(datosAnt2.deficitcongnitivo);
                $("#adicciones").val(datosAnt2.adicciones);
                $("#transaprendizaje").val(datosAnt2.transaprendizaje);
                $("#permanecemayortiempo").val(datosAnt2.permanecemayortiempo);
                $("#acudienteIdParentesco").val(datosAnt2.parentesco_idparentesco);
                
            }
        },'json');
    }
    
    function cargaAntePreFono(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAntePreFono", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAnt3){
            for (var i in dataAnt3)
            {
                datosAnt3 = dataAnt3[i];
                $("#idantecedente3").val(datosAnt3.idantecedente);
                $("#numeroembarazos").val(datosAnt3.numeroembarazos);
                $("#abortos").val(datosAnt3.abortos);
                $("#mesaborto").val(datosAnt3.mesaborto);
                $("#mesescontrolembr").val(datosAnt3.mesescontrolembr);
                $("#lugarcontrolembr").val(datosAnt3.lugarcontrolembr);
                $("#convulsiones").val(datosAnt3.convulsiones);
                if(datosAnt3.drogadiccion == 'S'){$('#drogadiccion').prop("checked", true);}else{$('#drogadiccion').prop("checked", false);}
                if(datosAnt3.alcoholismo == 'S'){$('#alcoholismo').prop("checked", true);}else{$('#alcoholismo').prop("checked", false);}
                if(datosAnt3.tabaquismo == 'S'){$('#tabaquismo').prop("checked", true);}else{$('#tabaquismo').prop("checked", false);}
                $("#traumatismo").val(datosAnt3.traumatismo);
                $("#cualtraumatismo").val(datosAnt3.cualtraumatismo);
                $("#toxoplasmosis").val(datosAnt3.toxoplasmosis);
                $("#preclampsia").val(datosAnt3.preclampsia);
                $("#infecciones").val(datosAnt3.infecciones);
                $("#medicamento").val(datosAnt3.medicamento);
                $("#cualmedicamento").val(datosAnt3.cualmedicamento);
                $("#intoxicaciones").val(datosAnt3.intoxicaciones);
                $("#cualintoxicacion").val(datosAnt3.cualintoxicacion);
                $("#alimentacion").val(datosAnt3.alimentacion);
                $("#estadoemocional").val(datosAnt3.estadoemocional);
                $("#otrosantcfono").val(datosAnt3.otrosantcfono);
            }
        },'json');
    }
    
    function cargaAntePerFono(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAntePerFono", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAnt4){
            for (var i in dataAnt4)
            {
                datosAnt4 = dataAnt4[i];
                $("#idantecedente4").val(datosAnt4.idantecedente);
                $("#forceps").val(datosAnt4.forceps);
                $("#circularcordon").val(datosAnt4.circularcordon);
                $("#cefalica").val(datosAnt4.cefalica);
                $("#podalica").val(datosAnt4.podalica);
                $("#antendidohospital").val(datosAnt4.antendidohospital);
                $("#atendidocasa").val(datosAnt4.atendidocasa);
                $("#partera").val(datosAnt4.partera);
                $("#obsrperinatal").val(datosAnt4.obsrperinatal);
            }
        },'json');
    }
    
    function cargaAntePosFono(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAntePosFono", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAnt5){
            for (var i in dataAnt5)
            {
                datosAnt5 = dataAnt5[i];
                $("#idantecedente5").val(datosAnt5.idantecedente);
                $("#llanto").val(datosAnt5.llanto);
                $("#hipoxia").val(datosAnt5.hipoxia);
                $("#cianosis").val(datosAnt5.cianosis);
                $("#oxigeno").val(datosAnt5.oxigeno);
                $("#reanimacion").val(datosAnt5.reanimacion);
                $("#ictericia").val(datosAnt5.ictericia);
                $("#transfusion").val(datosAnt5.transfusion);
                $("#fototerapia").val(datosAnt5.fototerapia);
                $("#meconio").val(datosAnt5.meconio);
                $("#traumatismopost").val(datosAnt5.traumatismopost);
                $("#cualtraumatismopos").val(datosAnt5.cualtraumatismo);
                $("#obsrposnatal").val(datosAnt5.obsrposnatal);
            }
        },'json');
    }
    
    function cargaVivienda(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaVivienda", idpaciente:idpaciente, idhistoria:idhistoria},function(dataV){
            for (var i in dataV)
            {
                datosV = dataV[i];
                $("#estrato").val(datosV.estrato);
                $("#tipovivienda").val(datosV.tipovivienda);
                $("#descripcion").val(datosV.descripcion);
            }
        },'json');
    }
    

    function cargaDlloLeng(idpaciente){
        var id_area = 1;
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaDlloLeng", idpaciente:idpaciente, idhistoria:id_area},function(dataDlloLeng){
            for (var i in dataDlloLeng)
            {
                datosDlloLeng = dataDlloLeng[i];
                $("#frase_idfrase").val(datosDlloLeng.frase_idfrase);
                $("#frase").val(datosDlloLeng.frase);
                $("#silabeo").val(datosDlloLeng.silabeo);
                $("#edadsilabeo").val(datosDlloLeng.edad);
                $("#observacionsilabeo").val(datosDlloLeng.observaciones);
            }
        },'json');
    }
    
    function cargaDlloLeng4(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaDlloLeng4", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDlloLeng){
            for (var i in dataDlloLeng)
            {
                datosDlloLeng = dataDlloLeng[i];
                $("#iddesarrollo").val(datosDlloLeng.iddesarrollo);
                $("#comprensionlenguaje").val(datosDlloLeng.comprensionlenguaje);
                $("#problemasarticulatorios").val(datosDlloLeng.problemasarticulatorios);
                $("#lenguajeinteligible").val(datosDlloLeng.lenguajeinteligible);
            }
        },'json');
    }
    
    function cargaDlloLeng9(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaDlloLeng9", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDlloLeng){
            for (var i in dataDlloLeng)
            {
                datosDlloLeng = dataDlloLeng[i];
                $("#iddesarrollo").val(datosDlloLeng.iddesarrollo);
                $("#seleccionMaterna").val(datosDlloLeng.seleccionMaterna);
                $("#edadmaterna").val(datosDlloLeng.edadmaterna);
                $("#seleccionArtificial").val(datosDlloLeng.seleccionArtificial);
                $("#edadartificial").val(datosDlloLeng.edadartificial);
                $("#seleccionMixta").val(datosDlloLeng.seleccionMixta);
                $("#edadmixta").val(datosDlloLeng.edadmixta);
            }
        },'json');
    }
    
    function cargaDlloLeng91(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaDlloLeng91", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDlloLeng){
            for (var i in dataDlloLeng)
            {
                datosDlloLeng = dataDlloLeng[i];
                $("#iddesarrollo").val(datosDlloLeng.iddesarrollo);
                if(datosDlloLeng.succion == 'S'){$('#succion').prop("checked", true);}else{$('#succion').prop("checked", false);}
                if(datosDlloLeng.deglucion == 'S'){$('#deglucion').prop("checked", true);}else{$('#deglucion').prop("checked", false);}
                if(datosDlloLeng.sialorrea == 'S'){$('#sialorrea').prop("checked", true);}else{$('#sialorrea').prop("checked", false);}
                if(datosDlloLeng.apariciondientes == 'S'){$('#apariciondientes').prop("checked", true);}else{$('#apariciondientes').prop("checked", false);}
                if(datosDlloLeng.masticacion == 'S'){$('#masticacion').prop("checked", true);}else{$('#masticacion').prop("checked", false);}
            }
        },'json');
    }
    
    function cargaDlloLeng10(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaDlloLeng10", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDlloLeng10){
            for (var i in dataDlloLeng10)
            {
                datosDlloLeng10 = dataDlloLeng10[i];
                $("#iddesarrollo").val(datosDlloLeng10.iddesarrollo);
                if(datosDlloLeng10.liquidos == 'S'){$('#liquidos').prop("checked", true);}else{$('#liquidos').prop("checked", false);}
                if(datosDlloLeng10.semisolidos == 'S'){$('#semisolidos').prop("checked", true);}else{$('#semisolidos').prop("checked", false);}
                if(datosDlloLeng10.solidos == 'S'){$('#solidos').prop("checked", true);}else{$('#solidos').prop("checked", false);}
                if(datosDlloLeng10.balanceado == 'S'){$('#balanceado').prop("checked", true);}else{$('#balanceado').prop("checked", false);}
                if(datosDlloLeng10.comesolo == 'S'){$('#comesolo').prop("checked", true);}else{$('#comesolo').prop("checked", false);}
                if(datosDlloLeng10.diurno == 'S'){$('#diurno').prop("checked", true);}else{$('#diurno').prop("checked", false);}
                if(datosDlloLeng10.nocturno == 'S'){$('#nocturno').prop("checked", true);}else{$('#nocturno').prop("checked", false);}
                if(datosDlloLeng10.enuresis == 'S'){$('#enuresis').prop("checked", true);}else{$('#enuresis').prop("checked", false);}
                if(datosDlloLeng10.encopresis == 'S'){$('#encopresis').prop("checked", true);}else{$('#encopresis').prop("checked", false);}
                $("#vision").val(datosDlloLeng10.vision);
                $("#audicion").val(datosDlloLeng10.audicion);
                $("#traumatismos").val(datosDlloLeng10.traumatismos);
                $("#enfprimanos").val(datosDlloLeng10.enfprimanos);
            }
        },'json');
    }
    
    function cargaDlloLeng11(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaDlloLeng11", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDlloLeng11){
            for (var i in dataDlloLeng11)
            {
                datosDlloLeng11 = dataDlloLeng11[i];
                if(i == 0){
                    $("#controlcabeza").val(datosDlloLeng11.seleccion);
                    $("#edadcontrolcabeza").val(datosDlloLeng11.edad);
                }
                if(i == 1){
                    $("#sento").val(datosDlloLeng11.seleccion);
                    $("#edadsento").val(datosDlloLeng11.edad);
                }
                if(i == 2){
                    $("#gateo").val(datosDlloLeng11.seleccion);
                    $("#edadgateo").val(datosDlloLeng11.edad);
                }
                if(i == 3){
                    $("#camino").val(datosDlloLeng11.seleccion);
                    $("#edadcamino").val(datosDlloLeng11.edad);
                }
                if(i == 4){
                    $("#prefmanual").val(datosDlloLeng11.seleccion);
                    $("#edadprefmanual").val(datosDlloLeng11.edad);
                }
                if(i == 5){
                    $("#equilibrio").val(datosDlloLeng11.seleccion);
                    $("#edadequilibrio").val(datosDlloLeng11.edad);
                }
                if(i == 6){
                    $("#motfina").val(datosDlloLeng11.seleccion);
                    $("#edadmotfina").val(datosDlloLeng11.edad);
                }
                if(i == 7){
                    $("#motgruesa").val(datosDlloLeng11.seleccion);
                    $("#edadmotgruesa").val(datosDlloLeng11.edad);
                }
                
            }
        },'json');
    }
    
    function cargaDlloObsr11(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaDlloObsr11", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDlloObsr11){
            for (var i in dataDlloObsr11)
            {
                datosDlloObsr11 = dataDlloObsr11[i];
                $("#iddesarrollo").val(datosDlloObsr11.iddesarrollo);
                $("#obsrmotor").val(datosDlloObsr11.obsrmotor);
            }
        },'json');
    }
    
    function cargaDlloLeng12(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaDlloLeng12", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDlloLeng12){
            for (var i in dataDlloLeng12)
            {
                datosDlloLeng12 = dataDlloLeng12[i];
                if(i == 0){
                    $("#succiondigital").val(datosDlloLeng12.seleccion);
                    $("#edadsucciondigital").val(datosDlloLeng12.edad);
                }
                if(i == 1){
                    $("#balanceo").val(datosDlloLeng12.seleccion);
                    $("#edadbalanceo").val(datosDlloLeng12.edad);
                }
                if(i == 2){
                    $("#onicofagia").val(datosDlloLeng12.seleccion);
                }
                if(i == 3){
                    $("#musarana").val(datosDlloLeng12.seleccion);
                }
                if(i == 4){
                    $("#golpea").val(datosDlloLeng12.seleccion);
                }
                if(i == 5){
                    $("#arrancacabello").val(datosDlloLeng12.seleccion);
                }
                if(i == 6){
                    $("#aleteo").val(datosDlloLeng12.seleccion);
                }
                
            }
        },'json');
    }
    
    
    function cargaDlloObsr12(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaDlloObsr12", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDlloObsr12){
            for (var i in dataDlloObsr12)
            {
                datosDlloObsr12 = dataDlloObsr12[i];
                $("#iddesarrollo").val(datosDlloObsr12.iddesarrollo);
                $("#otroscomportamientos").val(datosDlloObsr12.otroscomportamientos);
            }
        },'json');
    }
    
    function cargaDlloLeng13(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaDlloLeng13", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDlloLeng13){
            for (var i in dataDlloLeng13)
            {
                datosDlloLeng13 = dataDlloLeng13[i];
                $("#iddesarrollo").val(datosDlloLeng13.iddesarrollo);
                if(datosDlloLeng13.tranquilo == 'S'){$('#tranquilo').prop("checked", true);}else{$('#tranquilo').prop("checked", false);}
                if(datosDlloLeng13.intranquilo == 'S'){$('#intranquilo').prop("checked", true);}else{$('#intranquilo').prop("checked", false);}
                if(datosDlloLeng13.insonmio == 'S'){$('#insonmio').prop("checked", true);}else{$('#insonmio').prop("checked", false);}
                if(datosDlloLeng13.duermesolo == 'S'){$('#duermesolo').prop("checked", true);}else{$('#duermesolo').prop("checked", false);}
                $("#conquienduerme").val(datosDlloLeng13.conquienduerme);
                $("#obsrsueno").val(datosDlloLeng13.obsrsueno);
            }
        },'json');
    }
    
    
    function cargaDlloLeng14(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaDlloLeng14", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDlloLeng14){
            for (var i in dataDlloLeng14)
            {
                datosDlloLeng14 = dataDlloLeng14[i];
                //$("#iddesarrollo").val(datosDlloLeng14.iddesarrollo);
                if(datosDlloLeng14.inquieto == 'S'){$('#inquieto').prop("checked", true);}else{$('#inquieto').prop("checked", false);}
                if(datosDlloLeng14.pasivo == 'S'){$('#pasivo').prop("checked", true);}else{$('#pasivo').prop("checked", false);}
                if(datosDlloLeng14.distraido == 'S'){$('#distraido').prop("checked", true);}else{$('#distraido').prop("checked", false);}
                if(datosDlloLeng14.impulsivo == 'S'){$('#impulsivo').prop("checked", true);}else{$('#impulsivo').prop("checked", false);}
                if(datosDlloLeng14.sociable == 'S'){$('#sociable').prop("checked", true);}else{$('#sociable').prop("checked", false);}
                if(datosDlloLeng14.destructor == 'S'){$('#destructor').prop("checked", true);}else{$('#destructor').prop("checked", false);}
                if(datosDlloLeng14.peleador == 'S'){$('#peleador').prop("checked", true);}else{$('#peleador').prop("checked", false);}
                if(datosDlloLeng14.desatento == 'S'){$('#desatento').prop("checked", true);}else{$('#desatento').prop("checked", false);}
                if(datosDlloLeng14.timido == 'S'){$('#timido').prop("checked", true);}else{$('#timido').prop("checked", false);}
                if(datosDlloLeng14.independiente == 'S'){$('#independiente').prop("checked", true);}else{$('#independiente').prop("checked", false);}
                $("#estanimocomun").val(datosDlloLeng14.estanimocomun);
                $("#fobias").val(datosDlloLeng14.fobias);
                $("#juegopreferido").val(datosDlloLeng14.juegopreferido);
                $("#personaspreferidas").val(datosDlloLeng14.personaspreferidas);
                $("#amigosfacil").val(datosDlloLeng14.amigosfacil);
                $("#compartejuego").val(datosDlloLeng14.compartejuego);
                $("#fatigabilidad").val(datosDlloLeng14.fatigabilidad);
                $("#conductasexual").val(datosDlloLeng14.conductasexual);
                $("#obsrconducta").val(datosDlloLeng14.obsrconducta);
            }
        },'json');
    }
    
    
    function cargaDlloLeng15(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaDlloLeng15", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDlloLeng15){
            for (var i in dataDlloLeng15)
            {
                datosDlloLeng15 = dataDlloLeng15[i];
                $("#iddesarrollo").val(datosDlloLeng15.iddesarrollo);
                $("#neurologia").val(datosDlloLeng15.neurologia);
                $("#tiemponeurologia").val(datosDlloLeng15.tiemponeurologia);
                $("#obsrneurologia").val(datosDlloLeng15.obsrneurologia);
                
                $("#fonoaudiologia").val(datosDlloLeng15.fonoaudiologia);
                $("#tiempofonoaudiologia").val(datosDlloLeng15.tiempofonoaudiologia);
                $("#obsrfonoaudiologia").val(datosDlloLeng15.obsrfonoaudiologia);
                
                $("#teo").val(datosDlloLeng15.teo);
                $("#tiempoteo").val(datosDlloLeng15.tiempoteo);
                $("#obsrteo").val(datosDlloLeng15.obsrteo);
                
                $("#fisioterapia").val(datosDlloLeng15.fisioterapia);
                $("#tiempofisioterapia").val(datosDlloLeng15.tiempofisioterapia);
                $("#obsrfisioterapia").val(datosDlloLeng15.obsrfisioterapia);
                
                $("#psico").val(datosDlloLeng15.psico);
                $("#tiempopsico").val(datosDlloLeng15.tiempopsico);
                $("#obsrpsico").val(datosDlloLeng15.obsrpsico);
                
                $("#farmacologio").val(datosDlloLeng15.farmacologio);
                $("#tiempofarmacologio").val(datosDlloLeng15.tiempofarmacologio);
                $("#obsrfarmacologio").val(datosDlloLeng15.obsrfarmacologio);
                
                $("#cuidadosesp").val(datosDlloLeng15.cuidadosesp);
                $("#tiempocuidadosesp").val(datosDlloLeng15.tiempocuidadosesp);
                $("#obsrcuidadosesp").val(datosDlloLeng15.obsrcuidadosesp);
            }
        },'json');
    }
    
    function cargaDlloLeng16(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaDlloLeng16", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDlloLeng16){
            for (var i in dataDlloLeng16)
            {
                datosDlloLeng16 = dataDlloLeng16[i];
                $("#iddesarrollo").val(datosDlloLeng16.iddesarrollo);
                $("#otrostratamieto").val(datosDlloLeng16.otrostratamieto);
            }
        },'json');
    }
    
    function cargaInfEsc(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaInfEsc", idpaciente:idpaciente, idhistoria:idhistoria},function(dataIE){
            for (var i in dataIE)
            {
                datosIE = dataIE[i];
                $("#idhistoriaescolar").val(datosIE.idhistoriaescolar);
                $("#escolaridad").val(datosIE.escolaridad);
                $("#motivoEsc").val(datosIE.motivoEsc);
                $("#edadnivelinicio").val(datosIE.edadnivelinicio);
                $("#nivelesrepitencia").val(datosIE.nivelesrepitencia);
                $("#cualesniveles").val(datosIE.cualesniveles);
                $("#areasdificultad").val(datosIE.areasdificultad);
                $("#aptitudhabilidadesdest").val(datosIE.aptitudhabilidadesdest);
                $("#procesoadaptador").val(datosIE.procesoadaptador);
                $("#actitudfrenteambesc").val(datosIE.actitudfrenteambesc);
                $("#apoyofamiliar").val(datosIE.apoyofamiliar);
                $("#observacinoesgen").val(datosIE.observacinoesgen);

            }
        },'json');
    }
    
    function cargaAlimEfi(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAlimEfi", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAE){
            for (var i in dataAE)
            {
                datosAE = dataAE[i];
                $("#idseleccionalimentacion").val(datosAE.idseleccionalimentacion);
                $("#alimentacionayuda").val(datosAE.dependencia_iddependencia);
                $("#alimentacion_idalimentacion").val(datosAE.alimentacion_idalimentacion);
                
            }
        },'json');
    }
    
    function cargaAlimEfi2(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAlimEfi2", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAE2){
            for (var i in dataAE2)
            {
                datosAE2 = dataAE2[i];
                $("#idseleccionalimentacion").val(datosAE2.idseleccionalimentacion);
                $("#decidealimentos").val(datosAE2.dependencia_iddependencia);
                $("#alimentacion_idalimentacion").val(datosAE2.alimentacion_idalimentacion);
                
            }
        },'json');
    }
    
    function cargaAlimEfi3(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAlimEfi3", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAE3){
            for (var i in dataAE3)
            {
                datosAE3 = dataAE3[i];
                $("#idseleccionalimentacion").val(datosAE3.idseleccionalimentacion);
                if(datosAE3.solido == 'S'){$('#solido').prop("checked", true);}else{$('#solido').prop("checked", false);}
                if(datosAE3.semisolido == 'S'){$('#semisolido').prop("checked", true);}else{$('#semisolido').prop("checked", false);}
                if(datosAE3.pure == 'S'){$('#pure').prop("checked", true);}else{$('#pure').prop("checked", false);}
                if(datosAE3.compota == 'S'){$('#compota').prop("checked", true);}else{$('#compota').prop("checked", false);}
            }
        },'json');
    }
    
    function cargaAlimEfi4(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAlimEfi4", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAE4){
            for (var i in dataAE4)
            {
                datosAE4 = dataAE4[i];
                $("#idseleccionalimentacion").val(datosAE4.idseleccionalimentacion);
                $("#perdidapeso").val(datosAE4.seleccion);
                $("#cuantoskilos").val(datosAE4.texto);
                $("#idalimentacion").text(datosAE4.idalimentacion);
            }
        },'json');
    }
    
    function cargaAlimEfi5(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAlimEfi5", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAE5){
            for (var i in dataAE5)
            {
                datosAE5 = dataAE5[i];
                $("#idseleccionalimentacion").val(datosAE5.idseleccionalimentacion);
                $("#interesalimentarse").val(datosAE5.seleccion);
                $("#idalimentacion").text(datosAE5.idalimentacion);
            }
        },'json');
    }
    
    function cargaAlimEfi6(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAlimEfi6", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAE6){
            for (var i in dataAE6)
            {
                datosAE6 = dataAE6[i];
                $("#idseleccionalimentacion").val(datosAE6.idseleccionalimentacion);
                $("#rechazoalimento").val(datosAE6.seleccion);
                $("#cualalimento").val(datosAE6.texto);
                $("#idalimentacion").text(datosAE6.idalimentacion);
            }
        },'json');
    }
    
    
    function cargaAlimEfi7(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAlimEfi7", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAE7){
            for (var i in dataAE7)
            {
                datosAE7 = dataAE7[i];
                $("#idseleccionalimentacion").val(datosAE7.idseleccionalimentacion);
                if(datosAE7.liquidoclaro == 'S'){$('#liquidoclaro').prop("checked", true);}else{$('#liquidoclaro').prop("checked", false);}
                if(datosAE7.liquidoespeso == 'S'){$('#liquidoespeso').prop("checked", true);}else{$('#liquidoespeso').prop("checked", false);}
                $("#idalimentacion").text(datosAE7.idalimentacion);
            }
        },'json');
    }
    
    function cargaAlimEfi8(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAlimEfi8", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAE8){
            for (var i in dataAE8)
            {
                datosAE8 = dataAE8[i];
                $("#idseleccionalimentacion").val(datosAE8.idseleccionalimentacion);
                $("#comerapido").val(datosAE8.seleccion);
                $("#idalimentacion").text(datosAE8.idalimentacion);
            }
        },'json');
    }
    
    function cargaAlimEfi9(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAlimEfi9", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAE9){
            for (var i in dataAE9)
            {
                datosAE9 = dataAE9[i];
                $("#idseleccionalimentacion").val(datosAE9.idseleccionalimentacion);
                $("#actividadcome").val(datosAE9.seleccion);
                $("#cualactividad").val(datosAE9.texto);
                $("#idalimentacion").text(datosAE9.idalimentacion);
            }
        },'json');
    }
    
    function cargaAlimEfi10(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAlimEfi10", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAE10){
            for (var i in dataAE10)
            {
                datosAE10 = dataAE10[i];
                $("#idseleccionalimentacion").val(datosAE10.idseleccionalimentacion);
                if(datosAE10.saliva == 'S'){$('#saliva').prop("checked", true);}else{$('#saliva').prop("checked", false);}
                if(datosAE10.alimento == 'S'){$('#alimento').prop("checked", true);}else{$('#alimento').prop("checked", false);}
                if(datosAE10.agua == 'S'){$('#agua').prop("checked", true);}else{$('#agua').prop("checked", false);}
                $("#observaciones").val(datosAE10.observaciones);
                $("#idalimentacion").text(datosAE10.idalimentacion);
            }
        },'json');
    }
    
    function cargaAlimEfi11(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAlimEfi11", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAE11){
            for (var i in dataAE11)
            {
                datosAE11 = dataAE11[i];
                $("#idseleccionalimentacion").val(datosAE11.idseleccionalimentacion);
                $("#neumonias").val(datosAE11.seleccion);
                $("#neumoniasfrec").val(datosAE11.texto);
                $("#idalimentacion").text(datosAE11.idalimentacion);
            }
        },'json');
    }
    
    function cargaAyudaPar12(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAyudaPar12", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAE12){
            for (var i in dataAE12)
            {
                datosAE12 = dataAE12[i];
                $("#idayudaparental").val(datosAE12.idayudaparental);
                $("#ayudaparental").val(datosAE12.seleccion);
                $("#motivoayudaparental").val(datosAE12.motivo);
                $("#cualayudaparental").val(datosAE12.idalimentacionparental);
                $("#tiempoayudaparental").val(datosAE12.duracion);
                $("#idalimentacion").text(datosAE12.idalimentacion);
            }
        },'json');
    }
    
    function cargaAlimEfi13(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAlimEfi13", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAE13){
            for (var i in dataAE13)
            {
                datosAE13 = dataAE13[i];
                $("#idseleccionalimentacion").val(datosAE13.idseleccionalimentacion);
                $("#comerestofamilia").val(datosAE13.seleccion);
                $("#porquecomerestofamilia").val(datosAE13.texto);
                $("#idalimentacion").text(datosAE13.idalimentacion);
            }
        },'json');
    }
    
    function cargaAlimEfi14(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAlimEfi14", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAE14){
            for (var i in dataAE14)
            {
                datosAE14 = dataAE14[i];
                $("#idseleccionalimentacion").val(datosAE14.idseleccionalimentacion);
                $("#comeotraspersonas").val(datosAE14.seleccion);
                $("#obsrcomunicativos").val(datosAE14.observaciones);
                $("#idalimentacion").text(datosAE14.idalimentacion);
            }
        },'json');
    }
    
    function cargaImpresionDiag(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaImpresionDiag", idpaciente:idpaciente, idhistoria:idhistoria},function(dataImpD){
            for (var i in dataImpD)
            {
                datosImpD = dataImpD[i];
                //$("#obsrcomunicativos").val(datosImpD.observaciones);
                $("#impresiondiagnostica").val(datosImpD.impresiondiagnostica);
            }
        },'json');
    }
    
    function cargaAnteDif(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAnteDif", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDif){
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
    
    function cargaDiagnosticoPrevio(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarDiagnosticoPrevio", idpaciente:idpaciente, idhistoria:idhistoria},function(data){
            for (var i in datam)
            {
                datos = data[i];
                $("#diagnosticos").text(datos.diagnosticos);
                
            }
        },'json');
    }
    
    function cargaAnteDif(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultaAnteDif", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDif){
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
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarTratamientos", idhistoria:idhistoria},function(data){
            $("#tratamientosProblema").html(data);
        });
    }

    function cargarTratamientosUsuario(idpaciente){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarTratamientosUsuario", idpaciente:idpaciente},function(data){
            $("#tratamientosProblema").html(data);
        });
    }
    
    ////TAB ANTECEDENTES
    
    function cargaAntFamiliar(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarAntFamiliar", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAntFam){
            for (var i in dataAntFam)
            {
                datosAntFam = dataAntFam[i];
                $("#idantecedente2").val(datosAntFam.idantecedente);
                $("#lineamaterna").val(datosAntFam.lineamaterna);
                $("#lineapaterna").text(datosAntFam.lineapaterna);
                
            }
        },'json');
    }
    
    function cargaAntPrenatal(idpaciente){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarIdHistoriaPsico", idpaciente:idpaciente},function(dataPsico){
            $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarAntPrenatal", idpaciente:idpaciente, idhistoria:dataPsico},function(dataAntPre){
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
        });
    }
    
    
    function cargaAntParto(idpaciente){

        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarIdHistoriaPsico", idpaciente:idpaciente},function(dataPsico){
            $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarAntParto", idpaciente:idpaciente, idhistoria:dataPsico},function(dataAntParto){
                for (var i in dataAntParto)
                {
                    datosAntParto = dataAntParto[i];
                    $("#idantecedente4").val(datosAntParto.idantecedente);
                    $("#duracion").val(datosAntParto.duracion);
                    $("#peso").val(datosAntParto.peso);
                    $("#talla").val(datosAntParto.talla);
                    $("#incubadora").val(datosAntParto.incubadora);
                    $("#parto").val(datosAntParto.parto);
                    $("#dificultades").val(datosAntParto.dificultades);
                }
            },'json');
        });
    }
    
    
    ////TAB POSTNATALES
    
    function cargaAntPostnatal(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarAntPostnatal", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAntPost){
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
    
    ////TAB LENGUAJE
    
    function cargaDllolenguaje(idpaciente){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarIdHistoriaPsico", idpaciente:idpaciente},function(dataPsico){
            $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarDllolenguaje", idpaciente:idpaciente, idhistoria:dataPsico},function(dataDlloLeng){
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
        });
    }
    
    function cargaDesarrollo(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarDesarrollo", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDllo){
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
    
    function cargaEleAlim(idpaciente){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarIdHistoriaPsico", idpaciente:idpaciente},function(dataPsico){
            $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarEleAlim", idpaciente:idpaciente, idhistoria:dataPsico},function(dataEleAlim){
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
        });
    }
    
    function cargaDifComida(idpaciente){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarIdHistoriaPsico", idpaciente:idpaciente},function(dataPsico){
            $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarDifComida", idpaciente:idpaciente, idhistoria:dataPsico},function(dataComida){
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
        });
    }
    
    
    
    function cargaDifHabla(idpaciente,idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarDifHabla", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDifHabla){
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
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarComNoVerbal", idpaciente:idpaciente, idhistoria:idhistoria},function(dataNoVerbal){
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
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarDlloSoEmocional", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDlloEmo){
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
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarResistencia", idpaciente:idpaciente, idhistoria:idhistoria},function(dataResis){
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
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarAuditiva", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAU){
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
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarVisual", idpaciente:idpaciente, idhistoria:idhistoria},function(dataVisual){
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
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consutlarReceptor", idpaciente:idpaciente, idhistoria:idhistoria},function(dataRec){
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
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consutlarSueno", idpaciente:idpaciente, idhistoria:idhistoria},function(dataSueno){
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
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarDesempeno", idpaciente:idpaciente, idhistoria:idhistoria},function(dataDES){
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
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarHigiene", idpaciente:idpaciente, idhistoria:idhistoria},function(dataHigiene){
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
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarHabilidades", idpaciente:idpaciente, idhistoria:idhistoria},function(dataHAB){
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
        
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarPrendasVestir", idhistoria:idhistoria, verBoton:verBoton},function(data){
            $("#prendasVestir").html(data);
        });
    }
    
    function cargaHabilidadMotriz(idhistoria){
        $.post("../mod_aplicacion/fonoaudiologia/admin_historia_fono.php",{opcion:"consultarHabilidadMotriz", idhistoria:idhistoria},function(data){
            $("#habilidadMotriz").html(data);
        });
    }
    ///////////////////////
    
    
    function editarCitaInformacion(idpaciente, idcita, idtipocita) {
        var agenda = 1;
        var padre = 2;
        var madre = 3;
        $.post("../mod_aplicacion/fonoaudiologia/admin_citainformacion.php",{opcion:"consultar", idpaciente:idpaciente, idcita:idcita, idtipocita:idtipocita},function(data){
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
                $("#pacienteIdTipoDocumento").val(datos.pacienteTipoDocumento);
                $("#pacienteDocumento").val(datos.pacienteDocumento);
                $("#pacienteDocumento").text(datos.pacienteDocumento);
                $("#pacienteNombres").val(datos.pacienteNombres);
                
                $("#lbpacienteNombres").text(datos.pacienteNombres+" "+datos.pacientePrimerApellido+" "+datos.pacienteSegundoApellido);
                $("#lbpacienteFechaNacimiento").text(datos.pacienteFechaNacimiento);
                $("#lbpacienteEdad").text(datos.pacienteEdad);
                $("#lbpacienteMeses").text(datos.pacienteMeses);
                $("#lbpacienteDireccion").text(datos.pacientedireccion);
                $("#lbpacienteCiudad").text(datos.pacienteciudadresidencia);
                $("#lbpacienteIdEps").text(datos.pacienteEps);
                $("#pacienteDireccion").val(datos.pacientedireccion);
                $("#pacientePrimerApellido").val(datos.pacientePrimerApellido);
                $("#pacienteSegundoApellido").val(datos.pacienteSegundoApellido);
                $("#pacienteLugarNacimiento").val(datos.pacienteLugarNacimiento);
                $("#pacienteFechaNacimiento").val(datos.pacienteFechaNacimiento);
                $("#pacienteEdad").val(datos.pacienteEdad);
                $("#pacienteMeses").val(datos.pacienteMeses);
                $("#pacienteIdGenero").html("<option value='"+datos.pacienteIdGenero+"'>"+datos.genero+"</option>");
                $("#pacienteEscolaridad").val(datos.pacienteEscolaridad);
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
                $("#acudienteParentescoUsuario").val(datos.acudienteParentesco);
                $("#acudienteNombres").val(datos.acudienteNombres+" "+datos.acudientePrimerApellido+" "+datos.acudienteSegundoApellido);
                $("#acudientePrimerApellido").val(datos.acudientePrimerApellido);
                $("#acudienteSegundoApellido").val(datos.acudienteSegundoApellido);
                $("#acudienteEdad").val(datos.acudienteEdad);
                $("#acudienteIdEscolaridad").html("<option value='"+datos.acudienteIdEscolaridad+"'>"+datos.acudienteEscolaridad+"</option>");
                $("#acudienteOcupacion").val(datos.acudienteOcupacion);
                $("#acudienteDireccion").val(datos.acudienteDireccion);
                $("#acudienteTelefonoFijo").val(datos.acudienteTelefonoFijo);
                $("#acudienteTelefonoCelular").val(datos.acudienteTelefonoCelular);
                $("#acudienteEmail").val(datos.acudienteEmail);
                $("#motivoConsulta").text(datos.motivoconsulta);
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

    function generarArchivoPdf(idvehiculo){
        window.location.href='psicologia_programacion_pdf.php?var='+idvehiculo;
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

    function generarInformePdf(idpaciente,idinforme){
        window.location.href='fonoaudiologia_informe_pdf.php?idpaciente='+idpaciente+'&idinforme='+idinforme;
    }