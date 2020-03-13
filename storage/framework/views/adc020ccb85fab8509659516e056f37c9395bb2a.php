
<h4>Gestion des utilisateurs:</h4>
<hr>



<div class="box" style="background-color: unset !important;;-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
	<div class="box-header with-border" style="background: #FFF;">
		<h5 class="box-title"> Ajouter un utilisateur</h5>
		 
	</div>
	<div class="box-body" style="padding: 8px;">
		 <?php echo Form::open(['action' => 'UsersController@store','method'=>'POST','class'=>'form-create']); ?>

	<div class="row" style="padding: 12px;margin: 12px;border:1px solid rgba(216,216,216,0.45);">
		<div class="row col-12">
			<div class="col-lg-2 col-md-2">
				<?php echo e(Form::label('','Nom :')); ?>

			</div>
			<div class="col-lg-3 col-md-3">
				<?php echo e(Form::text('last_name','',['class'=>'form-control','required'=>'required'])); ?>

			</div>


			<div class="col-lg-2 col-md-2">
				<?php echo e(Form::label('','Prénom :')); ?>

			</div>
			<div class="col-lg-3 col-md-3">
				<?php echo e(Form::text('first_name','',['class'=>'form-control','required'=>'required'])); ?>

			</div>
		</div>


		<div class="row col-12" style="margin-top: 8px">
			<div class="col-lg-2 col-md-2">
				<?php echo e(Form::label('','Identification :')); ?>

			</div>
			<div class="col-lg-3 col-md-3">
				<?php echo e(Form::text('username','',['class'=>'form-control','required'=>'required'])); ?>

			</div>

			<div class="col-lg-2 col-md-2">
				<?php echo e(Form::label('','Mot de passe provisoire :')); ?>

			</div>
			<div class="col-lg-3 col-md-3">
				<input type="password" name="password" class="form-control" >
			</div>
		</div>

		<div class="row col-12" style="margin-top: 8px">
			<div class="col-lg-2 col-md-2">
				<?php echo e(Form::label('','Service :')); ?>

			</div>

			<div class="col-lg-3 col-md-3">
                <div class="form-group">
					<select placeholder="Service" class="form-control select2" style="width: 100%;" name="service_id">
						<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($service->id); ?>"><?php echo e($service->nom); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>				
			</div>

		</div>
    <div class="row col-12" style="margin-top: 18px;display: flex;align-items: center;justify-content: center;">
        <button type="submit"  class="btn btn-success"  ><i class="fa fa-plus" style="margin-right: 6px"></i>Ajouter </button>
    </div>
</div>
<?php echo Form::close(); ?>

	</div>								 
</div>	

<div class="box" style="background-color: unset !important;;-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
	<div class="box-header with-border" style="background: #FFF;">
		<h5 class="box-title"> Listes des utilisateurs</h5>
		 
	</div>
	<div class="box-body" style="padding: 8px;">
		<div class="table-responsive" style="margin: 12px;margin-bottom: 0 !important;">
			<table class="table table-hover table-striped datatables" id="users_datatables" >
				<thead>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Identification</th>
					<th></th>
				</thead>
			</table>
		</div>
	</div>								 
</div>		

 
 



<?php /**PATH C:\xampp\htdocs\bureau_ordre\resources\views/parametres/users.blade.php ENDPATH**/ ?>