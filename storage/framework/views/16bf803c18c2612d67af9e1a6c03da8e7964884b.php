<div class="tab-pane " id="en_cours_tab" role="tabpanel">
    <div class="pad">
        <?php echo $__env->make('courriers.sortants.show_sortant.filters_sortant.filters_en_cours_sortant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('courriers.sortants.show_sortant.inc_sortant.actions_buttons_en_cours_sortant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="table-responsive">
            <table class="table table-hover datatables dataTable no-footer" id="courriers_sortant_en_cours_datatables"
                style="width:100% ;">
                <thead>
                    <th></th>
                    <th><?php echo e(__('Réf')); ?></th>
                    <th><?php echo e(__('Catégorie')); ?></th>
                    <th><?php echo e(__('Date envoi')); ?></th>
                    <th><?php echo e(__('Destinataire')); ?></th>
                    <th><?php echo e(__('Objet')); ?></th>
                    <th><?php echo e(__('P.J')); ?></th>
                    <th><?php echo e(__('Entrant')); ?></th>
                </thead>
            </table>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\bureau_ordre\resources\views/courriers/sortants/show_sortant/tabs_sortant/tab_en_cours_sortant.blade.php ENDPATH**/ ?>