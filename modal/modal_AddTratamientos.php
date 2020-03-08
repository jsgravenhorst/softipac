<div class="modal fade" id="modal_AddTratamientos" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h4 class="modal-title" id="myModalLabel">
                    Tratamientos Anteriores respecto a las dificultades
                </h4>
            </div><!-- .modal-header alert alert-info-->
            <div class="modal-body">
                <div id="mensajeregistro"></div>
                <form role="form" id ="formTratamiento" method="post" action="" enctype="multipart/form-data" name='datos'>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="idhistoriatrat" id="idhistoriatrat" type="hidden" class="form-control" value="<?php echo"$idhist";?>">
                            <label>Instituci&oacute;n</label>
                            <input name='tratamientoProblemaInstitucion' id='tratamientoProblemaInstitucion' type="text" class="form-control" required="required">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Profesi&oacute;n</label>
                            <input name='tratamientoProblemaProfesion' id='tratamientoProblemaProfesion' type="text" class="form-control" required="required">
                        </div>
                    </div>
                    
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tiempo</label>
                            <input name='tratamientoProblemaTiempo' id='tratamientoProblemaTiempo' type="text" class="form-control" required="required">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Edad Inicio</label>
                            <input name='tratamientoProblemaEdad' id='tratamientoProblemaEdad' type="text" class="form-control" required="required">
                            <!--<input name='tratamientoProblemaEdad' id='tratamientoProblemaEdad' type="number" min="1" step="1" value="1" class="form-control" required="required">-->
                            
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Duraci&oacute;n</label>
                            <input name='tratamientoProblemaDuracion' id='tratamientoProblemaDuracion' type="text" class="form-control" required="required">
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Resultados</label>
                            <textarea class="form-control" rows="5" name="tratamientoProblemaResultados" id="tratamientoProblemaResultados" required="required"></textarea>
                        </div>
                    </div>
                </div>
            </div><!-- .modal-header alert alert-success-->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-toggle="modal">Guardar</button>
                <button type="button" id="cerrar" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div><!-- .modal-footer -->
            </form>
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal fade -->