<?php
/**
 * ElectronicItem - Create electronic item class
 */
class ElectronicItem {
	public $price;
	public $wired;
	public $maxExtras;
	public $extras = array();
	private $type;
	const ELECTRONIC_ITEM_CONSOLE = 'console';
	const ELECTRONIC_ITEM_CONTROLLER = 'controller';
	const ELECTRONIC_ITEM_TELEVISION = 'television';
	const ELECTRONIC_ITEM_MICROWAVE = 'microwave';

	private static $types = array(self::ELECTRONIC_ITEM_CONSOLE,
									self::ELECTRONIC_ITEM_CONTROLLER,
									self::ELECTRONIC_ITEM_MICROWAVE,
									self::ELECTRONIC_ITEM_TELEVISION
								);
	
	function maxExtras(){
		switch ($this->getType()){
			case self::ELECTRONIC_ITEM_CONSOLE:
				$this->maxExtras = 4;
				break;
			case self::ELECTRONIC_ITEM_CONTROLLER;
				$this->maxExtras = 0;
				break;
			case self::ELECTRONIC_ITEM_MICROWAVE;
				$this->maxExtras = 0;
				break;
			case self::ELECTRONIC_ITEM_TELEVISION:
				$this->maxExtras = PHP_INT_MAX;
				break;
			default:
				$this->maxExtras = 0;
		}
		return $this->maxExtras;
	}

	function getPrice() {
		return $this->price;
	}

	function getType() {
		return $this->type;
	}

	function getTypes() {
		return self::$types;
	}

	function getWired() {
		return $this->wired;
	}

	function getExtras() {
		return $this->extras;
	}

	function setType($type) {
		$this->type = $type;
	}

	function setPrice($price) {
		$this->price = $price;
	}

	function setWired($wired) {
		$this->wired = $wired;
	}

	function setExtras($extras) {
		if (count($this->extras) < $this->maxExtras()) {
			$this->extras[] = $extras;
		}
	}
}
