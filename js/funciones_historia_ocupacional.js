    $(document).ready(function(){

        //Actualiza los datos tab anamnesis de la historia clinica de fono
        $("#formUPAnamnesisTO").on("submit", function(event){
            event.preventDefault(); //neutralizar el formulario
            var formData = new FormData(document.getElementById("formUPAnamnesisTO"));
            formData.append("opcion", "actualizarAnamnesisTO");

            $.ajax({
                url:"../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",
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

    function crearHistoriaTO(idpaciente, idcita, idarea, idTerapeuta){
        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"insertarhistoria", idpaciente:idpaciente, idcita:idcita, idarea:idarea, idTerapeuta:idTerapeuta},function(data){
            if(data > 0){
                $(location).attr('href','ocupacional_historia.php?var='+idpaciente+'&cita='+idcita+'&idhist='+data);
            }else{
                alert("No se pudo crear la Historia");
            }
        });
    }

    function consultaHistoriaTO(idpaciente, idcita, idarea, idTerapeuta) {
        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultarhistoria", idpaciente:idpaciente, idcita:idcita, idarea:idarea},function(data){
            if(data > 0){
                $(location).attr('href','ocupacional_historia.php?var='+idpaciente+'&cita='+idcita+'&idhist='+data+'&idarea='+idarea);
            }else{
                crearHistoriaTO(idpaciente, idcita, idarea, idTerapeuta);
            }
        });
    }

    //informe final
    function consultaInformeFinalOcupacional(idpaciente, idcita, idarea, idterapeuta) {
        var idHist;
        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultarIdHistoriaPsico", idpaciente:idpaciente},function(dataPsico){
            idHist = dataPsico;
        });

        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultarInformeFinalFono", idpaciente:idpaciente, idcita:idcita, idarea:idarea}, function(dataCons){
            if(dataCons > 0){
                $(location).attr('href','fonoaudiologia_informes.php?var='+idpaciente+'&cita='+idcita+'&idinforme='+dataCons+'&idhist='+idHist+'&idarea='+idarea+'idTerapeuta'+idterapeuta);
            }else{
                crearInformeFinal(idpaciente, idcita, idarea, idterapeuta);
            }
        });
    }

    function crearInformeFinal(idpaciente, idcita, idarea, idTerapeuta){
        var idHist;
        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultarIdHistoriaPsico", idpaciente:idpaciente},function(dataPsico){
            idHist = dataPsico;
        });

        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"insertarInformeFinalFono", idpaciente:idpaciente, idcita:idcita, idarea:idarea, idTerapeuta:idTerapeuta}, function(dataCrea){
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

        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultarHistoriaPsicoId", idpaciente:idpaciente},function(dataP){
            for (var i in dataP)
            {
                datosP = dataP[i];
                $(".idhistoriapsico").val(datosP.idhistoriaclinica);
            }
        },'json');
    }

    function cargarIdHistoriaPsico(idpaciente){
        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultarIdHistoriaPsico", idpaciente:idpaciente},function(data){
            for (var i in data)
            {
                datos = data[i];
                var idhistoriapsico = datos.idhistoriaclinica;
            }
        },'json');
        return idhistoriapsico;
    }

    function cargaDatosGenerales(idpaciente,idhistoria){
        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultardatos", idpaciente:idpaciente, idhistoria:idhistoria},function(data){
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

    //Se utiliza esta funcion para cargar los datos de historia clinica
    function cargarConstitucion(idpaciente, vista){
        if(vista == "informe"){
            var disabled = "disabled";
        }else{
            var disabled = $("#verBoton").val();
        }

        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultarconstitucion", idpaciente:idpaciente, disabled:disabled},function(data){
            $("#constitucion").html(data);
        });
    }

    ////TAB CONSULTA

    function cargaMotivo(idpaciente,idhistoria){
        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultarmotivo", idpaciente:idpaciente, idhistoria:idhistoria},function(datam){
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

    ////TAB ANTECEDENTES

    function cargaAntFamiliar(idpaciente,idhistoria){
        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultarAntFamiliar", idpaciente:idpaciente, idhistoria:idhistoria},function(dataAntFam){
            for (var i in dataAntFam)
            {
                datosAntFam = dataAntFam[i];
                $("#idantecedente2").val(datosAntFam.idantecedente);
                $("#lineamaterna").val(datosAntFam.lineamaterna);
                $("#lineapaterna").text(datosAntFam.lineapaterna);
            }
        },'json');
    }

    function cargaAntPaciente(idhistoria){
        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultarAntPaciente", idhistoria:idhistoria},function(dataAntPac){
            for (var i in dataAntPac)
            {
                datosAntPac = dataAntPac[i];
                $("#antPersonales").text(datosAntPac.antPersonales);
                $("#antPatologicos").text(datosAntPac.antPatologicos);
                $("#antQuirurgicos").text(datosAntPac.antQuirurgicos);
                $("#antFarmacologicos").text(datosAntPac.antFarmacologicos);
            }
        },'json');
    }

    function cargaAntTerapeuticos(idhistoria){
        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultarAntTerapeuticos", idhistoria:idhistoria},function(dataAntTera){
            for (var i in dataAntTera)
            {
                datosAntTera = dataAntTera[i];
                $("#antDuracion").val(datosAntTera.antDuracion);
                $("#antInstitucion").val(datosAntTera.antInstitucion);
                $("#antquetrabajo").text(datosAntTera.antquetrabajo);
            }
        },'json');
    }

    function cargaAntPrenatal(idpaciente){
        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultarIdHistoriaPsico", idpaciente:idpaciente},function(dataPsico){
            $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultarAntPrenatal", idpaciente:idpaciente, idhistoria:dataPsico},function(dataAntPre){
                for (var i in dataAntPre)
                {
                    datosAntPre = dataAntPre[i];
                    $("#abortivas").val(datosAntPre.abortivas);
                }
            },'json');
        });
    }

    function cargaAntPrenatalTO(idhistoria){
        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultarAntPrenatalTO", idhistoria:idhistoria},function(dataAntPreTO){
            for (var i in dataAntPreTO)
            {
                datosAntPreTO = dataAntPreTO[i];
                $("#embprevios").val(datosAntPreTO.embprevios);
                $("#observacionesparto").val(datosAntPreTO.observacionesparto);
            }
        },'json');
    }

    function cargaAntParto(idpaciente){

        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultarIdHistoriaPsico", idpaciente:idpaciente},function(dataPsico){
            $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultarAntParto", idpaciente:idpaciente, idhistoria:dataPsico},function(dataAntParto){
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


    function cargaAntPostnatalTO(idhistoria){
        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"consultarAntPostnatalTO", idhistoria:idhistoria},function(dataAntPostTO){
            for (var i in dataAntPostTO)
            {
                datosAntPostTO = dataAntPostTO[i];
                $("#obsrposnatal").text(datosAntPostTO.obsrposnatal);
            }
        },'json');
    }

    ///

    function cargarInstitucionGradoDominancia(idhistoria){
        $.post("../mod_aplicacion/ocupacional/admin_historia_ocupacional.php",{opcion:"cargarInstitucionGradoDominancia", idhistoria:idhistoria}, function(dataIGD){
            for (var i in dataIGD)
            {
                datosIGD = dataIGD[i];
                $("#pacienteInstitucion").val(datosIGD.pacienteInstitucion);
                $("#pacienteGrado").val(datosIGD.pacienteGrado);
                $("#pacienteDominancia").val(datosIGD.pacienteDominancia);
            }
        },'json');
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

    function generarArchivoPdf(idvehiculo){
        window.location.href='psicologia_programacion_pdf.php?var='+idvehiculo;
    }

    function generarInformePdf(idpaciente,idinforme){
        window.location.href='fonoaudiologia_informe_pdf.php?idpaciente='+idpaciente+'&idinforme='+idinforme;
    }
