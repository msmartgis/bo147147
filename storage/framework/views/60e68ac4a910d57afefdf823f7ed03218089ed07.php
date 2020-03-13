<?php echo Form::model($diffusionInterne, ['route' => ['diffusions-internes.update',
$diffusionInterne->id],'id'=>'form_diffusionInterne_edit','class'=>'form-edit','method' => 'PUT','enctype' =>
'multipart/form-data']); ?>

<input type="hidden" name="diffusionInterne_id" value="<?php echo e($diffusionInterne->id); ?>" id="diffusionInterne_id_input">
<div class="row">
    <div class="col-lg-9">
        <div class="row">
            <div class="col-12">
                <div class="box" style="border-top: 0;border-bottom: 0">
                    <!-- /.box-header -->
                    <div class="box-body">
                    <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>"><?php echo e(__('INFORMATIONS GENERALES')); ?></h5>
                        <hr style="color:#2d353c;margin:0">
                        <div class="row" style="margin-top: 8px">
                            <div class="col-lg-6 col-xl-6 col-md-6 col-12">
                                <div class="form-group">
                                    <div class="controls">
                                        <?php echo e(Form::textarea('objet',$diffusionInterne->objet,['class'=>'form-control','rows'=>'2','style'=>'height: 52px !important' ,'disabled' => 'disabled'])); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-xl-6 col-md-6 col-12">

                            </div>
                        </div>

                        <br>
                    <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>"><?php echo e(__('OBSERVATIONS ET REMARQUES')); ?></h5>
                        <hr style="color:#2d353c;margin:0">

                        <div class="col-12" style="margin-top : 8px">
                            <div class="form-group">
                                <?php echo e(Form::textarea('observation', $diffusionInterne->observations, ['id' => 'editor1', 'class' => 'form-control', 'placeholder' => 'Body Text'])); ?>

                            </div>
                        </div>


                        <br>
                        <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>"><?php echo e(__('PIECE ATTACHEES')); ?></h5>
                        <hr style="color:#2d353c;margin:0">

                        <div class="row" style="margin: 0 !important;">
                            <div class="table-responsive" style="margin-top: 12px">
                                <table class="table table-piece">
                                    <thead class="create-table">
                                        <tr style="text-align: center;">
                                            <th><?php echo e(__('Réf')); ?></th>                                            
                                            <th><?php echo e(__('Intitulé')); ?></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="piece_diffusionInterne_tbody">
                                        <?php $__currentLoopData = $diffusionInterne->piece; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <input type="hidden" name="documents_ids[]" value="<?php echo e($item->id); ?>">

                                            <td style="text-align: center">
                                                <?php echo e($item->ref); ?>

                                            </td>

                                            <td style="text-align: center">
                                                <?php echo e($item->nom_document); ?>

                                            </td>

                                            <td style="text-align: center;">
                                                <?php if($item->path != ''): ?>
                                                <a
                                                    href="/files/download/diffusion-internes/diffusion-internes/<?php echo e($diffusionInterne->id); ?>/<?php echo e($item->path); ?>">
                                                    <button type="button" class="btn btn-success-table ">
                                                        <i class="fa fa-download"></i>
                                                       <?php echo e(__('Télécharger')); ?> </button>
                                                </a>
                                                <?php endif; ?>

                                                <?php if(Auth::user()->role->first()->role_name == "bureau_ordre" ||
                                                Auth::user()->role->first()->role_name == "admin"): ?>
                                                <button type="button" class="btn delete-row btn-danger-table m-hidden">
                                                    <i class="fa fa-close"></i> <?php echo e(__('Supprimer')); ?> </button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>

                                <div style="text-align: center">
                                    <a href="#" id="add_piece_btn" class="m-hidden"> <i class="fa fa-plus"></i>
                                        <b><?php echo e(__('Ajouter')); ?>  </b>
                                    </a>
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
    <div class="col-lg-3 m-min-hight" style="border-top: 1px solid #deedf3;">
        <div class="h-p100  bg-light bg-secondary-gradient" style="padding-right: 5px;height: 100%;">
            <div class="box bg-transparent no-border no-shadow ">
                <div class="box-body no-padding mailbox-nav ">

                    <div class="row row-edit">
                        <div class="col-lg-4">
                            <?php echo e(Form::label('',trans('Envoyée le').' : ',['style'=> 'font-size : 11px'])); ?>

                        </div>
                        <div class="col-lg-8">
                            <div class="form-group form-group-edit">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <?php echo e(Form::text('date_envoi',$diffusionInterne->date_envoi,['class'=>'form-control
                                    pull-right datepicker','disabled'])); ?>

                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>

                    <div class="row row-edit">
                        <div class="col-lg-4">
                            <?php echo e(Form::label('',trans('Nature diffusion') . ' : ',['style'=> 'font-size : 11px,'])); ?>

                        </div>
                        <div class="col-lg-8">
                            <div class="form-group form-group-edit">
                                <?php echo e(Form::select('nature_diffusion_id', $natures_diffusions, $diffusionInterne->nature_diffusion_id,
                                                        [
                                                        'data-placeholder' => 'Selectionner mode de reception',
                                                        'class'=>'form-control ',
                                                        'name'=>'nature_diffusion_id',
                                                        'style'=>'width:100%',
                                                        'disabled'=> 'disabled'
                                                        ]
                                                    )); ?>

                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>

                    <br>
                <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>"><?php echo e(__('Génération des documents')); ?> : </h5>
                    <hr>


                    <button type="button" class="btn delete-row btn-danger-table" style="color : #f99830"> <i
                    class="fa fa-file" style="margin-right : 4px"></i> <b><?php echo e(__('Fiche de diffusion interne')); ?></b> </button>

                    <br>
                    <br>
                    <h5 class="<?php echo e(__('costum_css.float-right-m')); ?>"><?php echo e(__('Edition')); ?> : </h5>
                    <hr>
                    <button type="button" id="activate_form_edit_btn" class="btn  btn-success activate-form-btn"
                        style="width:90%;margin:auto auto 4px auto;display: block;"><i class="fa fa-edit"
                    style="margin-right: 8px;margin-left : 6px"></i><?php echo e(__('Activer la modification')); ?></button>


                    <button type="submit" id="save_edit_btn" class="btn  btn-success submit-btn-edit disabled"
                        style="width:90%;margin-top:4x;margin:auto auto 4px auto;display: block;"><i class="fa fa-save"
                            style="margin-right: 8px;margin-left : 6px" disabled></i><?php echo e(__('Enregistrer')); ?></button>

                    <?php echo Form::close(); ?>



                    <?php echo Form::open(['route' => ['diffusionInterne-delete'],'id'=>'delete_form','method' => 'POST']); ?>

                    <input type="hidden" name="diffusionInterne_id" value="<?php echo e($diffusionInterne->id); ?>">
                    <button type="submit" class="btn  btn-danger disabled"
                        style="width:90%;margin:auto auto 4px auto;display: block;" disabled><i class="fa fa-trash"
                            style="margin-right: 8px;margin-left : 6px"></i><?php echo e(__('Supprimer')); ?></button>
                    <?php echo Form::close(); ?>


                </div>

                <!-- /.box-body -->
            </div>
            <!-- /. box -->
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row --><?php /**PATH C:\xampp\htdocs\bureau_ordre\resources\views/diffusion_interne/edit/form_edit.blade.php ENDPATH**/ ?>