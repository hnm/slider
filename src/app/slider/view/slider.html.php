<?php
	use slider\bo\Slider;
	use n2n\impl\web\ui\view\html\HtmlView;
	use page\ui\PageHtmlBuilder;

	$view = HtmlView::view($view);
	
	$slider = $view->getParam('slider');
	$view->assert($slider instanceof Slider);
	
	$pageHtml = new PageHtmlBuilder($view);
	
	$view->useTemplate('\tmpl\view\template.html');
?>
<?php $view->import('\slider\view\inc\slider.html', array('slider' => $slider)) ?>

<?php $pageHtml->contentItems('main') ?>