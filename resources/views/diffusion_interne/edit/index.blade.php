@extends('layouts.master')

@section('added_css')

<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{asset('vendor_plugins/timepicker/bootstrap-timepicker.min.css')}}" />

<!-- bootstrap datepicker -->
<link rel="stylesheet"
    href="{{asset('vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" />
<!-- toast CSS -->
<link href="{{asset('vendor_components/jquery-toast-plugin-master/src/jquery.toast.css')}}" rel="stylesheet">
<style>
    .nav-tabs {
        border-bottom: 1px solid #009dc5;
    }

    .table>thead>tr>th {
        text-align: center;
        background-color: #0b2942 !important;
        color: #F3F3F3 !important;
        border: 1px solid #dbe1e6;
    }

    .m-hidden {
        display: none !important;
    }
</style>

@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="box">
            <h3 style="text-align : center; margin-top : 12px;font-weight: 700;">{{__('Diffusion interne')}}
                {{$diffusionInterne->ref}}
            </h3>
            <!-- /.box-header -->
            <div id="tabs_diffusion_edit" style="margin-left: 12px;">
                @include('diffusion_interne.edit.tabs_edit_di')
                @include('diffusion_interne.edit.form_edit')
            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>


@include('diffusion_interne.edit.modals')
@endsection

@push('added_scripts')
<!-- bootstrap datepicker -->
<script src="{{asset('vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<!-- Fab Admin for advanced form element -->
<script src="{{asset('js/advanced-form-element.js')}}"></script>

<!-- CK Editor -->
<script src="{{asset('vendor_components/ckeditor/ckeditor.js')}}"></script>

<!-- Fab Admin for editor -->
<script src="{{asset('js/editor.js')}}"></script>
<!-- Form validator JavaScript -->
<script src="{{asset('js/validation.js')}}"></script>
<!-- toast -->
<script src="{{asset('vendor_components/jquery-toast-plugin-master/src/jquery.toast.js')}}"></script>
<script src="{{asset('js/toastr.js')}}"></script>


<script src="{{asset('js/diffusion_interne/index_edit_diffusion_interne.js')}}"></script>
<script src="{{asset('js/services/index_services.js')}}"></script>
<script src="{{asset('js/users/index_users.js')}}"></script>
<script src="{{asset('js/modesRecepetion/index_mode_reception.js')}}"></script>
<script src="{{asset('js/documentsTypes/index_documents_types.js')}}"></script>

<script>
    $(".datepicker").datepicker({
            format: 'yyyy-mm-dd'
        });
</script>
@endpush