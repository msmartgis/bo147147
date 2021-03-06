
<?php echo Form::model($courrier,[
    'action' => 'CourrierSortantController@store',
    'method'=>'POST',
    'class'=>'tab-wizard wizard-circle form-create',
    'id'=>'create_demande_form',
    'enctype' => 'multipart/form-data'
    ]); ?>

        <!-- Step 1 -->
        <h6>Informations Générales</h6>
        <section>
            <div class="row">
            <input type="hidden" name="courrier_entrant_id" value="<?php echo e($courrier_entrant->id); ?>">
                
                <div class="col-lg-6 col-md-6 col-sm-12" style="border-right-width: 1px;;border-right-style: solid;border-right-color: #d4d4d4;">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <?php echo e(Form::label('','Réf courrier :')); ?>

                                <?php echo e(Form::text('ref','',['class'=>'form-control','required'=>'required'])); ?>

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">                            
                                <div class="form-group">
                                    <?php echo e(Form::label('','Date d\'envoie:')); ?>

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
 

                    <div class="row" style="margin-top: 10px">
                        <div class="col-12">
                            <div class="form-group">
                                <h6>Objet</h6>
                           
                                <div class="controls">
                                    <?php echo e(Form::textarea('objet','',['class'=>'form-control m-required-input','placeholder'=>'saisir l\'objet en francais','rows'=>'2','id'=>'objet_fr_input_id','required'=>'required'])); ?>

                                </div>
                            </div>
                        </div>
                    </div>                    

                </div>
                
                 
                 <div class="col-lg-6 col-md-6 col-sm-12" style="padding-left : 15px">
                     
                     <div class="row">  
                       
                                              
                         <div class="col-lg-6">
                             <h5>Destinataire</h5>
                             
                             <?php if($courrier_entrant->personnePhysique != null ): ?>
                                <div class="form-group">  
                                    <input type="hidden" name="personne_physique_from_entrant_id" value="<?php echo e($courrier_entrant->personnePhysique()->first()->id); ?>">
                                    <?php echo e(Form::text('personne_physqique',$courrier_entrant->personnePhysique()->first()->full_name,['class'=>'form-control','required'=>'required','disabled' => 'disabled'])); ?>

                                </div>                               
                             <?php else: ?>
                                <div class="form-group">  
                                    <input type="hidden" name="personne_morale_from_entrant_id" value="<?php echo e($courrier_entrant->personneMorale()->first()->id); ?>">
                                    <?php echo e(Form::text('personne_morale',$courrier_entrant->personneMorale()->first()->raison_social,['class'=>'form-control','required'=>'required','disabled' => 'disabled'])); ?>

                                </div>                                    
                             <?php endif; ?>                          
                         </div>
                         
                         <div class="col-lg-6">
                             <h5> Mode d'envoi</h5>
                            <div class="form-group">                               
                                <?php echo e(Form::select('modes_envoi', $modes_recpetion, null,
                                [
                                'data-placeholder' => 'Selectionner mode de reception',
                                'class'=>'form-control ',
                                'name'=>'mode_envoi_id',
                                'style'=>'width:100%'
                                ]
                                )); ?>

                            </div>
                         </div>
                     </div>
                    

                    
                 </div>
            </div>
        </section>
        <!-- Step 2 -->
        <h6>Acheminement et traitement</h6>
        <section>
            
            <h5>AJOUTER LES DOCUMENTS FOURNIS</h5>
            <hr>
            <div class="row" style="margin: 0 !important;">
                <div class="table-responsive" style="margin-top: 12px">
                    <table class="table table-piece">
                        <thead class="create-table">
                            <tr style="text-align: center;">
                                <th></th>
                                <th>Type de document</th>
                                <th>Intitulé</th>
                                <th>Mode d'envoi</th>
                                <th>Date d'envoi</th>
                                <th>Charger</th>
                            </tr>
                        </thead>
                        <tbody id="piece_courrier_tbody">
                        <tr>
                         
                        </tr>
                        </tbody>
                    </table>

                    <div style="text-align: center">
                        <a href="#" id="add_piece_btn"> <i class="fa fa-plus"></i>
                            <b> Ajouter </b>
                        </a>
                    </div>
                    <button type="button" class="btn delete-row btn-danger-table" id="delete_documents_row_btn"> <i class="fa fa-close"></i> Supprimer</button>
                </div>
            </div>
            <br>

            <h5>ACCUSE D'ENVOI</h5>
            <hr>

             <div class="row" style="margin: 0 !important;">
                <div class="table-responsive" style="margin-top: 12px">
                    <table class="table table-accuse-reception">
                        <thead class="create-table">
                             <tr style="text-align: center;">
                                <th></th>
                                <th>Date</th>
                                <th>Accusé</th>
                             </tr>
                        </thead>
                       
                        <tbody id="acusse_reception_tbody">
                        <tr>
                         
                        </tr>
                        </tbody>
                    </table>

                    <div style="text-align: center">
                        <a href="#" id="add_accuse_reception_btn"> <i class="fa fa-plus"></i>
                            <b> Ajouter </b>
                        </a>
                    </div>
                    <button type="button" class="btn delete-row btn-danger-table" id="delete_accuse_rception_row_btn"> <i class="fa fa-close"></i> Supprimer</button>
                </div>
            </div>

         
        </section>

     

        <?php echo Form::close(); ?>

<?php /**PATH C:\xampp\htdocs\bureau_ordre\resources\views/courriers/sortants/create/form_add_courrier_sortant_from_entrant.blade.php ENDPATH**/ ?>