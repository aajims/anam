<div class="container">
	<div class="row no-gutters">
		<div class="col-xs-2 col-md-2">
			<a href="#"><img class="logo-bwh" src="<?php echo base_url('web/images/logo.png'); ?>"></a>
		</div>
		<div class="col-xs-10 col-md-10 w3layouts_footer_grid">
			<p><?php _t('Register your email to get the best deals from us');?></p>
			<form id="form" action="<?=site_url('Abouts/receive');?>" method="post">
				<div class="input-group">
					<input class="form-control" type="email" name="email" placeholder="example@mail.com" data-validation="email" required="">
					<div class="input-group-btn">
						<button type="submit" class="btn btn-default"><span class="hidden-xs">kirim</span> <i class="fa fa-chevron-right fa-lg "></i></button>
					</div>
				</div>
				<div class="clearfix"> </div>
			</form>
		</div>
	</div><br><hr class="bwh">
	<div class="row no-gutters">
		<div class="container">
			<nav class="navbar navbar-footer">
				<div class="col-sm-9 col-md-9">
					<div class="navbar-left">
						<a class="foot-link" href="#" ><?php _t('How to Work'); ?></a>
						<a class="foot-link" href="<?=site_url();?>Blogs">Blog</a>
						<a class="foot-link" href="<?=site_url();?>Careers"><?php _t('Career'); ?></a>
						<a class="foot-link" href="#">Investor</a>
						<a class="foot-link" href="<?=site_url(); ?>Faqs">FAQ</a>
						<a class="foot-link" href="#"><?php _t('Terms &amp; Conditions'); ?></a>
						<a class="foot-link" href="<?=site_url();?>Privassi"><?php _t('Privacy Policy') ;?></a>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="medsos">
						<a href="https://www.facebook.com/PayProIndonesia" class="sosmed" target="_blank"><i class="facebook fa fa-facebook"></i></a>
						<a href="https://www.twitter.com/paypro_id" class="sosmed" target="_blank"><i class="twitter fa fa-twitter"></i></a>
						<a href="https://www.instagram.com/paypro_id/" class="sosmed" target="_blank"><i class="instagram fa fa-instagram"></i></a>
						<a href="https://www.youtube.com/channel/UCgW7NuXC00ZNDjdTN2kMKMA" class="sosmed" target="_blank"><i class="youtube-play fa fa-youtube-play"></i></a>
					</div>
				</div>
			</nav>
		</div>
	</div><hr class="bwh">
	<p class="copyright">© 2018 Paypro. All Rights Reserved | <b><a href="#">Site Map</a></b> </p>
</div>
<script type="text/javascript">
	$.validate({
		form: '#form',
		validateOnBlur: true,
		showHelpOnFocus: true,
		addSuggestions: true,
		onSuccess: function($form) {
			console.log("success")
			return true;
		},
		onError: function() {
			console.log("Error")
		}
	});
</script>
