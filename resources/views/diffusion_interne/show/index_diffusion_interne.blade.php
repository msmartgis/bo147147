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
                @include('diffusion_interne.show.filters')

                <div class="row">
                    <div class="col-lg-6 col-xl-6 col-md-6 col-12">

                    </div>

                    <div class="col-lg-6 col-xl-6 col-md-6 col-12">
                        @if (Auth::user()->is('admin') || Auth::user()->is('bureau_ordre'))
                        <button type="button"
                            class="btn btn-danger  {{__('costum_css.pull-right')}}   multiple-choice-brouillon"
                            id="supprimer_diffusion_interne_btn" style="margin-right : 6px" disabled><i
                                class="fa fa-trash" style="margin-right: 6px;margin-left: 6px"></i>{{ __('Supprimer')}}
                        </button>
                        @endif

                        @if (Auth::user()->role->first()->role_name == "bureau_ordre" ||
                        Auth::user()->role->first()->role_name == "admin")
                        <a href="{{ route('diffusions-internes-create') }}"
                            class="btn btn-default {{__('costum_css.pull-right')}} " style="margin-right:4px"><i
                                class="fa fa-plus"
                                style="margin-right: 6px;margin-left: 6px"></i>{{__('Nouvelle diffusion')}}</a>
                        @endif
                    </div>
                </div>

                <hr style="margin:4px">
                <div class="table-responsive">
                    <table class="table table-hover datatables dataTable no-footer" id="diffusion_interne_datatables"
                        style="width:100% ;">
                        <thead>
                            <th></th>
                            <th>{{__('Réf')}}</th>
                            <th>{{__('Objet')}}</th>
                            <th>{{__('Date envoi')}}</th>
                            <th>{{__('P.J')}}</th>
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
<script src="{{asset('js/diffusion_interne/show/index_show.js')}}"></script>
@endpush