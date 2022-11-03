<?php
include_once('ElectronicItems.php');
include_once('ElectronicItem.php');
// --------------------------------------------
// TASK 1
// create electronics items
// +) 1 console
// -- extras yes
// ---- 2 remotes
// -- wired yes
// ---- 2 remotes
// +) 2 televisions
// -- TV 1
// -- extras yes
// ---- 2 remotes
// -- wired no
// -- TV 2
// -- extras yes
// ---- 1 remote
// -- wired no
// +) 1 microwave
// -- extras no
// Sort items by price 
// Output total pricing
// --------------------------------------------
// TASK 2
// Output the price of the console and remotes
// --------------------------------------------

echo "--------- TASK 1 ---------\n";
$item = new ElectronicItem();
$item->setType($item::ELECTRONIC_ITEM_CONSOLE);
$item->setPrice(500);
$item->setWired(false);
// create controllers
$controller = new ElectronicItem();
$controller->setType($controller::ELECTRONIC_ITEM_CONTROLLER);
$controller->setPrice(50);
$controller->setWired(false);
// 2 remote
$item->setExtras($controller);
$item->setExtras($controller);
// create wired
$controller = new ElectronicItem();
$controller->setType($controller::ELECTRONIC_ITEM_CONTROLLER);
$controller->setPrice(40);
$controller->setWired(true);
// 2 wired
$item->setExtras($controller);
$item->setExtras($controller);

// store in budget array
$items[] = $item;

// add TV 1
$item = new ElectronicItem();
$item->setType($item::ELECTRONIC_ITEM_TELEVISION);
$item->setPrice(300.50);
$item->setWired(false);
// add controllers for TV 1
$controller = new ElectronicItem();
$controller->setType($controller::ELECTRONIC_ITEM_CONTROLLER);
$controller->setPrice(30);
$controller->setWired(false);

$item->setExtras($controller);
$item->setExtras($controller);

// store in budget array
$items[] = $item;

// add TV 2
$item = new ElectronicItem();
$item->setType($item::ELECTRONIC_ITEM_TELEVISION);
$item->setPrice(200);
$item->setWired(false);
// add controllers for TV 1
$controller = new ElectronicItem();
$controller->setType($controller::ELECTRONIC_ITEM_CONTROLLER);
$controller->setPrice(30);
$controller->setWired(false);

$item->setExtras($controller);

// store in budget array
$items[] = $item;

$item = new ElectronicItem();
$item->setType($item::ELECTRONIC_ITEM_MICROWAVE);
$item->setPrice(100);
$item->setWired(false);

// store in budget array
$items[] = $item;

// sort the items by price
echo "Items:\n";
// Output total pricing
$budget = new ElectronicItems($items);
$list = $budget->getSortedItems();
foreach ($list as $item) {
	echo $item->getType()."\n";
}
// for debbuging purposes
// var_dump($list);
$subItems = array_sum(array_column($list, 'price'));
foreach ($list as $item) {
	$subControl += array_sum(array_column($item->extras, 'price'));
}
$total = $subItems + $subControl;

echo "Total pricing:".$total."\n";
echo "--------------------------\n";


echo "--------- TASK 2 ---------\n";
$budget = new ElectronicItems($items);
$ask = "console";
$oneItem = $budget->getItemsByType($ask);
// for debbuging purposes
// var_dump($oneItem);
$subTotal = $oneItem[0]->price;
unset($subControl);
foreach ($oneItem[0]->extras as $item) {
	$subControl += $item->price;
}
$total = $subTotal + $subControl;
echo "Total pricing of ".$ask.":".$total."\n";
echo "--------------------------\n";
