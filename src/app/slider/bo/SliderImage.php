<?php
namespace slider\bo;

use n2n\reflection\annotation\AnnoInit;
use n2n\persistence\orm\annotation\AnnoManyToOne;
use n2n\persistence\orm\annotation\AnnoManagedFile;
use n2n\reflection\ObjectAdapter;
use n2n\persistence\orm\annotation\AnnoOneToOne;
use n2n\io\managed\File;
use n2n\persistence\orm\CascadeType;
use page\bo\util\PageLink;

class SliderImage extends ObjectAdapter {
	private static function _annos(AnnoInit $ai) {
		$ai->p('slider', new AnnoManyToOne(Slider::getClass()));
		$ai->p('fileImage', new AnnoManagedFile());
		$ai->p('pageLink', new AnnoOneToOne(PageLink::getClass(), null, CascadeType::ALL, null, true));
	}
	
	private $id;
	private $title;
	private $text;
	private $fileImage;
	private $pageLink;
	private $orderIndex;
	private $slider;
	private $online = true;
	
	public function getId() {
		return $this->id;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setTitle($title) {
		$this->title = $title;
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function setText($text) {
		$this->text = $text;
	}
	
	public function getText() {
		return $this->text;
	}
	
	/**
	 * @return \n2n\io\File
	 */
	public function getFileImage() {
		return $this->fileImage;
	}
	
	public function setFileImage(File $image) {
		$this->fileImage = $image;
	}

	/**
	 * @return \slider\bo\Slider
	 */
	public function getSlider() {
		return $this->slider;
	}
	
	public function setSlider(Slider $slider) {
		$this->slider = $slider;
	}
	
	public function setOrderIndex($orderIndex) {
		$this->orderIndex = $orderIndex;
	}
	
	public function getOrderIndex() {
		return $this->orderIndex;
	}
	
	public function setOnline(bool $online) {
		$this->online = $online;
	}
	
	public function isOnline() {
		return $this->online;
	}
	
	public function getPageLink() {
		return $this->pageLink;
	}

	public function setPageLink(PageLink $pageLink = null) {
	    $this->pageLink = $pageLink;
	}

	public function hasLink() {
		return null !== $this->pageLink;
	}
	
	public function hasContent() {
		return null !== $this->title || null !== $this->text;
	}
}