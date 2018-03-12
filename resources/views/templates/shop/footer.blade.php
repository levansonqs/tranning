 <footer id="footer" class="footer">
        	<div class="container">
        		<div class="row">

        			<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms">
        				<div class="footer-single">
        					Hoainamptit
        					<p>Hy vọng sẽ được làm việc cùng.</p>
        				</div>
        			</div>

        			<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
        				<div class="footer-single">
        					<h6>Đăng kí </h6>
        					<form action="#" class="subscribe">
        						<input type="text" name="subscribe" id="subscribe">
        						<input type="submit" value="&#8594;" id="subs">
        					</form>
        					<p>Hệ thống thiết kế website hoainamptit </p>
        				</div>
        			</div>

        			<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="600ms">
        				<div class="footer-single">
        					<h6>Khám phá</h6>
        					<ul>
        						<li><a href="#">Facebook</a></li>
        						<li><a href="#">Flickr</a></li>
        						<li><a href="#">Google</a></li>
        						<li><a href="#">Diễn đàn</a></li>
        					</ul>
        				</div>
        			</div>

        			<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="900ms">
        				<div class="footer-single">
        					<h6>Hỗ trợ</h6>
        					<ul>
        						<li><a href="#">Liên hệ</a></li>
        						<li><a href="#">Tìm việc</a></li>
        						<li><a href="#">Hỗ trợ</a></li>
        						<li><a href="#">Thông tin</a></li>
        					</ul>
        				</div>
        			</div>

        		</div>
        		<div class="row">
        			<div class="col-md-12">
        				<p class="copyright text-center">
        					Copyright © 2017 <a href="http://myclass.vn/">HoaiNamPTIT</a>. Thiết kết website<a href="https://namcit.blogspot.com/">HoaiNamICT</a>
        				</p>
        			</div>
        		</div>
        	</div>
        </footer>

        <a href="javascript:void(0);" id="back-top"><i class="fa fa-angle-up fa-3x"></i></a>

		<!-- Essential jQuery Plugins
			================================================== -->
			<!-- Main jQuery -->
			<script src="{{getenv('ABOUTME_TEMPLATE_URL')}}/js/jquery-1.11.1.min.js"></script>
			<!-- Single Page Nav -->
			<script src="{{getenv('ABOUTME_TEMPLATE_URL')}}/js/jquery.singlePageNav.min.js"></script>
			<!-- Twitter Bootstrap -->
			<script src="{{getenv('ABOUTME_TEMPLATE_URL')}}/js/bootstrap.min.js"></script>
			<!-- jquery.fancybox.pack -->
			<script src="{{getenv('ABOUTME_TEMPLATE_URL')}}/js/jquery.fancybox.pack.js"></script>
			<!-- jquery.mixitup.min -->
			<script src="{{getenv('ABOUTME_TEMPLATE_URL')}}/js/jquery.mixitup.min.js"></script>
			<!-- jquery.parallax -->
			<script src="{{getenv('ABOUTME_TEMPLATE_URL')}}/js/jquery.parallax-1.1.3.js"></script>
			<!-- jquery.countTo -->
			<script src="{{getenv('ABOUTME_TEMPLATE_URL')}}/js/jquery-countTo.js"></script>
			<!-- jquery.appear -->
			<script src="{{getenv('ABOUTME_TEMPLATE_URL')}}/js/jquery.appear.js"></script>
			<!-- Contact form validation -->
			<script src="{{getenv('ABOUTME_TEMPLATE_URL')}}/js/jquery-form/jquery.form.js"></script>
			<script src="{{getenv('ABOUTME_TEMPLATE_URL')}}/js/jquery-validate/jquery.validate.min.js"></script>
			<!-- Google Map -->
			<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
			<!-- jquery easing -->
			<script src="{{getenv('ABOUTME_TEMPLATE_URL')}}/js/jquery.easing.min.js"></script>
			<!-- jquery easing -->
			<script src="{{getenv('ABOUTME_TEMPLATE_URL')}}/js/wow.min.js"></script>
			<script src="{{getenv('ABOUTME_TEMPLATE_URL')}}/js/skill.bars.jquery.js"></script>
			<script>
				var wow = new WOW ({
				boxClass:     'wow',      // animated element css class (default is wow)
				animateClass: 'animated', // animation css class (default is animated)
				offset:       120,          // distance to the element when triggering the animation (default is 0)
				mobile:       false,       // trigger animations on mobile devices (default is true)
				live:         true        // act on asynchronously loaded content (default is true)
			}
			);
				wow.init();
			</script> 
			<script>

				$(document).ready(function(){

					$('.skillbar').skillBars({
						from: 0,
						speed: 4000, 
						interval: 100,
						decimals: 0,
					});

				});

			</script>

			<!-- Custom Functions -->
			<script src="{{getenv('ABOUTME_TEMPLATE_URL')}}/js/custom.js"></script>

			<script type="text/javascript">
				$(function(){
					/* ========================================================================= */
				/*	Contact Form
				/* ========================================================================= */
				
				$('#contact-form').validate({
					rules: {
						name: {
							required: true,
							minlength: 2
						},
						email: {
							required: true,
							email: true
						},
						message: {
							required: true
						}
					},
					messages: {
						name: {
							required: "come on, you have a name don't you?",
							minlength: "your name must consist of at least 2 characters"
						},
						email: {
							required: "no email, no message"
						},
						message: {
							required: "um...yea, you have to write something to send this form.",
							minlength: "thats all? really?"
						}
					},
					submitHandler: function(form) {
						$(form).ajaxSubmit({
							type:"POST",
							data: $(form).serialize(),
							url:"process.php",
							success: function() {
								$('#contact-form :input').attr('disabled', 'disabled');
								$('#contact-form').fadeTo( "slow", 0.15, function() {
									$(this).find(':input').attr('disabled', 'disabled');
									$(this).find('label').css('cursor','default');
									$('#success').fadeIn();
								});
							},
							error: function() {
								$('#contact-form').fadeTo( "slow", 0.15, function() {
									$('#error').fadeIn();
								});
							}
						});
					}
				});
			});
		</script>
	</body>
	
<!-- Mirrored from hoainamptit.github.io/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jan 2018 03:58:12 GMT -->
</html>
