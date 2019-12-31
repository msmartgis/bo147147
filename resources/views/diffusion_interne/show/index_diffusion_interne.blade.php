@extends('layouts.master')

@section('added_css')
<link rel="stylesheet" href="{{asset('css/datatable/datatables.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/datatable/select.dataTables.min.css')}}" />
<style>


.nav-tabs
{
	    border-bottom: 1px solid #009dc5;
}


.en-retard-line{
	background-color: #ff3200;
}

.cloturer-line{
	background-color: #9fd037;
}

.en-cours-line{
	background-color: #009dc5;
}

.brouillon-line{
	background-color: #7dd8fb;
}
</style>
    
@endsection

@section('content')

	<div class="row">
        <div class="col-12">
            <div class="box">

                <!-- /.box-header -->
                <div class="box-body"> 
                    @include('diffusion_interne.show.filters')

                    <div class="row" >
                            <div class="col-lg-6 col-xl-6 col-md-6 col-12">
                               
                            </div>

                            <div class="col-lg-6 col-xl-6 col-md-6 col-12">            
                                {{Form::open(array('url' => 'ficheDemande','target'=>'print_popup', 'method' => 'poste','class' => 'fiche-word','onsubmit'=>'window.open("about:blank","print_popup","width=800,height=640");'))  }}
                                    <button type="button" class="btn btn-default pull-right multiple-choice-en-cours" id="fiche_demande_en_cours_btn" style="margin-right : 6px" disabled><i class="fa fa-file" style="margin-right: 6px"></i>Fiche de diffusion interne </button>
                                {{Form::close()}}

                                @if (Auth::user()->role->id == 2 || Auth::user()->role->id == 1)
                                    <a href="{{ route('diffusions-internes-create') }}" class="btn btn-default pull-right " style="margin-right:4px"><i class="fa fa-plus" style="margin-right: 6px"></i>Nouvelle diffusion</a>
                                @endif                    
                            </div>      
                    </div>

                    <hr style="margin:4px">


                    <div class="table-responsive">
                        <table class="table table-hover datatables dataTable no-footer" id="diffusion_interne_datatables" style="width:100% ;" >
                            <thead >
                                <th ></th>
                                <th >Réf</th>
                                <th >Date Réception</th>
                                <th>Expediteur</th>
                                <th>Objet</th>
                                <th>Delai</th>
                                <th>P.J</th>
                            </thead>
                        </table>
                    </div>             
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
	

@endsection

@push('added_scripts')
 <script src="{{asset('css/datatable/datatables.min.js')}}"></script>
 <script src="{{asset('js/diffusion_interne/show/index.js')}}"></script>
@endpush