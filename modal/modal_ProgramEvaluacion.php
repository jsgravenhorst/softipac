<div class="modal fade" id="modal_ProgramEvaluacion" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h4 class="modal-title" id="myModalLabel">
                    Programaci&oacute;n Evaluaci&oacute;n <label id="pacienteprogramacion"></label>
                </h4>
            </div><!-- .modal-header alert alert-info-->
            <div class="modal-body">
                <div id="mensajeregistro"></div>
                <form role="form" id ="formProgramacion" method="post" action="" enctype="multipart/form-data" name='datos'>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha Cita *</label><br>
                                <input name="fecha" id="fecha" type="text" placeholder="yyyy-dd-mm" required="required" class="date-picker form-control">
                            </div> <!-- .form-group -->
                        </div><!-- .col-md-4 -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Hora Inicial *</label><br>
                                <input name="horaini" id="horaini" type="text" class="form-control" required="required">
                                <!--<select name="horacita" id="horacita" class="form-control">
                                    <option>Seleccione</option>
                                </select>-->
                            </div><!-- .form-group -->
                        </div> <!-- .col-md-2 -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Hora Final *</label><br>
                                <input name="horafin" id="horafin" type="text" class="form-control" required="required">
                                <!--<select name="horacita" id="horacita" class="form-control">
                                    <option>Seleccione</option>
                                </select>-->
                            </div><!-- .form-group -->
                        </div> <!-- .col-md-2 -->
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Area </label><br>
                                <select name="area" id="area" class="form-control">
                                    <option value="">Seleccione</option>
                                    <option value="1">Psicolog&iacute;a</option>
                                    <option value="2">Fonoaudiolog&iacute;a</option>
                                    <option value="3">Terapia Ocupacional</option>
                                    <option value="4">Fisioterapia</option>
                                    <option value="5">Educaci&oacute;n Especial</option>
                                    <option value="6">Informaci&oacute;n</option>
                                    <option value="7">Todos los Terapeutas</option>
                                </select>
                            </div><!-- .form-group -->
                        </div> <!-- .col-md-2 -->
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Profesional </label><br>
                                <select name="profesional" id="profesional" class="form-control">
                                    <option value="">Seleccione</option>
                                    <option value="1">Angie Tuquerres</option>
                                    <option value="2">Aura Milena Garay</option>
                                    <option value="3">Lineth Maquilon</option>
                                    <option value="4">Nicolas Valencia</option>
                                    <option value="5">Maria Cristina Rincon</option>
                                </select>
                            </div><!-- .form-group -->
                        </div> <!-- .col-md-2 -->
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Lugar de Evaluci&oacute;n</label>
                                <input name='lugarevaluacion' id='lugarevaluacion' type="text" class="form-control" required="required">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Observaciones</label>
                                <textarea class="form-control" rows="5" name="observaciones" id="observaciones" required="required"></textarea>
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