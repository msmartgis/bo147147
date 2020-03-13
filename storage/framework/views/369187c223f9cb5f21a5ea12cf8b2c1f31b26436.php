

<?php echo Form::model($diffusion_interne,[
'action' => 'DiffusionInterneController@store',
'method'=>'POST',
'class'=>'tab-wizard wizard-circle form-create',
'enctype' => 'multipart/form-data'
]); ?>

<!-- Step 1 -->
<h6><?php echo e(__('Information Général')); ?></h6>
<section>
    <div class="row">
        <div class="row col-12">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-group">
                    <?php echo e(Form::label('',trans('Réf').' :')); ?>

                    <?php echo e(Form::text('ref','',['class'=>'form-control','required'=>'required'])); ?>

                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-group ">
                    <?php echo e(Form::label('',trans('Nature de diffusion').' :')); ?>

                    <?php echo e(Form::select('nature_diffusion', $natures_diffusions, null,
                            [
                            'data-placeholder' => 'Selectionner mode de reception',
                            'class'=>'form-control ',
                            'name'=>'nature_diffusion',
                            'style'=>'width:100%'
                            ]
                            )); ?>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group <?php echo e(__('costum_css.date-style-m')); ?>">
                    <?php echo e(Form::label('',trans('Date envoi').' :')); ?>

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <?php echo e(Form::text('date_envoi',$actu_date,['class'=>'form-control pull-right datepicker'])); ?>

                    </div>
                    <!-- /.input group -->
                </div>
            </div>
        </div>


        <div class="row col-12" style="margin-top: 10px">
            <div class="col-lg-6">
                <div class="form-group">
                    <h6><?php echo e(__('Objet')); ?></h6>
                    <div class="controls">
                        <?php echo e(Form::textarea('objet','',['class'=>'form-control m-required-input','placeholder'=>trans('saisir objet'),'rows'=>'2','id'=>'objet_fr_input_id','required'=>'required'])); ?>

                    </div>
                </div>
            </div>
        </div>

        <br>
        <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>" style="margin-top:8px"><?php echo e(__('AJOUTER LES DOCUMENTS FOURNIS')); ?>

        </h5>
        <hr>
        <div class="row col-12" style="margin: 0 !important;">
            <div class="table-responsive" style="margin-top: 12px">
                <table class="table table-piece">
                    <thead class="create-table">
                        <tr style="text-align: center;">
                            <th></th>
                            <th><?php echo e(__('Réf')); ?></th>
                            <th><?php echo e(__('Intitulé')); ?></th>
                            <th><?php echo e(__('Charger')); ?></th>
                        </tr>
                    </thead>
                    <tbody id="piece_courrier_tbody">
                        <tr>

                        </tr>
                    </tbody>
                </table>

                <div style="text-align: center">
                    <a href="#" id="add_piece_btn"> <i class="fa fa-plus"></i>
                        <b> <?php echo e(__('Ajouter')); ?> </b>
                    </a>
                </div>
                <button type="button" class="btn delete-row btn-danger-table" id="delete_documents_row_btn"> <i
                        class="fa fa-close"></i><?php echo e(__('Supprimer')); ?> </button>
            </div>
        </div>

    </div>
</section>
<!-- Step 2 -->
<h6><?php echo e(__('Acheminement et traitement')); ?></h6>
<section>

    <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>">
        <?php echo e(__('ASSIGNER A UN SERVICE/UNE DIVISION')); ?>

    </h5>
    <hr>
    <div class="row" style="margin: 0 !important;">
        <div class="table-responsive" style="margin-top: 12px">
            <table class="table table-service-assigne">
                <thead class="create-table">
                    <tr style="text-align: center;">
                        <th></th>
                        <th><?php echo e(__('Service')); ?></th>
                        <th><?php echo e(__('Réf')); ?></th>
                        <th><?php echo e(__('Responsable')); ?></th>
                        <th><?php echo e(__('Message')); ?></th>
                    </tr>
                </thead>
                <tbody id="service_assigne_tbody">
                    <tr></tr>
                </tbody>
            </table>

            <div style="text-align: center">
                <a href="#" data-toggle="modal" data-target="#assigne_service_modal"> <i class="fa fa-plus"></i>
                    <b> <?php echo e(__('Ajouter')); ?></b>
                </a>
            </div>
            <button type="button" class="btn delete-row btn-danger-table" id="delete_service_row_btn"> <i
                    class="fa fa-close"></i><?php echo e(__('Supprimer')); ?> </button>
        </div>
    </div>
    <br>

    <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>"><?php echo e(__('OBSERVATIONS ET REMARQUES')); ?></h5>
    <hr>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <?php echo e(Form::textarea('observation','',['id'=>'editor1','placeholder'=>'saisir vos
                        obsérvations','rows'=>'10','cols'=>'80'])); ?>

            </div>
        </div>
    </div>

</section>



<?php echo Form::close(); ?><?php /**PATH E:\xampp\htdocs\smartgis\bureau_ordre\resources\views/diffusion_interne/create/form_add_diffusion_interne.blade.php ENDPATH**/ ?>