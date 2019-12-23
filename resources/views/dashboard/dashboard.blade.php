@extends('layouts.master')

@section('added_css')
<style>
.more-details
{
	color: #003C71;
}

.en-retard-line{
	background-color: #ff3200;
}

.cloturer-line{
	background-color: #9fd037;
}

.en-cours-line{
	background-color: #009dc5;
}

.brouillon-line{
	background-color: #7dd8fb;
}



</style>
    
@endsection

@section('content')
		<div style="padding-top: 16px;margin-left: 8px;">
	
		<div class="statitics " style=" padding-left: 10px;padding-right: 10px;">	 
			{{--verify the user gaent if is mobile--}}
				
					<div class="row">
						 
						<div class="col-xl-3 col-lg-3 col-md-3 col-12" > 

							<div class="row">						
							   <div class="box bg-info" style="-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
								  <div class="box-body" style="background: #003C71;padding-bottom: 0;">
									<div class="flexbox">
									  <h5 style="color: #fff !important;margin-top: 6px;">Total des courriers</h5>
									  <div class="dropdown">
										<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ion-android-more-vertical rotate-90"></i></span>
										<div class="dropdown-menu dropdown-menu-right">
										  <a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
										  <a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
										  <a class="dropdown-item" href="#"><i class="ion-android-refresh"></i> Refresh</a>
										</div>
									  </div>
									</div>

									<div class="text-center my-2">
									  <div class="font-size-60 text-white"  style="font-size:1.45em;">{{$nombre_courrier}}</div>									  
									</div>
								  </div>

								  <div class="card-body bg-gray-light py-12">							 
									  <a href="/projet" class="small-box-footer" style="z-index: 0;font-weight: 100;"><b>Voir les details </b> <i class="fa fa-arrow-right" ></i></a>
								  </div>					 
								</div>	
							</div>
							 
							<hr>
							<div class="row">	
								<div class="col-12" style="text-align: center">
									<h4 >COURRIERS ENTRANTS</h4>	
								</div>


								<div class="box bg-info" style="-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
								  <div class="box-body" style="background: #ff3200;padding-bottom: 0;">
									<div class="flexbox">
									  <h5 style="color: #fff !important;margin-top: 6px;">Brouillons</h5>
									  <div class="dropdown">
										<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ion-android-more-vertical rotate-90"></i></span>
										<div class="dropdown-menu dropdown-menu-right">
										  <a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
										  <a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
										  <a class="dropdown-item" href="#"><i class="ion-android-refresh"></i> Refresh</a>
										</div>
									  </div>
									</div>

									<div class="text-center my-2">
									  <div class="font-size-60 text-white"  style="font-size:1.45em;">{{$courrier_brouillons}}</div>
									  
									</div>
								  </div>

								  <div class="card-body bg-gray-light py-12">							 
									  <a href="/projet" class="small-box-footer" style="z-index: 0;font-weight: 100;"><b>Voir les details </b> <i class="fa fa-arrow-right" ></i></a>
								  </div>					 
								</div>
												
							   <div class="box bg-info" style="-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
								  <div class="box-body" style="background: #FF6600;padding-bottom: 0;">
									<div class="flexbox">
									  <h5 style="color: #fff !important;margin-top: 6px;">En cours</h5>
									  <div class="dropdown">
										<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ion-android-more-vertical rotate-90"></i></span>
										<div class="dropdown-menu dropdown-menu-right">
										  <a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
										  <a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
										  <a class="dropdown-item" href="#"><i class="ion-android-refresh"></i> Refresh</a>
										</div>
									  </div>
									</div>

									<div class="text-center my-2">
									  <div class="font-size-60 text-white"  style="font-size:1.45em;">{{$courrier_en_cours}}</div>
									  
									</div>
								  </div>

								  <div class="card-body bg-gray-light py-12">							 
									  <a href="/projet" class="small-box-footer" style="z-index: 0;font-weight: 100;"><b>Voir les details </b> <i class="fa fa-arrow-right" ></i></a>
								  </div>					 
								</div>	
							</div>

							<div class="row">	
								<div class="box bg-warning" style="-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
								  <div class="box-body" style="background:#FF8C00;padding-bottom: 0;">
									<div class="flexbox">
									  <h5 style="color: #fff !important;margin-top: 6px;">Cloturés</h5>
									  <div class="dropdown">
										<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ion-android-more-vertical rotate-90"></i></span>
										<div class="dropdown-menu dropdown-menu-right">
										  <a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
										  <a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
										  <a class="dropdown-item" href="#"><i class="ion-android-refresh"></i> Refresh</a>
										</div>
									  </div>
									</div>

									<div class="text-center my-2">
									<div class="font-size-60 text-white" style="font-size:1.45em;">{{$courrier_cloture}}</div>
									  
									</div>
								  </div>

								  <div class="card-body bg-gray-light py-12">							 
									  <a href="/projet" class="small-box-footer" style="z-index: 0;font-weight: 100;"><b>Voir les details </b> <i class="fa fa-arrow-right" ></i></a>
								  </div>					 
								</div>		
							</div>	
							<div class="row">	
								  <div class="box bg-success" style="-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
									  <div class="box-body" style="background: #ff0000;padding-bottom: 0;">
										<div class="flexbox">
										  <h5 style="color: #fff !important;margin-top: 6px;">En retards</h5>
										  <div class="dropdown">
											<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ion-android-more-vertical rotate-90"></i></span>
											<div class="dropdown-menu dropdown-menu-right">
											  <a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
											  <a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
											  <a class="dropdown-item" href="#"><i class="ion-android-refresh"></i> Refresh</a>
											</div>
										  </div>
										</div>

										<div class="text-center my-2">
										<div class="font-size-60 text-white"  style="font-size:1.45em;">{{$courrier_en_retard}}</div>
										  
										</div>
									  </div>
								  <div class="card-body bg-gray-light py-12">							 
									  <a href="/projet" class="small-box-footer" style="z-index: 0;font-weight: 100;"><b>Voir les details </b> <i class="fa fa-arrow-right" ></i></a>
								  </div>					 
								</div>	
							</div>	
							

							<hr>


							<div class="row">	
								<div class="col-12" style="text-align: center">
									<h4 >COURRIERS SORTANTS</h4>	
								</div>
								<div class="box bg-warning" style="-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
								  <div class="box-body" style="background:#0b2942;padding-bottom: 0;">
									<div class="flexbox">
									  <h5 style="color: #fff !important;margin-top: 6px;">Brouillons</h5>
									  <div class="dropdown">
										<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ion-android-more-vertical rotate-90"></i></span>
										<div class="dropdown-menu dropdown-menu-right">
										  <a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
										  <a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
										  <a class="dropdown-item" href="#"><i class="ion-android-refresh"></i> Refresh</a>
										</div>
									  </div>
									</div>

									<div class="text-center my-2">
									<div class="font-size-60 text-white" style="font-size:1.45em;">{{$courrier_cloture_sortants}}</div>
									  
									</div>
								  </div>

								  <div class="card-body bg-gray-light py-12">							 
									  <a href="/projet" class="small-box-footer" style="z-index: 0;font-weight: 100;"><b>Voir les details </b> <i class="fa fa-arrow-right" ></i></a>
								  </div>					 
								</div>		
							</div>

							<div class="row">							
												
							   <div class="box bg-info" style="-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
								  <div class="box-body" style="background: #104d7f;padding-bottom: 0;">
									<div class="flexbox">
									  <h5 style="color: #fff !important;margin-top: 6px;">En cours</h5>
									  <div class="dropdown">
										<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ion-android-more-vertical rotate-90"></i></span>
										<div class="dropdown-menu dropdown-menu-right">
										  <a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
										  <a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
										  <a class="dropdown-item" href="#"><i class="ion-android-refresh"></i> Refresh</a>
										</div>
									  </div>
									</div>

									<div class="text-center my-2">
									  <div class="font-size-60 text-white"  style="font-size:1.45em;">{{$courrier_en_cours_sortants}}</div>
									  
									</div>
								  </div>

								  <div class="card-body bg-gray-light py-12">							 
									  <a href="/projet" class="small-box-footer" style="z-index: 0;font-weight: 100;"><b>Voir les details </b> <i class="fa fa-arrow-right" ></i></a>
								  </div>					 
								</div>	
							</div>

							<div class="row">	
								<div class="box bg-warning" style="-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
								  <div class="box-body" style="background:#1566a8;padding-bottom: 0;">
									<div class="flexbox">
									  <h5 style="color: #fff !important;margin-top: 6px;">Courriers cloturés</h5>
									  <div class="dropdown">
										<span class="dropdown-toggle no-caret" data-toggle="dropdown"><i class="ion-android-more-vertical rotate-90"></i></span>
										<div class="dropdown-menu dropdown-menu-right">
										  <a class="dropdown-item" href="#"><i class="ion-android-list"></i> Details</a>
										  <a class="dropdown-item" href="#"><i class="ion-android-add"></i> Add new</a>
										  <a class="dropdown-item" href="#"><i class="ion-android-refresh"></i> Refresh</a>
										</div>
									  </div>
									</div>

									<div class="text-center my-2">
									<div class="font-size-60 text-white" style="font-size:1.45em;">{{$courrier_cloture_sortants}}</div>
									  
									</div>
								  </div>

								  <div class="card-body bg-gray-light py-12">							 
									  <a href="/projet" class="small-box-footer" style="z-index: 0;font-weight: 100;"><b>Voir les details </b> <i class="fa fa-arrow-right" ></i></a>
								  </div>					 
								</div>		
							</div>					
													
						</div>
						<div class="col-xl-9 col-lg-9 col-md-9 col-12" >   
						<div class="row" style="margin-bottom: 8px;">	
								<div class="col-12">
									<h2>LES ACTIVITES</h2>
									<hr>
								</div>						
								<div class="col-xl-12 col-lg-12 col-md-12" >    
									<div class="box" style="margin-bottom: 0px;background-color: unset !important;-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
										<div class="box-header" style="background: #FFF;height:100%">
										  <h5 class="box-title">Dernièrement reçus</h5>
										  <div class="table-responsive">
											  <table class="table">	
													<thead>
														<th>Objet</th>
														<th>Expéditeur</th>
														<th>Délai</th>
														<th>Etat</th>
													</thead>
													<tbody>
														@foreach ($dernierement_recu as $dernier_recu_item)
															<tr>
																<td style="text-align: left;">{{ str_limit($dernier_recu_item->objet, 50) }}</td>

																@if ($dernier_recu_item->personne_physique_id != null )
																	<td style="text-align: left;">{{$dernier_recu_item->personnePhysique()->first()->full_name}}</td>
																@else
																	@if ($dernier_recu_item->personneMorale()->first() != null)
																		<td style="text-align: left;">{{$dernier_recu_item->personneMorale()->first()->raison_social}}</td>
																	@else
																		<td style="text-align: left;"></td>
																	@endif															
																@endif
															
																<td style="text-align: left;">{{$dernier_recu_item->delai}}</td>
																<td style="text-align: left;">{{$dernier_recu_item->etat->etat_nom}}</td>
															</tr>														
														@endforeach
													</tbody>
												</table>

										  </div>
											
											<div class="col-12" style="text-align : right">
												<a href="#"  class="more-details" > <i class="fa fa-arrow-right"></i>
                                                    <b> Voir les details </b>
                                                </a>
											</div>
										</div>
										 							 
									</div>								
								</div>
								
								
								
								<div class="col-xl-12 col-lg-12 col-md-12" style="margin-top: 16px">    
									<div class="box" style="margin-bottom: 0px;background-color: unset !important;-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
										<div class="box-header" style="background: #FFF;height:100%">
										  <h5 class="box-title">Dernièrement cloturés</h5>
										  <div class="table-responsive">
											  <table class="table">
													<thead>
														<th>Objet</th>
														<th>Expediteur</th>
													</thead>	
													<tbody>
														@foreach ($dernierement_cloture as $dernier_cloture_item)
															<tr>
																<td style="text-align: left;">{{ str_limit($dernier_cloture_item->objet, 50) }}</td>

																@if ($dernier_cloture_item->personne_physique_id != null )
																	<td style="text-align: left;">{{$dernier_cloture_item->personnePhysique()->first()->full_name}}</td>
																@else
																	@if ($dernier_cloture_item->personneMorale()->first() != null)
																		<td style="text-align: left;">{{$dernier_cloture_item->personneMorale()->first()->raison_social}}</td>
																	@else
																		<td style="text-align: left;"></td>
																	@endif															
																@endif
															</tr>														
														@endforeach
													</tbody>
												</table>
										  </div>
											
										</div>
										 							 
									</div>								
								</div>

								<div class="col-xl-12 col-lg-12 col-md-12" style="margin-top: 16px">    
									<div class="box" style="margin-bottom: 0px;background-color: unset !important;-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05); box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);border: 1px solid #dce3e6 !important">
										<div class="box-header" style="background: #FFF;height:100%">
										  <h5 class="box-title">Dernièrement en retard</h5>
										  <div class="table-responsive">
											  <table class="table">
												<thead>
													<th>Objet</th>
													<th>Expediteur</th>
													<th>Delai</th>
												</thead>	
												<tbody>
													@if (count($dernierement_en_retard) > 0)
														@foreach ($dernierement_en_retard as $dernier_en_retard_item)
														<tr>
															<td style="text-align: left;">{{ str_limit($dernier_en_retard_item->objet, 50) }}</td>

															@if ($dernier_en_retard_item->personne_physique_id != null )
																<td style="text-align: left;">{{$dernier_en_retard_item->personnePhysique()->first()->full_name}}</td>
															@else
																@if ($dernier_en_retard_item->personneMorale()->first() != null)
																	<td style="text-align: left;">{{$dernier_en_retard_item->personneMorale()->first()->raison_social}}</td>
																@else
																	<td style="text-align: left;"></td>
																@endif															
															@endif
															<td style="text-align: left;">{{ $dernier_en_retard_item->delai }}</td>
														</tr>														
													@endforeach
														
													@else
													<tr><td colspan="3">Aucun courrier trouvé</td> </tr>
														
													@endif
												
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
	

@endsection

@push('added_scripts')



@endpush