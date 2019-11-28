
<!-- add source financement-->
<div class="modal fade" id="password_verification_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Veuillez saisir votre mot de passe</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['action' => 'UsersController@userVerification','method'=>'post','class'=>'password-verif-form']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example_input_full_name">Mot de passe:</label>
                                <input type="password"  class="form-control "  name="password">
                                <input type="hidden"  class="form-control"  name="username" value="{{Auth::user()->username}}">
                                <input type="hidden"  class="form-control"  name="item_id" value="" id="item_to_delete_id_inpt">
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>Annuler</button>
                <button type="submit" class="btn btn-success float-right" > <i class="fa fa-check"></i>Verifier</button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- end modals -->