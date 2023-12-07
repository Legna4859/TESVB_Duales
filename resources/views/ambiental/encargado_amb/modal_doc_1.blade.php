<!-- Modal -->
<div  class="modal" :class="{mostrar:modal_pri}" >
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" @click="cerrarModal_pri();">&times;</button>
                <h4 class="modal-title" style=" text-align: center;">@{{  tituloModal}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h5  style="text-align: justify">El estado de las acciones de las revisiones por la dirección previas.</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <label>Selecciona el documento</label>

                                <input type="file" id="file"  class="form-control" accept="application/pdf"  v-on:change="variable_doc_1($event)"/>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" @click="cerrarModal_pri();">Cerrar</button>
                    <button type="button" class="btn btn-success" @click="guardar_doc_1();" :disabled="estadoguardar_pri">Guardar</button>
                </div>
            </div>
        </div>

    </div>
</div>