<?php
	use slider\model\SliderDao;
	use slider\bo\Slider;
	use n2n\impl\web\ui\view\html\HtmlView;
	use n2nutil\bootstrap\img\MimgBs;
	use n2n\impl\web\ui\view\html\img\Mimg;
use slider\ui\SliderHtmlBuilder;
	
	$view = HtmlView::view($view);
	$html = HtmlView::html($view);
	
	$sliderDao = $view->lookup('slider\model\SliderDao');
	$view->assert($sliderDao instanceof SliderDao);
	
	$slider = $view->getParam('slider', null, $sliderDao->getFirstSlider());
	$view->assert($slider instanceof Slider);
	
	$sliderHtml = new SliderHtmlBuilder($view);
	
	$html->meta()->bodyEnd()->addJs('js/owl.carousel.js', 'slider');
	$html->meta()->bodyEnd()->addJs('js/functions.js', 'slider');
	$html->meta()->addCss('css/owl.carousel.css', 'screen', 'slider');
	$html->meta()->addCss('css/owl.theme.default.css', 'screen', 'slider');
	
	$images = $slider->getOnlineSliderImages();
	if (empty($images)) return;
?>
<div class="owl-carousel">
    <?php foreach ($images as $image): ?>
		<div class="slider-image">
			<?php $html->image($image->getFileImage(), MimgBs::xs(Mimg::crop(1163, 562)), 
					array('class' => 'img-fluid'), false, false) ?>
			<?php if ($image->hasContent()): ?>
				<div class="slider-text">
					<?php if (null !== ($title = $image->getTitle())): ?>
						<h2 class="slider-title">
							<?php $html->out($title) ?>
						</h2>
					<?php endif ?>
					<?php if (null !== ($text = $image->getText())): ?>
						<p class="slider-text-flow">
							<?php $html->out($text) ?>
						</p>
					<?php endif ?>
					
					<?php $sliderHtml->link($image) ?>
				</div>
			<?php endif ?>
		</div>
	<?php endforeach ?>
</div>