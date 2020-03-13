<div class="tab-pane " id="en_cours_tab" role="tabpanel">
    <div class="pad">
        <?php echo $__env->make('courriers.entrants.show.filters.filters_en_cours', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('courriers.entrants.show.inc.actions_buttons_en_cours', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="table-responsive">
            <table class="table table-hover datatables dataTable no-footer" id="courriers_entrant_en_cours_datatables"
                style="width:100% ;">
                <thead>
                    <th></th>
                    <th><?php echo e(__('Priorité')); ?></th>
                    <th><?php echo e(__('Réf')); ?></th>
                     <th><?php echo e(__('Catégorie')); ?></th>
                    <th><?php echo e(__('Date Réception')); ?></th>
                    <th><?php echo e(__('Expediteur')); ?></th>
                    <th><?php echo e(__('Objet')); ?></th>
                    <th><?php echo e(__('Delai')); ?></th>
                    <th><?php echo e(__('P.J')); ?></th>
                    <th><?php echo e(__('Sortant')); ?></th>
                </thead>
            </table>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\bureau_ordre\resources\views/courriers/entrants/show/tabs/tab_en_cours.blade.php ENDPATH**/ ?>