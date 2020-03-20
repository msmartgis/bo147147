<ul class="navbar-nav <?php echo e(__('costum_css.m-font')); ?>">
    <li class="nav-item <?php echo e(Route::is('home') ? 'active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('home')); ?>"><span class="active-item-here"></span>
            <img src="<?php echo e(asset('images/svg/home.svg')); ?>" style="width: 1.2em;margin-right: 5px;" />
            <span style="vertical-align: middle;" class="lato-bold"><?php echo e(__('TABLEAU DE BORD')); ?></span>
        </a>
    </li>


    <li
        class="nav-item  <?php echo e(Route::is('documents-entrants') || Route::is('documents-entrants-create') || Route::is('courriers-entrants.edit')   ? 'active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('documents-entrants')); ?>"><span class=""></span>
            <img src="<?php echo e(asset('images/svg/writing.svg')); ?>" style="width: 1.2em;margin-right: 5px;" />
            <span style="vertical-align: middle;" class="lato-bold"><?php echo e(__('COURRIERS ENTRANTS')); ?></span>
        </a>
    </li>

    <li
        class="nav-item <?php echo e(Route::is('documents-sortants') || Route::is('documents-sortants-create') || Route::is('courriers-sortants.edit')   ? 'active' : ''); ?> ">
        <a class="nav-link" href="<?php echo e(route('documents-sortants')); ?>"><span class=""></span>
            <img src="<?php echo e(asset('images/svg/writing.svg')); ?>" style="width: 1.2em;margin-right: 5px;" />
            <span style="vertical-align: middle;" class="lato-bold"><?php echo e(__('COURRIERS SORTANTS')); ?></span></a>
    </li>

    <li
        class="nav-item <?php echo e(Route::is('diffusions-internes') ||  Route::is('diffusions-internes-create') || Route::is('diffusions-internes.edit') ? 'active' : ''); ?> ">
        <a class="nav-link" href="<?php echo e(route('diffusions-internes')); ?>"><span class=""></span>
            <img src="<?php echo e(asset('images/svg/writing.svg')); ?>" style="width: 1.2em;margin-right: 5px;" />
            <span style="vertical-align: middle;" class="lato-bold"><?php echo e(__('DIFFUSION INTERNES')); ?></span></a>
    </li>
    <?php if(Auth::user()->is('admin')): ?>
    <li class="nav-item <?php echo e(Route::is('parametres.index') ? 'active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('parametres.index')); ?>"><span class=""></span>
            <img src="<?php echo e(asset('images/svg/settings-gears.svg')); ?>" style="width: 1.2em;margin-right: 5px;" />
            <span style="vertical-align: middle;" class="lato-bold"><?php echo e(__('PARAMETRES')); ?></span></a>
    </li>
    <?php endif; ?>

</ul><?php /**PATH E:\xampp\htdocs\smartgis\bureau_ordre\resources\views/inc/navbar.blade.php ENDPATH**/ ?>