<ul class="navbar-nav">
    <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('home')}}"><span class="active-item-here"></span>
            <img src="{{asset('images/svg/home.svg')}}" style="width: 1.2em;margin-right: 5px;" />
            <span style="vertical-align: middle;" class="lato-bold">TABLEAU DE BORD</span>
        </a>
    </li>


    <li
        class="nav-item  {{ Route::is('documents-entrants') || Route::is('documents-entrants-create') || Route::is('courriers-entrants.edit')   ? 'active' : '' }}">
        <a class="nav-link" href="{{route('documents-entrants')}}"><span class=""></span>
            <img src="{{asset('images/svg/writing.svg')}}" style="width: 1.2em;margin-right: 5px;" />
            <span style="vertical-align: middle;" class="lato-bold">COURRIERS ENTRANT</span>
        </a>
    </li>

    <li
        class="nav-item {{ Route::is('documents-sortants') || Route::is('documents-sortants-create') || Route::is('courriers-sortants.edit')   ? 'active' : '' }} ">
        <a class="nav-link" href="{{route('documents-sortants')}}"><span class=""></span>
            <img src="{{asset('images/svg/writing.svg')}}" style="width: 1.2em;margin-right: 5px;" />
            <span style="vertical-align: middle;" class="lato-bold">COURRIERS SORTANTS</span></a>
    </li>

    <li
        class="nav-item {{ Route::is('diffusions-internes') ||  Route::is('diffusions-internes-create') || Route::is('diffusions-internes.edit') ? 'active' : '' }} ">
        <a class="nav-link" href="{{route('diffusions-internes')}}"><span class=""></span>
            <img src="{{asset('images/svg/writing.svg')}}" style="width: 1.2em;margin-right: 5px;" />
            <span style="vertical-align: middle;" class="lato-bold">DIFFUSION INTERNES</span></a>
    </li>

    <li class="nav-item {{ Route::is('parametres.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('parametres.index')}}"><span class=""></span>
            <img src="{{asset('images/svg/settings-gears.svg')}}" style="width: 1.2em;margin-right: 5px;" />
            <span style="vertical-align: middle;" class="lato-bold">PARAMETRES</span></a>
    </li>
</ul>