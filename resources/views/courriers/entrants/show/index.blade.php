@extends('layouts.master')

@section('added_css')
<link rel="stylesheet" href="{{asset('css/datatable/datatables.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/datatable/select.dataTables.min.css')}}" />
<style>
    .nav-tabs {
        border-bottom: 1px solid #009dc5;
    }


    .en-retard-line {
        background-color: #ff3200;
    }

    .cloturer-line {
        background-color: #9fd037;
    }

    .en-cours-line {
        background-color: #009dc5;
    }

    .brouillon-line {
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
                    @if (Auth::user()->role->first()->role_name == "bureau_ordre" || Auth::user()->role->first()->role_name == "admin")
                        @include('courriers.entrants.show.tabs.tab_brouillons')
                    @endif
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

<script>
    $('.date-range-input').daterangepicker({
        locale: {
        format: '{{ config('app.date_format_javascript') }}'
        }
    });


    $('#registre_generate_btn').on('click',function(){
        var date_range = $('#date_reception_daterange_id').val();
        $('.registre-word').append('<input type="hidden" name="date_reception_tous_daterange" value="'+date_range+'" />');  
        $('.registre-word').submit();
        
    })
</script>


<script src="{{asset('css/datatable/datatables.min.js')}}"></script>
<script src="{{asset('js/courriersEntrants/show/index_show_tous.js')}}"></script>
<script src="{{asset('js/courriersEntrants/show/index_show_brouillon.js')}}"></script>
<script src="{{asset('js/courriersEntrants/show/index_show_en_cours.js')}}"></script>
<script src="{{asset('js/courriersEntrants/show/index_show_en_retard.js')}}"></script>
<script src="{{asset('js/courriersEntrants/show/index_show_cloture.js')}}"></script>
<script src="{{asset('js/courriersEntrants/show/index_show_courrier_entrants.js')}}"></script>

@endpush