

<?php echo Form::model($courrier,[
'action' => 'CourrierController@store',
'method'=>'POST',
'class'=>'tab-wizard wizard-circle form-create',
'enctype' => 'multipart/form-data'
]); ?>

<!-- Step 1 -->
<h6><?php echo e(__('Information Général')); ?></h6>
<section>
    <div class="row">
        
        <div class="col-lg-6 col-md-6 col-sm-12 <?php echo e(__('costum_css.border-style-m')); ?>">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <?php echo e(Form::label('',trans('Réf courrier').' :')); ?>

                        <?php echo e(Form::text('ref','',['class'=>'form-control','required'=>'required'])); ?>

                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <?php echo e(Form::label('',trans('Mode reception').' :')); ?>

                        <?php echo e(Form::select('modes_receptions', $modes_recpetion, null,
                                [
                                'data-placeholder' => 'Selectionner mode de reception',
                                'class'=>'form-control ',
                                'name'=>'mode_reception_id',
                                'style'=>'width:100%'
                                ]
                                )); ?>

                    </div>

                </div>
            </div>

            <div class="row" style="margin-top: 10px">
                <div class="col-lg-6">
                    <div class="form-group <?php echo e(__('costum_css.date-style-m')); ?>">
                        <?php echo e(Form::label('',trans('Date de la réception'))); ?>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <?php echo e(Form::text('date_reception',$actu_date,['class'=>'form-control pull-right datepicker'])); ?>

                        </div>
                        <!-- /.input group -->
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group <?php echo e(__('costum_css.date-style-m')); ?>">
                        <?php echo e(Form::label('',trans('Date de courrier'))); ?>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <?php echo e(Form::text('date_courrier',$actu_date,['class'=>'form-control pull-right datepicker'])); ?>

                        </div>
                        <!-- /.input group -->
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 10px">
                <div class="col-lg-6">
                    <div class="form-group">
                        <?php echo e(Form::label('',trans('Catégorie'). ' :')); ?>

                        <?php echo e(Form::select('categorie_courrier', $categorie_courrier, null,
                                [
                                'data-placeholder' => 'Selectionner mode de reception',
                                'class'=>'form-control ',
                                'name'=>'categorie_courrier_id',
                                'style'=>'width:100%'
                                ]
                                )); ?>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <?php echo e(Form::label('',trans('Priorité'). ' :')); ?>

                        <?php echo e(Form::select('priorites', $priorites, null,
                                [
                                'data-placeholder' => 'Selectionner mode de reception',
                                'class'=>'form-control ',
                                'name'=>'priorites_id',
                                'style'=>'width:100%'
                                ]
                                )); ?>

                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 10px">
                <div class="col-12">
                    <div class="form-group">
                        <h6 class="<?php echo e(__('costum_css.float-right-m')); ?>"><?php echo e(__('Objet')); ?></h6>
                        <div class="controls">
                            <?php echo e(Form::textarea('objet','',['class'=>'form-control m-required-input','placeholder'=>trans('objet...'),'rows'=>'2','id'=>'objet_fr_input_id','required'=>'required'])); ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        
        <div class="col-lg-6 col-md-6 col-sm-12" style="padding-left : 15px">
            <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>"><?php echo e(__('Expediteur')); ?></h5>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <?php echo e(Form::select('type_expediteur',
                                [
                                    'personne_physique' => trans('Personne physique'),
                                    'personne_morale' =>trans('Personne morale')
                                ],
                                'personne_physique',
                                [
                                    'data-placeholder' => 'Expediteur',
                                    'class'=>'form-control',
                                    'name'=>'type_expediteur',
                                    'id'=>'type_expediteur_select_id',
                                ])); ?>

                    </div>
                </div>
            </div>


            
            <div id="personne_physique" class="expediteur personne_physique">
                <div class="row" style="margin-top : 8px">
                    <div class="row col-12">
                        <h6><?php echo e(__('Recherche dans la base des données')); ?></h6>
                    </div>
                    
                    <div class="form-group col-6">
                        <select name="personne_physique_id_from_db" class="form-control select2"
                            id="personne_physique_select_id">
                            <?php $__currentLoopData = $personne_physiques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pers_phys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($pers_phys->id); ?>"><?php echo e($pers_phys->nom); ?> <?php echo e($pers_phys->prenom); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <a href="#" id="ajouter_personne_physique_btn" style="padding: 10px;"> <i class="fa fa-plus"></i>
                        <b> <?php echo e(__('Ajouter un nouveau expediteur')); ?></b>
                    </a>
                </div>

                <div id="ajouter_nouveau_personne_phisique_div" style="display:none">

                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Nom') .' :')); ?>

                                <?php echo e(Form::text('nom_personne_physique','',['class'=>'form-control'])); ?>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Prènom') .' :')); ?>

                                <?php echo e(Form::text('prenom_personne_physique','',['class'=>'form-control'])); ?>

                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('C.I.N.E') .' :')); ?>

                                <?php echo e(Form::text('cine_personne_physique','',['class'=>'form-control'])); ?>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Adresse') .' :')); ?>

                                <?php echo e(Form::text('adresse_personne_physique','',['class'=>'form-control'])); ?>

                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Tel Fixe') .' :')); ?>

                                <?php echo e(Form::text('tel_fixe_personne_physique','',['class'=>'form-control'])); ?>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Tel Mobile') .' :')); ?>

                                <?php echo e(Form::text('tel_mobile_personne_physique','',['class'=>'form-control'])); ?>

                            </div>
                        </div>
                    </div>


                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Email') .' :')); ?>

                                <?php echo e(Form::text('email_personne_physique','',['class'=>'form-control'])); ?>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

            
            <div id="personne_morale" class="expediteur personne_morale" style="display:none">
                <div class="row" style="margin-top : 8px">
                    <div class="row col-12">
                        <h6><?php echo e(__('Recherche dans la base des données')); ?></h6>
                    </div>
                    <div class="form-group col-6">
                        
                        <select name="personne_morale_id_from_db" class="form-control select2"
                            id="personne_morale_select_id">
                            <?php $__currentLoopData = $personne_morales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pers_moral): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($pers_moral->id); ?>"><?php echo e($pers_moral->raison_social); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <a href="#" id="ajouter_personne_morale_btn" style="padding: 10px;"> <i class="fa fa-plus"></i>
                        <b> <?php echo e(__('Ajouter un nouveau expediteur')); ?></b>
                    </a>
                </div>

                <div id="ajouter_nouveau_personne_morale_div" style="display:none">
                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Raison social') .' :')); ?>

                                <?php echo e(Form::text('raison_social','',['class'=>'form-control'])); ?>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Adresse') .' :')); ?>

                                <?php echo e(Form::text('adresse','',['class'=>'form-control'])); ?>

                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('RC') .' :')); ?>

                                <?php echo e(Form::text('rc','',['class'=>'form-control'])); ?>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Tel Fixe') .' :')); ?>

                                <?php echo e(Form::text('tel_fix_personne_morale','',['class'=>'form-control'])); ?>

                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Fax') .' :')); ?>

                                <?php echo e(Form::text('fax_personne_morale','',['class'=>'form-control'])); ?>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Tel Mobile') .' :')); ?>

                                <?php echo e(Form::text('tel_mobile_personne_morale','',['class'=>'form-control'])); ?>

                            </div>
                        </div>
                    </div>


                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Email') .' :')); ?>

                                <?php echo e(Form::text('email_personne_morale','',['class'=>'form-control'])); ?>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Représentant') .' :')); ?>

                                <?php echo e(Form::text('representant','',['class'=>'form-control'])); ?>

                            </div>
                        </div>
                    </div>

                    <h6 style="margin-top : 10px"><b><?php echo e(__('Representant')); ?></b></h6>
                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Nom') .' :')); ?>

                                <?php echo e(Form::text('nom_representant','',['class'=>'form-control'])); ?>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Prènom') .' :')); ?>

                                <?php echo e(Form::text('prenom_representant','',['class'=>'form-control'])); ?>

                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('C.I.N.E') .' :')); ?>

                                <?php echo e(Form::text('cine_representant','',['class'=>'form-control'])); ?>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Status') .' :')); ?>

                                <?php echo e(Form::text('role_representant','',['class'=>'form-control'])); ?>

                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Tel Fixe') .' :')); ?>

                                <?php echo e(Form::text('tel_fix_representant','',['class'=>'form-control'])); ?>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Tel Mobile') .' :')); ?>

                                <?php echo e(Form::text('tel_mobile_representant','',['class'=>'form-control'])); ?>

                            </div>
                        </div>
                    </div>


                    <div class="row" style="margin-top : 10px">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Email') .' :')); ?>

                                <?php echo e(Form::text('email_representant','',['class'=>'form-control'])); ?>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo e(Form::label('',trans('Adresse') .' :')); ?>

                                <?php echo e(Form::text('adresse_representant','',['class'=>'form-control'])); ?>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>
<!-- Step 2 -->
<h6><?php echo e(__('Acheminement et traitement')); ?></h6>
<section>

    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <?php echo e(Form::label('',trans('Delai') .' :')); ?>

                <div class="input-group date <?php echo e(__('costum_css.date-style-m')); ?>">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <?php echo e(Form::text('delai','',['class'=>'form-control pull-right datepicker','id'=>'datepicker_delai_input_id'])); ?>

                </div>
                <!-- /.input group -->
            </div>
        </div>
    </div>
    <br>

    <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>">
        <?php echo e(__('ASSIGNER A UN SERVICE/UNE DIVISION')); ?>

    </h5>
    <hr>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::select('presidential_service', $presidential_services, null,
                        [
                        'data-placeholder' => 'Selectionner mode de reception',
                        'class'=>'form-control select2',
                        'multiple'=>'multiple',
                        'name'=>'services_ids[]',
                        'style'=>'width:100%'
                        ]
                        )); ?>

            </div>

        </div>
    </div>




    

    <br>


    <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>"><?php echo e(__('AJOUTER LES DOCUMENTS FOURNIS')); ?></h5>
    <hr>
    <div class="row" style="margin: 0 !important;">
        <div class="table-responsive" style="margin-top: 12px">
            <table class="table table-piece">
                <thead class="create-table">
                    <tr style="text-align: center;">
                        <th></th>
                        <th><?php echo e(__('Type de document')); ?></th>
                        <th><?php echo e(__('Intitulé')); ?></th>
                        <th><?php echo e(__('Mode de réception')); ?></th>
                        <th><?php echo e(__('Date de réception')); ?></th>
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
                    class="fa fa-close"></i> <?php echo e(__('Supprimer')); ?></button>
        </div>
    </div>
    <br>

    <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>"><?php echo e(__('ACCUSE DE RECEPTION')); ?></h5>
    <hr>

    <div class="row" style="margin: 0 !important;">
        <div class="table-responsive" style="margin-top: 12px">
            <table class="table table-accuse-reception">
                <thead class="create-table">
                    <tr style="text-align: center;">
                        <th></th>
                        <th><?php echo e(__('Date')); ?></th>
                        <th><?php echo e(__('Accusé')); ?></th>
                    </tr>
                </thead>

                <tbody id="acusse_reception_tbody">
                    <tr>

                    </tr>
                </tbody>
            </table>

            <div style="text-align: center">
                <a href="#" id="add_accuse_reception_btn"> <i class="fa fa-plus"></i>
                    <b> <?php echo e(__('Ajouter')); ?> </b>
                </a>
            </div>
            <button type="button" class="btn delete-row btn-danger-table" id="delete_accuse_rception_row_btn"> <i
                    class="fa fa-close"></i> <?php echo e(__('Supprimer')); ?></button>
        </div>
    </div>


</section>



<?php echo Form::close(); ?><?php /**PATH E:\xampp\htdocs\smartgis\bureau_ordre\resources\views/courriers/entrants/create/form_add_courrier_entrant.blade.php ENDPATH**/ ?>