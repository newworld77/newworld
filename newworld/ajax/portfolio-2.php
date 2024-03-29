<div id="ajax-page" class="ajax-page-content">
    <div class="ajax-page-wrapper">
        <div class="ajax-page-nav">
            <div class="nav-item ajax-page-prev-next">
				<a class="ajax-page-load" href="ajax/portfolio-5.html"><i class="zmdi zmdi-chevron-right"></i></a>
				<a class="ajax-page-load" href="ajax/portfolio-2.html"><i class="zmdi zmdi-chevron-left"></i></a>
            </div>
            <div class="nav-item ajax-page-close-button">
                <a id="ajax-page-close-button" href="#"><i class="zmdi zmdi-close"></i></a>
            </div>
        </div>

        <div class="ajax-page-title">
            <h1>نمونه کار 1</h1>
        </div>

        <div class="row">
            <div class="col-sm-7 col-md-7 portfolio-block">
                <div class="owl-carousel portfolio-page-carousel">
                    <div class="item">
                        <img src="images/portfolio/full/supermario.jpg" alt="">
                    </div>
                </div>

                <!--
                <div class="portfolio-page-image">
                    <img src="images/portfolio/1.jpg" alt="">
                </div>
				-->

				<script type="text/javascript">
					jQuery(document).ready(function($){

						$('.portfolio-page-carousel').owlCarousel({
							smartSpeed:1200,
							items: 1,
							loop: true,
							dots: true,
							nav: true,
							rtl: true,
							navText: false,
							margin: 10
						});

					});
				</script>
            </div>

            <div class="col-sm-5 col-md-5 portfolio-block">
                <!-- Project Description -->
                <div class="block-title">
                    <h3>توضیحات</h3>
                </div>
                <ul class="project-general-info">
					<li><p><i class="fa fa-user"></i>بردیا یوسفی</p></li>
					<li><p><i class="fa fa-globe"></i> <a href="#" target="_blank">www.scratch.com</a></p></li>
                    <li><p><i class="fa fa-calendar"></i>11 شهریور 1402</p></li>
                </ul>

                <p class="text-justify">سوپر ماریو یک بازی هیجان برای تمامی سنین است. قضیه از این قرار است که شخصیت اصلی بازی باید ملکه را از دست لاکپشت که کاراکتر بد بازی هست نجات دهد.</p>
                <!-- /Project Description -->

                <!-- Technology -->
                <div class="tags-block">
                    <div class="block-title">
                        <h3>تکنولوژی</h3>
                    </div>
                    <ul class="tags">
                        <li><a>HTML5</a></li>
                        <li><a>CSS3</a></li>
                        <li><a>jQuery</a></li>
                        <li><a>Ajax</a></li>
                        <li><a>PHP5</a></li>
                    </ul>
                </div>
                <!-- /Technology -->

                <!-- Share Buttons -->
                <div class="btn-group share-buttons">
                    <div class="block-title">
                        <h3>اشتراک گذاری</h3>
                    </div>
                    <a href="#" target="_blank" class="btn"><i class="fa fa-facebook"></i> </a>
                    <a href="#" target="_blank" class="btn"><i class="fa fa-twitter"></i> </a>
                    <a href="#" target="_blank" class="btn"><i class="fa fa-telegram"></i> </a>
                </div>
                <!-- /Share Buttons -->
            </div>
        </div>
    </div>
</div>