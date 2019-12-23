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
                @include('courriers.entrants.show.tabs')
                <!-- Tab panes -->
                    <div class="tab-content" style="margin-top: 15px">
                        
                        @include('courriers.entrants.show.tabs.tab_brouillons')
                        @include('courriers.entrants.show.tabs.tab_en_cours')
                        @include('courriers.entrants.show.tabs.tab_en_retard')
                        @include('courriers.entrants.show.tabs.tab_cloture')
                        @include('courriers.entrants.show.tabs.tab_tous')
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
 <script src="{{asset('js/courriersEntrants/show/index_show_tous.js')}}"></script>
 <script src="{{asset('js/courriersEntrants/show/index_show_brouillon.js')}}"></script>
 <script src="{{asset('js/courriersEntrants/show/index_show_en_cours.js')}}"></script>
 <script src="{{asset('js/courriersEntrants/show/index_show_en_retard.js')}}"></script>
 <script src="{{asset('js/courriersEntrants/show/index_show_cloture.js')}}"></script>
 <script src="{{asset('js/courriersEntrants/show/index_show_courrier_entrants.js')}}"></script>

@endpush