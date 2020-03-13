<ul class="nav nav-tabs " role="tablist" style="margin-top:16px;">
        <?php if(Auth::user()->role->first()->role_name == "bureau_ordre" || Auth::user()->role->first()->role_name ==
        "admin"): ?>
        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#brouillons_tab" role="tab"
                        style="font-size: 13px;"><span class="hidden-sm-up"><i><img
                                                src="<?php echo e(asset('images/svg/calendar-clock.svg')); ?>"
                                                style="width: 20px;"></i></span> <span
                                class="hidden-xs-down m-font-bold ">
                                <b><?php echo e(__('BROUILLONS')); ?></b></span></a> </li>
        <?php endif; ?>
        <li class="nav-item"> <a class="nav-link 
                <?php if(Auth::user()->role->first()->role_name == 'president'): ?> active <?php endif; ?> " data-toggle='tab'
                        href="#en_cours_tab" role="tab" style="font-size: 13px;"><span class="hidden-sm-up"><i><img
                                                src="<?php echo e(asset('images/svg/thumbs-up-.svg')); ?>"
                                                style="width: 20px;"></i></span> <span
                                class="hidden-xs-down m-font-bold"> <b>
                                        <?php echo e(__('EN COURS')); ?> </b></span></a> </li>
        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#en_retard_tab" role="tab"
                        style="font-size: 13px;"><span class="hidden-sm-up"><i><img
                                                src="<?php echo e(asset('images/svg/signing-the-contract.svg')); ?>"
                                                style="width: 20px;"></i></span> <span
                                class="hidden-xs-down m-font-bold"><b><?php echo e(__('EN RETARD')); ?> </b></span></a> </li>
        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#cloture_tab" role="tab"
                        style="font-size: 13px;"><span class="hidden-sm-up"><i><img
                                                src="<?php echo e(asset('images/svg/calendar.svg')); ?>"
                                                style="width: 20px;"></i></span> <span
                                class="hidden-xs-down m-font-bold"><b><?php echo e(__('CLOTURES')); ?></b></span></a> </li>
        <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#tous_tab" role="tab"
                        style="font-size: 13px;"><span class="hidden-sm-up"><i><img
                                                src="<?php echo e(asset('images/svg/folder.svg')); ?>"
                                                style="width: 20px;"></i></span> <span
                                class="hidden-xs-down m-font-bold">
                                <b><?php echo e(__('TOUS')); ?></b>
                        </span></a> </li>
</ul><?php /**PATH E:\xampp\htdocs\smartgis\bureau_ordre\resources\views/courriers/entrants/show/tabs.blade.php ENDPATH**/ ?>