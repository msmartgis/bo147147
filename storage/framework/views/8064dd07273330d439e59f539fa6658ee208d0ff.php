<?php $__env->startSection('added_css'); ?>
<style>
	.more-details {
		color: #003C71;
	}

	.en-retard-line {
		background-color: #ff3200;
	}

	.cloturer-line {
		background-color: #9fd037;
	}

	.en-cours-line {
		background-color: #009dc5;
	}

	.brouillon-line {
		background-color: #7dd8fb;
	}
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div style="padding-top: 16px;margin-left: 8px;">

	<div class="statitics " style=" padding-left: 10px;padding-right: 10px;">
		

		<div class="row">

			<div class="col-xl-3 col-lg-3 col-md-3 col-12">

				<div class="row">
					<div class="box bg-info"
						style="-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
						<div class="box-body" style="background: #003C71;padding-bottom: 0;">
							<div class="flexbox">
								<h5 style="color: #fff !important;margin-top: 6px;"><?php echo e(__('Total des courriers')); ?></h5>
								<div class="dropdown">
									<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i
											class="ion-android-more-vertical rotate-90"></i></span>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
										<a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
										<a class="dropdown-item" href="#"><i class="ion-android-refresh"></i>
											Refresh</a>
									</div>
								</div>
							</div>

							<div class="text-center my-2">
								<div class="font-size-60 text-white" style="font-size:1.45em;"><?php echo e($nombre_courrier); ?>

								</div>
							</div>
						</div>

						<div class="card-body bg-gray-light py-12">
							<a href="/projet" class="small-box-footer" style="z-index: 0;font-weight: 100;"><b>
									<?php echo e(__('Voir les details')); ?> </b> <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>

				<hr>
				<div class="row">
					<div class="col-12" style="text-align: center">
						<h4><?php echo e(__('COURRIERS ENTRANTS')); ?></h4>
					</div>


					<div class="box bg-info"
						style="-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
						<div class="box-body" style="background: #ff3200;padding-bottom: 0;">
							<div class="flexbox">
								<h5 style="color: #fff !important;margin-top: 6px;"><?php echo e(__('Brouillons')); ?></h5>
								<div class="dropdown">
									<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i
											class="ion-android-more-vertical rotate-90"></i></span>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#"><i
												class="ion-android-list"></i><?php echo e(__('Details')); ?> </a>
										<a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
										<a class="dropdown-item" href="#"><i class="ion-android-refresh"></i>
											Refresh</a>
									</div>
								</div>
							</div>

							<div class="text-center my-2">
								<div class="font-size-60 text-white" style="font-size:1.45em;"><?php echo e($courrier_brouillons); ?>

								</div>

							</div>
						</div>

						<div class="card-body bg-gray-light py-12">
							<a href="/projet" class="small-box-footer" style="z-index: 0;font-weight: 100;"><b>
									<?php echo e(__('Voir les details')); ?> </b> <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>

					<div class="box bg-info"
						style="-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
						<div class="box-body" style="background: #FF6600;padding-bottom: 0;">
							<div class="flexbox">
								<h5 style="color: #fff !important;margin-top: 6px;"><?php echo e(__('En cours')); ?></h5>
								<div class="dropdown">
									<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i
											class="ion-android-more-vertical rotate-90"></i></span>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
										<a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
										<a class="dropdown-item" href="#"><i class="ion-android-refresh"></i>
											Refresh</a>
									</div>
								</div>
							</div>

							<div class="text-center my-2">
								<div class="font-size-60 text-white" style="font-size:1.45em;"><?php echo e($courrier_en_cours); ?>

								</div>

							</div>
						</div>

						<div class="card-body bg-gray-light py-12">
							<a href="/projet" class="small-box-footer" style="z-index: 0;font-weight: 100;"><b>
									<?php echo e(__('Voir les details')); ?> </b> <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="box bg-warning"
						style="-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
						<div class="box-body" style="background:#FF8C00;padding-bottom: 0;">
							<div class="flexbox">
								<h5 style="color: #fff !important;margin-top: 6px;"><?php echo e(__('Cloturés')); ?></h5>
								<div class="dropdown">
									<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i
											class="ion-android-more-vertical rotate-90"></i></span>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
										<a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
										<a class="dropdown-item" href="#"><i class="ion-android-refresh"></i>
											Refresh</a>
									</div>
								</div>
							</div>

							<div class="text-center my-2">
								<div class="font-size-60 text-white" style="font-size:1.45em;"><?php echo e($courrier_cloture); ?>

								</div>

							</div>
						</div>

						<div class="card-body bg-gray-light py-12">
							<a href="/projet" class="small-box-footer" style="z-index: 0;font-weight: 100;"><b>
									<?php echo e(__('Voir les details')); ?></b> <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="box bg-success"
						style="-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
						<div class="box-body" style="background: #ff0000;padding-bottom: 0;">
							<div class="flexbox">
								<h5 style="color: #fff !important;margin-top: 6px;"><?php echo e(__('En retards')); ?></h5>
								<div class="dropdown">
									<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i
											class="ion-android-more-vertical rotate-90"></i></span>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
										<a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
										<a class="dropdown-item" href="#"><i class="ion-android-refresh"></i>
											Refresh</a>
									</div>
								</div>
							</div>

							<div class="text-center my-2">
								<div class="font-size-60 text-white" style="font-size:1.45em;"><?php echo e($courrier_en_retard); ?>

								</div>

							</div>
						</div>
						<div class="card-body bg-gray-light py-12">
							<a href="/projet" class="small-box-footer"
								style="z-index: 0;font-weight: 100;"><b><?php echo e(__('Voir les details')); ?></b> <i
									class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>


				<hr>


				<div class="row">
					<div class="col-12" style="text-align: center">
						<h4><?php echo e(__('COURRIERS SORTANTS')); ?></h4>
					</div>
					<div class="box bg-warning"
						style="-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
						<div class="box-body" style="background:#0b2942;padding-bottom: 0;">
							<div class="flexbox">
								<h5 style="color: #fff !important;margin-top: 6px;"><?php echo e(__('Brouillons')); ?></h5>
								<div class="dropdown">
									<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i
											class="ion-android-more-vertical rotate-90"></i></span>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
										<a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
										<a class="dropdown-item" href="#"><i class="ion-android-refresh"></i>
											Refresh</a>
									</div>
								</div>
							</div>

							<div class="text-center my-2">
								<div class="font-size-60 text-white" style="font-size:1.45em;">
									<?php echo e($courrier_cloture_sortants); ?></div>

							</div>
						</div>

						<div class="card-body bg-gray-light py-12">
							<a href="/projet" class="small-box-footer"
								style="z-index: 0;font-weight: 100;"><b><?php echo e(__('Voir les details')); ?> </b> <i
									class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>

				<div class="row">

					<div class="box bg-info"
						style="-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
						<div class="box-body" style="background: #104d7f;padding-bottom: 0;">
							<div class="flexbox">
								<h5 style="color: #fff !important;margin-top: 6px;"><?php echo e(__('En cours')); ?></h5>
								<div class="dropdown">
									<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i
											class="ion-android-more-vertical rotate-90"></i></span>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
										<a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
										<a class="dropdown-item" href="#"><i class="ion-android-refresh"></i>
											Refresh</a>
									</div>
								</div>
							</div>

							<div class="text-center my-2">
								<div class="font-size-60 text-white" style="font-size:1.45em;">
									<?php echo e($courrier_en_cours_sortants); ?></div>

							</div>
						</div>

						<div class="card-body bg-gray-light py-12">
							<a href="/projet" class="small-box-footer"
								style="z-index: 0;font-weight: 100;"><b><?php echo e(__('Voir les details')); ?> </b> <i
									class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="box bg-warning"
						style="-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
						<div class="box-body" style="background:#1566a8;padding-bottom: 0;">
							<div class="flexbox">
								<h5 style="color: #fff !important;margin-top: 6px;"><?php echo e(__('Cloturés')); ?></h5>
								<div class="dropdown">
									<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i
											class="ion-android-more-vertical rotate-90"></i></span>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
										<a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
										<a class="dropdown-item" href="#"><i class="ion-android-refresh"></i>
											Refresh</a>
									</div>
								</div>
							</div>

							<div class="text-center my-2">
								<div class="font-size-60 text-white" style="font-size:1.45em;">
									<?php echo e($courrier_cloture_sortants); ?></div>

							</div>
						</div>

						<div class="card-body bg-gray-light py-12">
							<a href="/projet" class="small-box-footer"
								style="z-index: 0;font-weight: 100;"><b><?php echo e(__('Voir les details')); ?></b> <i
									class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>

			</div>
			<div class="col-xl-9 col-lg-9 col-md-9 col-12">
				<div class="row" style="margin-bottom: 8px;">
					<div class="col-12 <?php echo e(__('costum_css.float-right-m')); ?>">
						<h2><?php echo e(__('LES ACTIVITES')); ?></h2>
						<hr>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="box"
							style="margin-bottom: 0px;background-color: unset !important;-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
							<div class="box-header" style="background: #FFF;height:100%">
								<h5 class="box-title"><?php echo e(__('Dernièrement reçus')); ?></h5>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<th><?php echo e(__('Objet')); ?></th>
											<th><?php echo e(__('Expéditeur')); ?></th>
											<th><?php echo e(__('Délai')); ?></th>
											<th><?php echo e(__('Etat')); ?></th>
										</thead>
										<tbody>
											<?php $__currentLoopData = $dernierement_recu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dernier_recu_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td style="text-align: left;">
													<?php echo e(str_limit($dernier_recu_item->objet, 50)); ?></td>

												<?php if($dernier_recu_item->personne_physique_id != null ): ?>
												<td style="text-align: left;">
													<?php echo e($dernier_recu_item->personnePhysique()->first()->full_name); ?></td>
												<?php else: ?>
												<?php if($dernier_recu_item->personneMorale()->first() != null): ?>
												<td style="text-align: left;">
													<?php echo e($dernier_recu_item->personneMorale()->first()->raison_social); ?>

												</td>
												<?php else: ?>
												<td style="text-align: left;"></td>
												<?php endif; ?>
												<?php endif; ?>

												<td style="text-align: left;"><?php echo e($dernier_recu_item->delai); ?></td>
												<td style="text-align: left;"><?php echo e($dernier_recu_item->etat->etat_nom); ?>

												</td>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>

								</div>

								<div class="col-12" style="text-align : right">
									<a href="#" class="more-details"> <i class="fa fa-arrow-right"></i>
										<b> <?php echo e(__('Voir les details')); ?> </b>
									</a>
								</div>
							</div>

						</div>
					</div>



					<div class="col-xl-12 col-lg-12 col-md-12" style="margin-top: 16px">
						<div class="box"
							style="margin-bottom: 0px;background-color: unset !important;-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
							<div class="box-header" style="background: #FFF;height:100%">
								<h5 class="box-title"><?php echo e(__('Dernièrement cloturés')); ?></h5>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<th><?php echo e(__('Objet')); ?></th>
											<th><?php echo e(__('Expéditeur')); ?></th>
										</thead>
										<tbody>
											<?php $__currentLoopData = $dernierement_cloture; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dernier_cloture_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td style="text-align: left;">
													<?php echo e(str_limit($dernier_cloture_item->objet, 50)); ?></td>

												<?php if($dernier_cloture_item->personne_physique_id != null ): ?>
												<td style="text-align: left;">
													<?php echo e($dernier_cloture_item->personnePhysique()->first()->full_name); ?>

												</td>
												<?php else: ?>
												<?php if($dernier_cloture_item->personneMorale()->first() != null): ?>
												<td style="text-align: left;">
													<?php echo e($dernier_cloture_item->personneMorale()->first()->raison_social); ?>

												</td>
												<?php else: ?>
												<td style="text-align: left;"></td>
												<?php endif; ?>
												<?php endif; ?>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
								</div>

							</div>

						</div>
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12" style="margin-top: 16px">
						<div class="box"
							style="margin-bottom: 0px;background-color: unset !important;-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
							<div class="box-header" style="background: #FFF;height:100%">
								<h5 class="box-title"><?php echo e(__('Dernièrement en retard')); ?></h5>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<th><?php echo e(__('Objet')); ?></th>
											<th><?php echo e(__('Expéditeur')); ?></th>
											<th><?php echo e(__('Delai')); ?></th>
										</thead>
										<tbody>
											<?php if(count($dernierement_en_retard) > 0): ?>
											<?php $__currentLoopData = $dernierement_en_retard; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dernier_en_retard_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td style="text-align: left;">
													<?php echo e(str_limit($dernier_en_retard_item->objet, 50)); ?></td>

												<?php if($dernier_en_retard_item->personne_physique_id != null ): ?>
												<td style="text-align: left;">
													<?php echo e($dernier_en_retard_item->personnePhysique()->first()->full_name); ?>

												</td>
												<?php else: ?>
												<?php if($dernier_en_retard_item->personneMorale()->first() != null): ?>
												<td style="text-align: left;">
													<?php echo e($dernier_en_retard_item->personneMorale()->first()->raison_social); ?>

												</td>
												<?php else: ?>
												<td style="text-align: left;"></td>
												<?php endif; ?>
												<?php endif; ?>
												<td style="text-align: left;"><?php echo e($dernier_en_retard_item->delai); ?></td>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

											<?php else: ?>
											<tr>
												<td colspan="3"><?php echo e(__('Aucun courrier trouvé')); ?></td>
											</tr>

											<?php endif; ?>

										</tbody>
									</table>
								</div>

							</div>

						</div>
					</div>


				</div>


			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('added_scripts'); ?>



<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bureau_ordre\resources\views/dashboard/dashboard.blade.php ENDPATH**/ ?>