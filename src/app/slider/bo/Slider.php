<?php
namespace slider\bo;

use n2n\persistence\orm\CascadeType;
use n2n\reflection\ObjectAdapter;
use n2n\reflection\annotation\AnnoInit;
use n2n\persistence\orm\annotation\AnnoOneToMany;
use n2n\persistence\orm\annotation\AnnoOrderBy;

class Slider extends ObjectAdapter {
	private static function _annos(AnnoInit $ai) {
		$ai->p('sliderImages', new AnnoOneToMany(SliderImage::getClass(), 'slider', CascadeType::ALL, null, true), 
				new AnnoOrderBy(array('orderIndex' => 'ASC')));
	}
	
	private $id;
	private $name;
	private $online = true;
	private $sliderImages;
	
	public function getId() {
		return $this->id;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function setName($name) {
		$this->name = $name;
	}
	
	public function isOnline() {
		return $this->online;
	}
	
	public function setOnline($online) {
		$this->online = $online;
	}
	
	public function getSliderImages() {
		return $this->sliderImages;
	}

	public function setSliderImages($sliderImages) {
		$this->sliderImages = $sliderImages;
	}
	
	public function getOnlineSliderImages() {
		$sliderImages = [];
		
		foreach ($this->sliderImages as $sliderImage) {
			if (!$sliderImage->isOnline()) continue;
			
			$sliderImages[] = $sliderImage;
		}
		
		return $sliderImages;
	}
}