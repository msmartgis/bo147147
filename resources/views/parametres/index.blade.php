@extends('layouts.master')

@section('added_css')
    <link rel="stylesheet" href="{{asset('css/datatable/datatables.min.css')}}" />
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('vendor_components/select2/dist/css/select2.min.css')}}" />
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" />

    <!--alerts CSS -->
    <link href="{{asset('vendor_components/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">
<style>


</style>
    
@endsection

@section('content')

	 <div class="row ">
        <div class="col-12">
            <div class="box ">
                <!-- /.box-header -->
                <div class="box-body" style="padding : 10px">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="box" style="border-top: 0;border-bottom: 0">
                                        <!-- /.box-header -->
                                        <div class="box-body">
											<div class="vtabs  col-lg-12" style="padding: 0;" id="tabs_demande_lg">		
												<ul class="nav nav-tabs tabs-vertical  tabs-warning" role="tablist" style="width:300px;" >
													<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#users" role="tab" aria-expanded="true" style="display: flex;" > <span><i style="font-size:18px;" class="mdi mdi-account-settings"></i></span><span style="margin: auto; margin-left: 8px;" class="hidden-xs-down">&nbspUtilisateurs</span> </a> </li>
													<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#services" role="tab" aria-expanded="false" style="display: flex;"> <span><i style="font-size:18px;" class="mdi mdi-contact-mail"></i></span><span style="margin: auto; margin-left: 8px;"  class="hidden-xs-down">&nbspServices</span> </a> </li>
											
												</ul>
												<div class="tab-content" style="margin : 0 !important;margin-top: 0 !important;">
													<div class="tab-pane active" id="users" role="tabpanel" aria-expanded="true" >
													   @include('parametres.users')
													</div>
													<div class="tab-pane pad" id="services" role="tabpanel" aria-expanded="false" >
														   @include('parametres.services')
													</div>	
													 
												</div>
													 
											</div>
                                     
											{{-- @include('parametres.modals') --}}
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>

            <!-- /.box -->
        </div>
    </div>

@endsection

@push('added_scripts')

<script src="{{asset('css/datatable/datatables.min.js')}}"></script>

<!-- iCheck 1.0.1 -->
<script src="{{asset('vendor_plugins/iCheck/icheck.min.js')}}"></script>

<!-- bootstrap time picker -->
<script src="{{asset('vendor_plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>


<!-- date-range-picker -->
<script src="{{asset('vendor_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('vendor_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Form validator JavaScript -->
<script src="{{asset('js/validation.js')}}"></script>
<!-- Formatter -->
<script src="{{asset('vendor_components/formatter/formatter.js')}}"></script>
<script src="{{asset('vendor_components/formatter/jquery.formatter.js')}}"></script>
<script src="{{asset('js/formatter.js')}}"></script>


<script src="{{asset('js/parametres/settings.js')}}"></script>

@endpush