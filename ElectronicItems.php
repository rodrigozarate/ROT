<?php
class ElectronicItems {
	private $items = array();

	public function __construct(array $items)
	{
		$this->items = $items;
	}


	/**
	 * Return the items depending on the sorting requested
	 * @return array
	 */
	public function getSortedItems()
	{
		$sorted = array();
		foreach ($this->items as $item)
		{
			$sorted[($item->price * 100)] = $item;
		}
		ksort($sorted, SORT_NUMERIC);
		return $sorted;
	}

	public function getItemsByType($type)
	{
		if (in_array($type, ElectronicItem::getTypes()))
		{
			$callback = function($item) use ($type)
			{
				return $item->getType() == $type;
			};

			$items = array_filter($this->items, $callback);
		}

		return $items;
	}

		
}

