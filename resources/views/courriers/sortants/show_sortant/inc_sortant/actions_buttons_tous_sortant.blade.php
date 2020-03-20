<div class="row">
    <div class="col-lg-6 col-xl-6 col-md-6 col-12">

    </div>

    <div class="col-lg-6 col-xl-6 col-md-6 col-12">

        {{Form::open(array('url' => 'registre-courrier-sortant','target'=>'print_popup', 'method' => 'poste','class' => 'fiche-word registre-word','onsubmit'=>'window.open("about:blank","print_popup","width=800,height=640");'))  }}
        <button type="button"
            class="btn btn-default {{__('costum_css.pull-right')}} pull-right multiple-choice-en-cours"
            style="margin-right : 6px" id="registre_generate_btn"><i class="fa fa-file"
                style="margin-right: 6px;margin-left: 6px"></i>{{__('Registre des courriers sortants')}} </button>
        {{Form::close()}}


    </div>
</div>

<hr style="margin:4px">