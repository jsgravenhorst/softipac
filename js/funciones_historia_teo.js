    $(document).ready(function () {

    });

    //Actualiza los datos tab anamnesis de la historia clinica de terapia ocupacional
    $("#formUPAnamnesis").on("submit", function(event){
        event.preventDefault(); //neutralizar el formulario
        var formData = new FormData(document.getElementById("formUPAnamnesis"));
        formData.append("opcion", "actualizarAnamnesis");

        $.ajax({
            url:"../mod_aplicacion/terapiaocupacional/admin_historia_terapia_ocupacional.php",
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

    function crearHistoria(idpaciente, idcita, idarea, idTerapeuta)
    {
        $.post("../mod_aplicacion/terapiaocupacional/admin_historia_terapia_ocupacional.php",{opcion:"insertarhistoria", idpaciente:idpaciente, idcita:idcita, idarea:idarea, idTerapeuta:idTerapeuta}, function (data) {
            if ( data > 0)
            {
                $(location).attr('href','terapia_ocupacional_historia.php?var='+idpaciente+'&idcita='+idcita+'&idhistoria='+data);
            }else
            {
                alert("No se pudo crear la Historia");
            }

            }
        )
    }

    function consultarHistoria(idpaciente, idcita, idarea, idTerapeuta)
    {
        $.post("../mod_aplicacion/admin_historia_terapia_ocupacional.php",{opcion:"consultarhistoria", idpaciente:idpaciente, idcita:idcita, idarea:idarea},function (data)
            {
                if ( data > 0 )
                {
                    $(location).attr('href','terapia_ocupacional_historia.php?var='+idpaciente+'&cita='+idcita+'&idhistoria='+data+'&idarea='+idarea);
                }else
                {
                    crearHistoria(idpaciente, idcita, idarea, idTerapeuta)
                }

            });
    }

    function cargarFechaProgramacion(idpaciente)
    {
        $.post("../mod_aplicacion/terapiaocupacional/admin_historia_terapia_ocupacional.php",{opcion:"consultarFechaProgramacion",idpaciente:idpaciente},function (data) {
            for ( var i in data)
            {
                datos = data[i];
                $("#fechaProgramacion").val(datos.fecha_prog);
            }
        },'json');
    }

    function cargarDatosPaciente(idpaciente)
    {
       $.post("../mod_aplicacion/terapiaocupacional/admin_historia_terapia_ocupacional.php",{opcion:"consultarDatosPaciente",idpaciente:idpaciente},function (data) {
           for ( var i in data)
           {
               datos = data[i];
               $("#pacienteIdTipoDocumento").val(datos.tipoDocumento);
               $("#pacienteDocumento").val(datos.documento);
               $("#pacienteNombres").val(datos.nombres);
               $("#pacientePrimerApellido").val(datos.primerapellido);
               $("#pacienteSegundoApellido").val(datos.segundoapellido);
               $("#pacienteFechaNacimiento").val(datos.fechanacimiento);
               $("#pacienteEdad").val(datos.edad);
               $("#pacienteEps").val(datos.razonsocial);
               $("#pacienteEscolaridad").val(datos.escolaridad);
           }
       },'json');
    }























