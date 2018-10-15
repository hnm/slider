<?php
namespace slider\model;

use slider\bo\Slider;
use n2n\context\RequestScoped;
use n2n\persistence\orm\EntityManager;

class SliderDao implements RequestScoped {
	
	/**
	 * @var \n2n\persistence\orm\EntityManager
	 */
	private $em;
	
	private function _init(EntityManager $em) {
		$this->em = $em;
	}

	/**
	 * @param int $id
	 * @return \slider\bo\Slider
	 */
	public function getSliderById($id) {
		return $this->em->createSimpleCriteria(Slider::getClass(), array('id' => $id, 'online' => true))->toQuery()
				->fetchSingle();
	}
	
	/**
	 * @param int $id
	 * @return \slider\bo\Slider
	 */
	public function getFirstSlider() {
		return $this->em->createSimpleCriteria(Slider::getClass(), array('online' => true), array('id' => 'ASC'))->toQuery()
				->fetchSingle();
	}
}