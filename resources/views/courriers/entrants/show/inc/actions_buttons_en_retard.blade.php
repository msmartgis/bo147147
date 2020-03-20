<div class="row">

    <div class="col-lg-6 col-xl-6 col-md-6 col-12">
        @if (Auth::user()->is('admin') || Auth::user()->is('bureau_ordre'))
        <button type="button" class="btn btn-default {{__('costum_css.pull-left')}} multiple-choice-en-retard"
            id="cloturer_courrier_entrant_en_retard_btn" style="margin-right : 6px" disabled><i
                class="fa fa-calendar-check-o" style="margin-right: 6px;margin-left: 6px"></i>{{ __('Cloturer')}}
        </button>
        @endif
    </div>

    <div class="col-lg-6 col-xl-6 col-md-6 col-12">


    </div>
</div>

<hr style="margin:4px">