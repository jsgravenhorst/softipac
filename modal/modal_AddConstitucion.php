<div class="modal fade" id="modal_AddConstitucion" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h4 class="modal-title" id="myModalLabel">
                    Constituci&oacute;n Familiar
                </h4>
            </div><!-- .modal-header alert alert-info-->
            <div class="modal-body">
                <div id="mensajeregistro"></div>
                <form role="form" id ="formConstitucion" method="post" action="" enctype="multipart/form-data" name='datos'>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="idpaciente" id="idpaciente" type="hidden" class="form-control" value="<?php echo"$idpaciente";?>">
                                <label>Nombres</label>
                                <input name='nombresConstitucion' id='nombresConstitucion' type="text" class="form-control" placeholder="Nombres">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input name='apellidosConstitucion' id='apellidosConstitucion' type="text" class="form-control" placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Edad</label>
                                <input name='edadConstitucion' id='edadConstitucion' type="text" class="form-control" placeholder="Edad">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Parentesco</label>
                                <select name="acudienteIdParentesco" id="acudienteIdParentesco" class="form-control" required="required">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ocupaci&oacute;n</label>
                                <input name='ocupacionConstitucion' id='ocupacionConstitucion' type="text" class="form-control" placeholder="Ocupaci&oacute;n">
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