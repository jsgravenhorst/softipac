$(document).ready(function(){
    cargarMenu();
    
});

    function cargarMenu() {
        $.post("Admin/mod_aplicacion/cargarmenu.php",function(data){
            $("#proyectos-section").html(data);
        });
    }
    
    
    function cargarMenu(){
        
        $("#proyectos").val("<a href='#proyectos-section'>Projectes irrrrr Estudis</a>");
        
        
        /*$.post("Admin/mod_aplicacion/cargarmenu.php", function(data){
				for (var i in data)
                {
                    datos = data[i];
                    $("#proyectos").val(datos.proyectos);
                    $("#urb_sect").val(datos.urb_sect);
                    
                }
			},'json');*/
    }