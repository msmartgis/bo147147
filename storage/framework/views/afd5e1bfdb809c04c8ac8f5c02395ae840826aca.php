<?php echo Form::model($courrier, ['route' => ['courriers-entrants.update',
$courrier->id],'id'=>'form_courrier_edit','class'=>'form-edit','method' => 'PUT','enctype' => 'multipart/form-data']); ?>

<input type="hidden" name="courrier_id" value="<?php echo e($courrier->id); ?>" id="courrier_id_input">
<div class="row">
    <div class="col-lg-9">
        <div class="row">
            <div class="col-12">
                <div class="box" style="border-top: 0;border-bottom: 0">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="tab-pane active" id="information_generale_tab" role="tabpanel">

                                <div class="pad">

                                    <div class="row" style="margin-top: 8px">
                                        <div class="col-lg-6 col-xl-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <?php echo e(Form::textarea('objet',$courrier->objet,['class'=>'form-control','rows'=>'2','style'=>'height: 52px !important' ,'disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-xl-6 col-md-6 col-12">

                                        </div>
                                    </div>

                                    <br>
                                    <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>"><?php echo e(__('EXPEDITEUR')); ?></h5>
                                    <hr style="color:#2d353c;margin:0">

                                    <div class="row" style="margin-top: 8px">
                                        <?php if($courrier->personne_physique_id != null): ?>
                                        <h6><b><?php echo e(__('Nature : Personne Physique')); ?></b></h6>
                                        <input type="hidden" name="personne_physique_id"
                                            value="<?php echo e($courrier->personne_physique_id); ?>">
                                        <div class="row col-12">

                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('Nom') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('nom_personne_physique',$courrier->personnePhysique()->first()->nom,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('Prènom') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('prenom_personne_physique',$courrier->personnePhysique()->first()->prenom,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>


                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('C.I.N.E') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('cine_personne_physique',$courrier->personnePhysique()->first()->cine,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="row col-12" style="margin-top: 8px">
                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('Adresse') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('adresse_personne_physique',$courrier->personnePhysique()->first()->adresse,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('Tel Mobile') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('tel_mobile_personne_physique',$courrier->personnePhysique()->first()->tel_mobile,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('Email') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('email_personne_physique',$courrier->personnePhysique()->first()->email,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>

                                        </div>

                                        <?php endif; ?>

                                        <?php if($courrier->personne_morale_id != null): ?>
                                        <h6><b><?php echo e(__('Nature : Personne Morale')); ?></b></h6>
                                        <div class="row col-12">
                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('Raison social') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <input type="hidden" name="personne_morale_id"
                                                        value="<?php echo e($courrier->personneMorale()->first()->id); ?>">
                                                    <?php echo e(Form::text('raison_social_personne_morale',$courrier->personneMorale()->first()->raison_social,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('RC') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('rc_personne_morale',$courrier->personneMorale()->first()->rc,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>


                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('Adresse') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('adresse_personne_morale',$courrier->personneMorale()->first()->adresse,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>
                                        </div>



                                        <div class="row col-12" style="margin-top: 8px">
                                            <div class="col-lg-">
                                                <?php echo e(Form::label('',trans('Tel Fixe') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('tel_fix_personne_morale',$courrier->personneMorale()->first()->tel_fix,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <?php echo e(Form::label('',trans('Tel Mobile') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('tel_mobile_personne_morale',$courrier->personneMorale()->first()->tel_mobile,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>


                                            <div class="col-lg-3">
                                                <?php echo e(Form::label('',trans('Fax') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('fax_personne_morale',$courrier->personneMorale()->first()->fax,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <?php echo e(Form::label('',trans('Email') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('email_personne_morale',$courrier->personneMorale()->first()->email,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <h6 style="margin-top : 12px"><b><?php echo e(__('Informations de Représentant')); ?>:</b>
                                        </h6>
                                        <?php if($courrier->personneMorale()->first()->representant != null): ?>

                                        <div class="row col-12">
                                            <input type="hidden" name="representant_id"
                                                value="<?php echo e($courrier->personneMorale()->first()->representant->id); ?>">
                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('Nom') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('nom_representant',$courrier->personneMorale()->first()->representant->nom,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('Prènom') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('prenom_representant',$courrier->personneMorale()->first()->representant->prenom,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>


                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('C.I.N.E') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('cine_representant',$courrier->personneMorale()->first()->representant->cine,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="row col-12" style="margin-top: 8px">
                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('Adresse') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('adresse_representant',$courrier->personneMorale()->first()->representant->adresse,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>


                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('Tel Mobile') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('tel_mobile_representant',$courrier->personneMorale()->first()->representant->tel_mobile,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('Email') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('email_representant',$courrier->personneMorale()->first()->representant->email,['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>

                                        </div>

                                        <?php else: ?>

                                        <div class="row col-12">
                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('Nom') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('nom_representant','',['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('Prènom') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('prenom_representant','',['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>


                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('C.I.N.E') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('cine_representant','',['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="row col-12" style="margin-top: 8px">
                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('Adresse') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('adresse_representant','',['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>


                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('Tel Mobile') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('tel_mobile_representant','',['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <?php echo e(Form::label('',trans('Email') .' :')); ?>

                                                <div class="form-group form-group-edit">
                                                    <?php echo e(Form::text('email_representant','',['class'=>'form-control','disabled' => 'disabled'])); ?>

                                                </div>
                                            </div>

                                        </div>


                                        <?php endif; ?>


                                        <?php endif; ?>

                                    </div>

                                    <br>
                                    <br>
                                    <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>"><?php echo e(__('DOCUMENTS FOURNIS')); ?> : </h5>
                                    <hr style="color:#2d353c;margin:0">
                                    <div class="row" style="margin: 0 !important;">
                                        <div class="table-responsive" style="margin-top: 12px">
                                            <table class="table table-piece">
                                                <thead class="create-table">
                                                    <tr style="text-align: center;">
                                                        <th><?php echo e(__('Type de document')); ?></th>
                                                        <th><?php echo e(__('Intitulé')); ?></th>
                                                        <th><?php echo e(__('Mode de réception')); ?></th>
                                                        <th><?php echo e(__('Date de réception')); ?></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="piece_courrier_tbody">
                                                    <?php $__currentLoopData = $courrier->piece; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <input type="hidden" name="documents_ids[]"
                                                            value="<?php echo e($item->id); ?>">
                                                        
                                                        <td style="text-align: center">
                                                            <?php echo e($item->typeDocument()->first()->nom_type); ?>

                                                        </td>
                                                        <td style="text-align: center">
                                                            <?php echo e($item->nom_document); ?>

                                                        </td>
                                                        <td style="text-align: center">
                                                            <?php echo e($item->modeReception()->first()->mode_name); ?>

                                                        </td>
                                                        <td style="text-align: center">
                                                            <?php echo e($item->date_reception); ?>

                                                        </td>

                                                        <td style="text-align: center;">
                                                            <?php if($item->path != ''): ?>
                                                            <a
                                                                href="/files/download/courriers/entrants/<?php echo e($courrier->id); ?>/<?php echo e($item->path); ?>">
                                                                <button type="button" class="btn btn-success-table ">
                                                                    <i class="fa fa-download"></i>
                                                                    <?php echo e(__('Télécharger')); ?></button>
                                                            </a>


                                                            <button type="button" data-folder="courriers"
                                                                data-subfolder="entrants"
                                                                data-courrierid="<?php echo e($courrier->id); ?>"
                                                                data-path="<?php echo e($item->path); ?>"
                                                                class="btn btn-success-table visualize-file-btn"
                                                                style="color : #1d2f59">
                                                                <i class="fa fa-eye"></i>
                                                                <?php echo e(__('Visualiser')); ?></button>

                                                            <?php endif; ?>

                                                            <?php if(Auth::user()->role->first()->role_name ==
                                                            "bureau_ordre" || Auth::user()->role->first()->role_name ==
                                                            "admin"): ?>
                                                            <button type="button"
                                                                class="btn delete-row btn-danger-table m-hidden"> <i
                                                                    class="fa fa-close"></i><?php echo e(__('Supprimer')); ?>

                                                            </button>
                                                            <?php endif; ?>

                                                        </td>

                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </tbody>
                                            </table>

                                            <div style="text-align: center">
                                                <a href="#" id="add_piece_btn" class="m-hidden"> <i
                                                        class="fa fa-plus"></i>
                                                    <b><?php echo e(__('Ajouter')); ?> </b>
                                                </a>
                                            </div>

                                        </div>
                                    </div>


                                    <br>
                                    <br>
                                    <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>">
                                        <?php echo e(__('ACCUSE DE RECEPTION')); ?> <?php echo e(__('VERSION SCANNEE')); ?>

                                        : </h5>

                                    <div class="row" style="margin: 0 !important;">
                                        <div class="table-responsive" style="margin-top: 12px">
                                            <table class="table table-accuse-reception">
                                                <thead class="create-table">
                                                    <tr style="text-align: center;">
                                                        <th><?php echo e(__('Date')); ?></th>
                                                        <th><?php echo e(__('Accusé')); ?></th>
                                                        <th><?php echo e(__('Code Archivage')); ?></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>

                                                <tbody id="acusse_reception_tbody">
                                                    <?php $__currentLoopData = $courrier->accuse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <input type="hidden" name="accuse_reception_ids[]"
                                                            value=" <?php echo e($item->id); ?>">
                                                        
                                                        <td style="text-align: center">
                                                            <?php echo e($item->date); ?>

                                                        </td>
                                                        <td style="text-align: center">
                                                            <?php echo e($item->path); ?>


                                                        </td>
                                                        <td style="text-align: center">
                                                            <?php echo e($item->ref); ?>

                                                        </td>

                                                        <td style="text-align: center;">
                                                            <?php if($item->path != ''): ?>
                                                            <a
                                                                href="/files/download/courriers/entrants_accuses_reception/<?php echo e($courrier->id); ?>/<?php echo e($item->path); ?>">
                                                                <button type="button" class="btn btn-success-table ">
                                                                    <i class="fa fa-download"></i>
                                                                    <?php echo e(__('Télécharger')); ?> </button>
                                                            </a>
                                                            <?php endif; ?>

                                                            <button type="button" data-folder="courriers"
                                                                data-subfolder="entrants/accuses_receptions"
                                                                data-courrierid="<?php echo e($courrier->id); ?>"
                                                                data-path="<?php echo e($item->path); ?>"
                                                                class="btn btn-success-table visualize-file-btn"
                                                                style="color : #1d2f59">
                                                                <i class="fa fa-eye"></i>
                                                                <?php echo e(__('Visualiser')); ?></button>
                                                            <?php if(Auth::user()->role->first()->role_name ==
                                                            "bureau_ordre" || Auth::user()->role->first()->role_name ==
                                                            "admin"): ?>
                                                            <button type="button"
                                                                class="btn delete-row btn-danger-table m-hidden"> <i
                                                                    class="fa fa-close"></i><?php echo e(__('Supprimer')); ?>

                                                            </button>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </tbody>
                                            </table>

                                            <div style="text-align: center">
                                                <a href="#" id="add_accuse_reception_btn" class="m-hidden"> <i
                                                        class="fa fa-plus"></i>
                                                    <b><?php echo e(__('Ajouter')); ?> </b>
                                                </a>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="tab-pane " id="traitement_distribution_tab" role="tabpanel">

                                <div class="pad">
                                    <br>
                                    <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>">
                                        <?php echo e(__('ASSIGNER A UN SERVICE/UNE DIVISION')); ?></h5>
                                    <hr style="color:#2d353c;margin:0">
                                    <div class="row" style="margin: 0 !important;">
                                        <div class="table-responsive" style="margin-top: 12px">
                                            <table class="table table-service-assigne">
                                                <thead class="create-table">
                                                    <tr style="text-align: center;">
                                                        <th><?php echo e(__('Service')); ?></th>
                                                        <th><?php echo e(__('Responsable')); ?></th>
                                                        <th><?php echo e(__('Message')); ?></th>
                                                        
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="service_assigne_tbody">
                                                    <?php $__currentLoopData = $courrier->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <input type="hidden" name="service_input_id[]"
                                                            value="<?php echo e($item->id); ?>">
                                                        <input type="hidden" name="messages[]"
                                                            value="<?php echo e($item->pivot->message); ?>">
                                                        
                                                        <td style="text-align: center">
                                                            <?php echo e($item->nom); ?>

                                                        </td>

                                                        <td style="text-align: center">
                                                            <?php $__currentLoopData = $item->responsables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_repsonsable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($item_repsonsable->full_name); ?>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>

                                                        <td style="text-align: center">
                                                            <?php echo e($item->pivot->message); ?>

                                                        </td>

                                                        
                                                        <td>
                                                            <?php if($item->pivot->vu == 1): ?>
                                                            <img src="<?php echo e(asset('images/svg/double-tick-indicator.svg')); ?>"
                                                                width=20 height=20 alt="">
                                                            <?php else: ?>
                                                            <img src="<?php echo e(asset('images/svg/tick.svg')); ?>" width=15
                                                                height=15 alt="">
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if(Auth::user()->role->first()->role_name == "admin"): ?>
                                                            <button type="button"
                                                                class="btn delete-row btn-danger-table m-hidden"
                                                                id="delete_service_row_btn"> <i class="fa fa-close"></i>
                                                                <?php echo e(__('Supprimer')); ?></button>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </tbody>
                                            </table>


                                            <?php if(Auth::user()->role->first()->role_name == "president" ||
                                            Auth::user()->role->first()->role_name == "admin"): ?>
                                            <div style="text-align: center">
                                                <a href="#" data-toggle="modal" data-target="#assigne_service_modal"
                                                    class="m-hidden"> <i class="fa fa-plus"></i>
                                                    <b><?php echo e(__('Ajouter')); ?> </b>
                                                </a>
                                            </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane" id="remarques_consignes_tab" role="tabpanel">

                                <div class="pad">
                                    <br>
                                    <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>"><?php echo e(__('REMARQUES ET CONSIGNES')); ?></h5>
                                    <hr style="color:#2d353c;margin:0">



                                    <div class="row" style="margin: 0 !important;">
                                        <div class="table-responsive" style="margin-top: 12px">
                                            <table class="table remarque-consigne-table">
                                                <thead class="create-table">
                                                    <tr style="text-align: center;">
                                                        <th><?php echo e(__('N°')); ?></th>
                                                        <th><?php echo e(__('Message')); ?></th>
                                                        <th><?php echo e(__('Date envoi')); ?></th>
                                                        <th><?php echo e(__('Utilisateur')); ?></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="remarque_consigne_tbody">
                                                    <?php
                                                    $remarque_item = 1;

                                                    ?>
                                                    <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>"
                                                        id="user_id_input" />

                                                    <?php $__currentLoopData = $courrier->remarqueConsigne; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remarque): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo e($remarque_item); ?>

                                                            <input type="hidden" name="number_consigne[]"
                                                                value="<?php echo e($remarque_item); ?>">
                                                            <input type="hidden" name="consignes_added_message[]"
                                                                value="<?php echo e($remarque->message); ?>">
                                                        </td>
                                                        
                                                        <td style="text-align: center">
                                                            <?php echo e($remarque->message); ?>

                                                        </td>

                                                        <td style="text-align: center">
                                                            <?php echo e($remarque->created_at); ?>

                                                        </td>

                                                        <td style="text-align: center">
                                                            <?php echo e($remarque->user->full_name); ?>

                                                        </td>

                                                        <td style="text-align: center;">
                                                            <button type="button"
                                                                class="btn delete-row btn-danger-table m-hidden"> <i
                                                                    class="fa fa-close"></i><?php echo e(__('Supprimer')); ?>

                                                            </button>
                                                        </td>

                                                    </tr>

                                                    <?php
                                                    $remarque_item++;
                                                    ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    <input type="hidden" name="remarque_item_max"
                                                        value="<?php echo e($remarque_item); ?>" id="remarque_item_max_id" />

                                                </tbody>
                                            </table>

                                            <?php if(Auth::user()->role->first()->role_name == "president" ): ?>
                                            <div style="text-align: center">
                                                <a href="#" data-toggle="modal" data-target="#remarque_consigne_modal"
                                                    class="m-hidden"> <i class="fa fa-plus"></i>
                                                    <b><?php echo e(__('Ajouter')); ?> </b>
                                                </a>
                                            </div>
                                            <?php endif; ?>


                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="tab-pane" id="historiques_operations_tab" role="tabpanel">

                                <div class="pad">

                                    <br>
                                    <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>"><?php echo e(__('HISTORIQUES DES OPERATIONS')); ?>

                                    </h5>
                                    <hr style="color:#2d353c;margin:0">

                                    <div class="row" style="margin: 0 !important;">
                                        <div class="table-responsive" style="margin-top: 12px">
                                            <table class="table table-historique">
                                                <thead class="create-table">
                                                    <tr style="text-align: center;">
                                                        <th><?php echo e(__('N°')); ?></th>
                                                        <th><?php echo e(__('Operation')); ?></th>
                                                        <th><?php echo e(__('Date de déclenchement')); ?></th>
                                                        <th><?php echo e(__('Distribué Par')); ?></th>
                                                        <th><?php echo e(__('Distribué à')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="historique_tbody">
                                                    <tr></tr>
                                                    <?php
                                                    $history_item = 1;
                                                    ?>

                                                    <?php $__currentLoopData = $historique; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hitory_rec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($history_item); ?></td>
                                                        <td><?php echo e($hitory_rec->operation_type->type_operation_nom); ?></td>
                                                        <td><?php echo e($hitory_rec->created_at); ?></td>
                                                        <td><?php echo e($hitory_rec->user->full_name); ?></td>
                                                        <td><?php echo e($hitory_rec->created_at); ?></td>
                                                    </tr>

                                                    <?php
                                                    $history_item++;
                                                    ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    <!-- /.col -->
    <div class="col-lg-3 m-min-hight">

        <div class="h-p100  bg-light bg-secondary-gradient" style="padding-right: 5px;height: 100%;">
            <div class="box bg-transparent no-border no-shadow ">
                <div class="box-body no-padding mailbox-nav ">

                    <h5
                        style="text-align: center;background-color: #686868;color: #fff !important;border-radius: 2px;padding: 4px">
                        <?php echo e($courrier->etat->etat_nom); ?>

                    </h5>
                    <br>

                    <div class="row row-edit">
                        <div class="col-lg-4">
                            <?php echo e(Form::label('',trans('Récéption') .' : ',['style'=> 'font-size : 11px'])); ?>

                        </div>
                        <div class="col-lg-8">
                            <div class="form-group form-group-edit">
                                <div class="input-group date <?php echo e(__('costum_css.date-style-m')); ?>">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <?php echo e(Form::text('date_reception',$courrier->date_reception,['class'=>'form-control
                                    pull-right datepicker','disabled'])); ?>

                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>


                    <div class="row row-edit">
                        <div class="col-lg-4">
                            <?php echo e(Form::label('',trans('Delai') .' : ',['style'=> 'font-size : 11px'])); ?>

                        </div>
                        <div class="col-lg-8">
                            <div class="form-group form-group-edit">
                                <div class="input-group date <?php echo e(__('costum_css.date-style-m')); ?>">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <?php echo e(Form::text('delai',$courrier->delai,['class'=>'form-control
                                    pull-right datepicker','disabled'])); ?>

                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>


                    <div class="row row-edit">
                        <div class="col-lg-4">
                            <?php echo e(Form::label('',trans('Mode de réception') .' : ',['style'=> 'font-size : 11px,'])); ?>

                        </div>
                        <div class="col-lg-8">
                            <div class="form-group form-group-edit">
                                <?php echo e(Form::select('mode_reception_id', $modes_recpetion, $courrier->mode_reception_id,
                                    [
                                    'data-placeholder' => 'Selectionner mode de reception',
                                    'class'=>'form-control ',
                                    'name'=>'mode_reception_id',
                                    'style'=>'width:100%',
                                    'disabled'=> 'disabled'
                                    ]
                                )); ?>

                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>


                    <div class="row row-edit">
                        <div class="col-lg-4">
                            <?php echo e(Form::label('',trans('Priorité') .' : ',['style'=> 'font-size : 11px,'])); ?>

                        </div>
                        <div class="col-lg-8">
                            <div class="form-group form-group-edit">
                                <?php echo e(Form::select('priorite_id', $priorites, $courrier->priorite_id,
                                        [
                                        'data-placeholder' => 'Selectionner mode de reception',
                                        'class'=>'form-control ',
                                        'name'=>'priorite_id',
                                        'style'=>'width:100%',
                                        'disabled'=> 'disabled'
                                        ]
                                    )); ?>

                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>


                    <div class="row row-edit">
                        <div class="col-lg-4">
                            <?php echo e(Form::label('',trans('Catégorie') .' : ',['style'=> 'font-size : 11px,'])); ?>

                        </div>
                        <div class="col-lg-8">
                            <div class="form-group form-group-edit">
                                <?php echo e(Form::select('categorie_courrier', $categorie_courrier, $courrier->categorie_courrier_id,
                                        [
                                        'data-placeholder' => 'Selectionner mode de reception',
                                        'class'=>'form-control ',
                                        'name'=>'categorie_courrier_id',
                                        'style'=>'width:100%',
                                        'disabled'=> 'disabled'
                                        ]
                                    )); ?>

                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>


                    <?php if($courrier->courrier_sortant_id != null): ?>
                    <div class="row row-edit">
                        <div class="col-lg-4">
                            <?php echo e(Form::label('',trans('Sortant') .' :',['style'=> 'font-size : 11px'])); ?>

                        </div>

                        <div class="col-lg-8">
                            <div class="form-group form-group-edit">
                                <?php echo e(Form::text('ref_sortant',$courrier->ref_sortant,['class'=>'form-control','disabled'])); ?>

                            </div>
                        </div>
                        <a href="/courriers-sortants/<?php echo e($courrier->courrier_sortant_id); ?>/edit" style="margin-top: 8px"><i
                                class="fa fa-arrow-right"></i><b><?php echo e(__('Basculer vers courrier sortant')); ?></b></a>

                    </div>
                    <?php endif; ?>


                    <br>
                    <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>"><?php echo e(__('Génération des documents')); ?> : </h5>
                    <hr>
                    <div class="row">
                        <button type="button"
                            class="btn delete-row btn-danger-table <?php echo e(__('costum_css.float-right-btn-m')); ?>"> <i
                                class="fa fa-file" style="margin-right : 4px"></i> <b><?php echo e(__('Accusé de récéption')); ?></b>
                        </button>
                    </div>

                    <br>
                    <div class="row">
                        <button type="button"
                            class="btn delete-row btn-danger-table <?php echo e(__('costum_css.float-right-btn-m')); ?>"
                            style="color : #f99830"> <i class="fa fa-file" style="margin-right : 4px"></i>
                            <b><?php echo e(__('Fiche de courrier')); ?></b>
                        </button>
                    </div>


                    <br>
                    <br>
                    <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>"><?php echo e(__('Edition')); ?> : </h5>
                    <hr>
                    <button type="button" id="activate_form_edit_btn" class="btn  btn-success activate-form-btn"
                        style="width:90%;margin:auto auto 4px auto;display: block;"><i class="fa fa-edit"
                            style="margin-right: 8px;margin-left: 8px;"></i><?php echo e(__('Activer la modification')); ?></button>
                    <?php if(Auth::user()->role->first()->role_name == "admin" || Auth::user()->role->first()->role_name ==
                    "bureau_ordre"): ?>
                    <?php if($courrier->etat->first()->nom == "brouillon"): ?>
                    <button type="button" id="valider_courrier_entrant_btn" class="btn  btn-success disabled"
                        style="width:90%;margin:auto auto 4px auto;display: block;" disabled><i class="fa fa-edit"
                            style="margin-right: 8px;margin-left: 8px;"></i><?php echo e(__('Valider')); ?></button>
                    <?php endif; ?>


                    <?php if($courrier->etat->first()->nom == "en_cours"): ?>
                    <button type="button" id="cloture_courrier_edit_btn" class="btn  btn-success disabled"
                        style="width:90%;margin:auto auto 4px auto;display: block;" disabled><i class="fa fa-edit"
                            style="margin-right: 8px;margin-left: 8px;"></i><?php echo e(__('Cloturer')); ?></button>
                    <?php endif; ?>
                    <?php endif; ?>


                    <button type="submit" id="save_edit_btn" class="btn  btn-success submit-btn-edit disabled"
                        style="width:90%;margin-top:4x;margin:auto auto 4px auto;display: block;"><i class="fa fa-save"
                            style="margin-right: 8px;margin-left: 8px;" disabled></i><?php echo e(__('Enregistrer')); ?></button>
                    <?php echo Form::close(); ?>

                    <?php echo Form::open(['route' => ['courriers-delete'],'id'=>'delete_form','method' => 'POST']); ?>

                    <input type="hidden" name="type_courrier" value="entrant">
                    <input type="hidden" name="courrier_id" value="<?php echo e($courrier->id); ?>">
                    <button type="submit" class="btn  btn-danger disabled"
                        style="width:90%;margin:auto auto 4px auto;display: block;" disabled><i class="fa fa-trash"
                            style="margin-right: 8px;margin-left: 8px;"></i><?php echo e(__('Supprimer')); ?></button>
                    <?php echo Form::close(); ?>

                </div>

                <!-- /.box-body -->
            </div>
            <!-- /. box -->
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row --><?php /**PATH C:\xampp\htdocs\bureau_ordre\resources\views/courriers/entrants/edit/form_edit_courrier_entrant.blade.php ENDPATH**/ ?>