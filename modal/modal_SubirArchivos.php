<div class="modal fade" id="modal_SubirArchivos" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <h4 class="modal-title" id="myModalLabel">
                    Cargue de archivos
                </h4>
            </div><!-- .modal-header alert alert-info-->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <!-- Change /upload-target to your upload address -->
                            <form action="subirArchivo.php" class="dropzone" enctype="multipart/form-data">
                                <div class="fallback">
                                    <input type="file" name="file" multiple id="archivos">
                                </div>
                                <input type="hidden" id="carpeta" name="carpeta">
                                <div class="listfiles">
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- .modal-header alert alert-success-->
            
            <div class="modal-footer">
                <button type="button" id="cerrar" class="btn btn-default" data-dismiss="modal">
                    Cerrar
                </button>
            </div><!-- .modal-footer -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal fade -->




