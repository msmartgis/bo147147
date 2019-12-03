@extends('layouts.master')

@section('added_css')
<style>
.nav-tabs
{
	    border-bottom: 1px solid #009dc5;
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
                        @include('courriers.entrants.show.tabs.tab_tous')
                        @include('courriers.entrants.show.tabs.tab_brouillons')
                        @include('courriers.entrants.show.tabs.tab_en_cours')
                        @include('courriers.entrants.show.tabs.tab_en_retard')
                        @include('courriers.entrants.show.tabs.tab_cloture')
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
	

@endsection

@push('added_scripts')



@endpush