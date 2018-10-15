<?php
namespace slider\ui;

use slider\bo\SliderImage;
use page\ui\PageHtmlBuilder;
use n2n\impl\web\ui\view\html\HtmlView;
use ch\hnm\util\page\bo\ExplPageLink;
use n2n\impl\web\ui\view\html\HtmlUtils;

class SliderHtmlBuilder {
	private $view;
	private $pageHtml;
	
	public function __construct(HtmlView $view) {
		$this->view = $view;
		$this->pageHtml = new PageHtmlBuilder($view);
	}
	
	public function getLink(SliderImage $image, array $attrs = null) {
		$pageLink = $image->getPageLink();
		if (null === $pageLink) return null;

		$path = $this->determineUrl($image);
		if (null == $path) return;
		
		
		if ($pageLink->getType() === ExplPageLink::TYPE_EXTERNAL) {
			$attrs = HtmlUtils::mergeAttrs((array) $attrs, array('target' => '_blank'));
		}
		
		return $this->view->getHtmlBuilder()->getLink($path, $pageLink->getLabel(), $attrs);
	}
	
	public function link(SliderImage $image, array $attrs = null) {
		$this->view->out($this->getLink($image, $attrs));
	}
	
	private function determineUrl(SliderImage $image) {
		$pageLink = $image->getPageLink();
		if (null === $pageLink) return null;
		
		return $pageLink->toUrl($this->view->getN2nContext(), $this->view->getControllerContext());
	}
}