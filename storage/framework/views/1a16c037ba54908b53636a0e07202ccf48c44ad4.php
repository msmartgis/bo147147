<div class="tab-pane " id="tous_tab" role="tabpanel">
    <div class="pad">
        <?php echo $__env->make('courriers.sortants.show_sortant.filters_sortant.filters_tous_sortant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('courriers.sortants.show_sortant.inc_sortant.actions_buttons_tous_sortant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="table-responsive">
            <table class="table table-hover datatables dataTable no-footer" id="courriers_sortant_tous_datatables"
                style="width:100% ;">
                <thead>
                    <th></th>
                    <th><?php echo e(__('Réf')); ?></th>
                    <th><?php echo e(__('Catégorie')); ?></th>
                    <th><?php echo e(__('Date envoi')); ?></th>
                    <th><?php echo e(__('Destinataire')); ?></th>
                    <th><?php echo e(__('Objet')); ?></th>
                    <th><?php echo e(__('P.J')); ?></th>
                    <th><?php echo e(__('Etat')); ?></th>
                    <th><?php echo e(__('Entrant')); ?></th>
                </thead>
            </table>
        </div>
    </div>
</div><?php /**PATH E:\xampp\htdocs\smartgis\bureau_ordre\resources\views/courriers/sortants/show_sortant/tabs_sortant/tab_tous_sortant.blade.php ENDPATH**/ ?>