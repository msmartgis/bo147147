<div class="modal fade settings-add-service">
    <div class="modal-dialog" role="document" >
        <div class="modal-content" style="width : 650px">           
			<div class="modal-header">
				<h4 class="modal-title" >Ajouter un nouveau service</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span></button>
			</div>				
            <div class="modal-body ">
                <?php echo Form::open(['action' => 'ServiceController@store','method'=>'POST','class'=>'form-create']); ?>

                <div class="row" >
                    <div class="row col-12">
                        <div class="col-lg-2 col-md-2">
                            <?php echo e(Form::label('','Intitulé :')); ?>

                        </div>
                        <div class="col-lg-3 col-md-3">
                            <?php echo e(Form::text('nom','',['class'=>'form-control','required'=>'required'])); ?>

                        </div>

                        <div class="col-lg-3 col-md-2">
                            <?php echo e(Form::label('',trans('Responsable').' :')); ?>

                        </div>

                        <div class=" col-lg-3 col-md-3">                            
                            <?php echo e(Form::select('responsable_id', $responsables, null,
                                    [
                                    'data-placeholder' => 'Selectionner mode de reception',
                                    'class'=>'form-control ',
                                    'name'=>'responsable_id',
                                    'style'=>'width:100%'
                                    ]
                                    )); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close" style="margin-right: 8px"></i>Annuler</button>
                <button type="submit"  class="btn btn-success float-right  " ><i class="fa fa-check" style="margin-right: 8px"></i>Ajouter</button>
            </div>

            <?php echo Form::close(); ?>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><?php /**PATH E:\xampp\htdocs\smartgis\bureau_ordre\resources\views/parametres/modal_setting.blade.php ENDPATH**/ ?>