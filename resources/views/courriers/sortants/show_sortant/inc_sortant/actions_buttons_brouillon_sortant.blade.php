<div class="row">
    <div class="col-lg-6 col-xl-6 col-md-6 col-12">
        @if (Auth::user()->is('admin') || Auth::user()->is('bureau_ordre'))
        <button type="button" class="btn btn-default {{__('costum_css.pull-left')}} multiple-choice-brouillon"
            id="valider_courrier_sortant_btn" style="margin-right : 6px" disabled><i class="fa fa-thumbs-up"
                style="margin-right: 6px;margin-left: 6px"></i>{{ __('Valider')}} </button>
        @endif
    </div>

    <div class="col-lg-6 col-xl-6 col-md-6 col-12">

        @if (Auth::user()->is('admin') || Auth::user()->is('bureau_ordre'))
        <a href="{{ route('documents-sortants-create') }}" class="btn btn-default {{__('costum_css.pull-right')}} "
            style="margin-right:4px"><i class="fa fa-plus"
                style="margin-right: 6px;margin-left: 6px"></i>{{__('Ajouter une sortie')}}</a>
        @endif
    </div>
</div>

<hr style="margin:4px">