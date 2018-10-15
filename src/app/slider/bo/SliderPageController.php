<?php
namespace slider\bo;

use page\bo\PageController;
use n2n\reflection\annotation\AnnoInit;
use page\annotation\AnnoPage;
use page\annotation\AnnoPageCiPanels;
use n2n\persistence\orm\annotation\AnnoManyToOne;

class SliderPageController extends PageController {
	private static function _annos(AnnoInit $ai) {
		$ai->m('slider', new AnnoPage(), new AnnoPageCiPanels('main'));
		$ai->p('slider', new AnnoManyToOne(Slider::getClass()));
	}
	
	private $slider;
	
	public function getSlider() {
		return $this->slider;
	}
	
	public function setSlider(Slider $slider) {
		$this->slider = $slider;
	}
	
	public function slider() {
		$this->forward('..\view\slider.html', array('slider' => $this->slider));
	}
}