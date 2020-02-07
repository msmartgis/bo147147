
<h4>Gestion des utilisateurs:</h4>
<hr>



<div class="box" style="background-color: unset !important;;-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
	<div class="box-header with-border" style="background: #FFF;">
		<h5 class="box-title"> Ajouter un utilisateur</h5>
		 
	</div>
	<div class="box-body" style="padding: 8px;">
		 {!! Form::open(['action' => 'UsersController@store','method'=>'POST','class'=>'form-create','id' => 'users_form']) !!}
	<div class="row" style="padding: 12px;margin: 12px;border:1px solid rgba(216,216,216,0.45);">
		<div class="row col-12">
			<div class="col-lg-2 col-md-2">
				{{Form::label('','Nom :')}}
			</div>
			<div class="col-lg-3 col-md-3">
				{{Form::text('nom','',['class'=>'form-control','required'=>'required'])}}
			</div>


			<div class="col-lg-2 col-md-2">
				{{Form::label('','Prénom :')}}
			</div>
			<div class="col-lg-3 col-md-3">
				{{Form::text('prenom','',['class'=>'form-control','required'=>'required'])}}
			</div>
		</div>


		<div class="row col-12" style="margin-top: 8px">
			<div class="col-lg-2 col-md-2">
				{{Form::label('','Identification :')}}
			</div>
			<div class="col-lg-3 col-md-3">
				{{Form::text('username','',['class'=>'form-control','required'=>'required'])}}
			</div>

			<div class="col-lg-2 col-md-2">
				{{Form::label('','Service :')}}
			</div>

			<div class="col-lg-3 col-md-3">
                <div class="form-group">
					<select placeholder="Service" class="form-control select2" style="width: 100%;" name="service_id">
						@foreach($services as $service)
							<option value="{{$service->id}}">{{$service->nom}}</option>
						@endforeach
					</select>
				</div>				
			</div>
		</div>

		<div class="row col-12" style="margin-top: 8px">
			<div class="col-lg-2 col-md-2">
				{{Form::label('','Mot de passe provisoire')}}
			</div>
			<div class="col-lg-3 col-md-3">
				<input type="password" name="password" id="pasword_inpt" class="form-control" required>
			</div>
			
			
			<div class="col-lg-2 col-md-2">
				{{Form::label('','Confimer le mot de passe ')}}
			</div>
			<div class="col-lg-3 col-md-3">
				<input type="password" name="confirm-password" id="confirm_pasword_inpt" class="form-control" required>
				<span id='message_password_confirmation'></span>
			</div>	

		</div>
		<div class="row col-12" style="margin-top: 18px;display: flex;align-items: center;justify-content: center;">
			<button type="button"  class="btn btn-success"  id="add_user_btn"><i class="fa fa-plus" style="margin-right: 6px"></i>Ajouter</button>
		</div>
</div>
{!! Form::close() !!}
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
					<th>Service</th>
					<th></th>
				</thead>
			</table>
		</div>
	</div>								 
</div>		

 
 



