<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta name="_token" content="<?php echo e(csrf_token()); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
     <meta name="author" content="">
    <link rel="icon" href="<?php echo e(asset('images/favicon.png')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<title><?php echo e(config('app.name')); ?></title>
     <?php echo $__env->make('inc.css_links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
     <style>
	  
		 
         @font-face {
             font-family: Lato;
             src: url('<?php echo e(asset('fonts/Lato/lato-v11-latin-ext_latin-700.ttf')); ?>');
         }


         @font-face {
             font-family: Roboto-Condensed;
             src: url('<?php echo e(asset('fonts/roboto/RobotoCondensed-Regular.ttf')); ?>');
         }


         @font-face {
             font-family: Lato2;
             src: url('<?php echo e(asset('fonts/Lato/lato-v11-latin-ext_latin-regular.ttf')); ?>');
         }

        
         body,
         h1,
         h2,
         h3,
         h4,
         h5,
         h6 {
             font-family: 'Poppins','Lato2';

         }

         label{
             font-family: 'Poppins','Lato2';
	 
         }
         .nav-tabs
         {
             font-family: 'Poppins','Lato2' !important;
           
         }


         .table th,
         .table thead th {
             font-family: Lato; 
             font-size: 13px;
         }

         .btn{
            font-family: 'Poppins','Lato2';
          
             font-size: 12px;
         }


         .no-js #loader { display: none;  }
         .js #loader { display: block; position: absolute; left: 100px; top: 0; }
         .se-pre-con {
            
         }

         .mobile-nav
         {
             margin-top: 15px !important;
         }

         .mobile-nav > li
         {
             border-bottom: 1px solid !important;
         }
     </style>
</head>

<body style="overflow:hidden;">

<div  class="se-pre-con" style=" width: 100%;height: 100%;z-index: 99998;position: fixed; left: 0px; top: 0px;background:#efefef "> 
	<div style="text-align: center; position: fixed; left: calc(50% - 70px); top: calc(50% - 140px);">
		<img src="images/logo/logo_140.png" style="height:140px;width:140px;z-index: 99999;">
			</br>
		<img src="images/loader/Ellipsis-2.1s-140px.gif" style="margin-top:-40px">
	</div>
</div>
<iframe style="border: none; width: 100%; height: calc(100% - 60px);" src="https://view.officeapps.live.com/op/embed.aspx?src=<?php echo e(asset('/')); ?><?php echo e($file_path); ?>">
	
</iframe>
<div style="width:100%;height:50px;">
	<a href="<?php echo e($file_path); ?>" class="btn btn-success pull-left " style="margin-left:8px"><i class="fa fa-download" style="margin-right: 6px"></i>Télécharger le fichier</a>
	<a href="#" onclick="window.close();" class="btn btn-secondary pull-right " style="margin-right:8px"><i class="fa fa-close"  style="margin-right: 6px"></i>Fermre</a>
</div>
</body>
 

<?php $__env->startSection('content'); ?>
     

<?php $__env->stopSection(); ?>
	<script src="<?php echo e(asset('vendor_components/jquery-3.3.1/jquery-3.3.1.js')); ?>"></script>

	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo e(asset('vendor_components/jquery-ui/jquery-ui.js')); ?>"></script>

<script>
window.moveTo((screen.width/2)-(window.outerWidth/2),(screen.height/2)-(window.outerHeight/2));
$(window).on('load', function () {	 
	$(".se-pre-con").fadeOut("slow"); 
});
</script>
<?php $__env->startPush('added_scripts'); ?>
 
 

<?php $__env->stopPush(); ?>
</html><?php /**PATH E:\xampp\htdocs\smartgis\bureau_ordre\resources\views/document/index.blade.php ENDPATH**/ ?>