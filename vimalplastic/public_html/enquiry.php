	<?php include("file/header.php");?>
	<?php $page ='enquiry'; include ("file/menu.php");?>
	<!-- Inner page heading start -->
	<section class="my-inner-heading-field my-inner-heading-three  my-layer-black">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="my-inner-heading-col">
						<h2>Enquiry us</h2>
						<p><a href="index.php">Home</a> <span>/</span> <a href="#">Enquiry us</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Inner page heading end -->

	<!-- Contact start -->
	<section class="my-contact-field">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
			<p class="enquiry-head">At Vimal Plastic ., We are Committed to serve you the way you want – conveniently enquiry us by phone, or by e-mail, or by submitting the below form to us.</p>
				</div>
			</div>
			<div class="my-main-contact-from">
				<div class="row">
					<div class="col-md-12">
						<h5>send your enquiry message :</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="my-contact-col">
							<form id="contact_form" name="contact_form" class="contact-form" action="#" method="post" novalidate="novalidate">
		                        <div class="messages"></div>
		                        <div class="row">
		                            <div class="col-md-3">
		                                <div class="form-group">
		                                    <input id="form_name" name="form_name" class="form-control my-form-control" placeholder="ENTER A NAME" required="required" data-error="Name is required." type="text">
		                                    <div class="help-block with-errors"></div>
		                                </div>
		                            </div>
		                            <div class="col-md-3">
		                                <div class="form-group">
		                                    <input id="form_email" name="form_email" class="form-control my-form-control required email" placeholder="ENTER AN EMAIL" required="required" data-error="Email is required." type="email">
		                                    <div class="help-block with-errors"></div>
		                                </div>
		                            </div>
		                            <div class="col-md-3">
		                                <div class="form-group">
		                                    <input id="form_phone" name="form_phone" class="form-control my-form-control required" placeholder="PHONE NUMBER" required="required" data-error="Phone Number is required." type="text">
		                                    <div class="help-block with-errors"></div>
		                                </div>
		                            </div>
		                            <div class="col-md-3">
		                                <div class="form-group">
		                                    <input id="form_subject" name="form_subject" class="form-control my-form-control required" placeholder="SUBJECT" required="required" data-error="Subject is required." type="text">
		                                    <div class="help-block with-errors"></div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="form-group">
		                            <textarea id="form_message" name="form_message" class="form-control required" rows="8" placeholder="MESSAGE" required="required" data-error="Message is required."></textarea>
		                            <div class="help-block with-errors"></div>
		                        </div>
		                        <div class="form-group text-right">
		                            <input id="form_botcheck" name="form_botcheck" class="form-control my-form-control" value="" type="hidden">
		                            <button type="submit" class="btn btn-lg btn-block my-btn-yellow" data-loading-text="Getting Few Sec...">Send Message</button>
		                        </div>
		                    </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	


	<?php include("file/footer.php");?>