<?php

// visibility

class Product {
	protected $title, $author, $publisher, $price, $discount;

	public function __construct($title = 'no-title', $author = 'no-author', $publisher = 'no-publisher', $price = 0) {
		$this->title = $title;
		$this->author = $author;
		$this->publisher = $publisher;
		$this->price = $price;
	}

	public function getLabel() {
		$label = $this->author . ', ' . $this->publisher;
		return $label;
	}

	public function getInfoProduct () {
		$string = "{$this->title} | {$this->getLabel()} (Rp. {$this->price})";
		return $string;
	}

	public function setDiscount($discount = 0) {
		$this->discount = $discount;
	}

	public function getPriceBeforeDiscount() {
		return $this->price;
	}

	public function getPriceAfterDiscount () {
		return $this->price - $this->discount;
	}
}

class Comic extends Product {
	public $totalPage;

	public function __construct($title = 'no-title', $author = 'no-author', $publisher = 'no-publisher', $price = 0, $totalPage = 0) {
		parent::__construct($title, $author, $publisher, $price);
		$this->totalPage = $totalPage;
	}

	public function getInfoProduct () {
		$string = "Comic : " . parent::getInfoProduct() . " - {$this->totalPage} Halaman";
		return $string;
	}
}

class Game extends Product {
	public $playTime;

	public function __construct($title = 'no-title', $author = 'no-author', $publisher = 'no-publisher', $price = 0, $playTime = 0) {
		parent::__construct($title, $author, $publisher, $price);
		$this->playTime = $playTime;
	}

	public function getInfoProduct () {
		$string = "Game : " . parent::getInfoProduct() . " - {$this->playTime} Jam";
		return $string;
	}
}

class PrintProductInfo {
	public function print(Product $product) {
		$string = "{$product->title} | {$product->getLabel()} (Rp. {$product->price})";
		return $string;
	}
}

$product1 = new Comic('Naruto', 'Masashi Kishimoto', 'Shonen Jump', 30000, 100);
$product2 = new Game('Uncharted', 'Neil Druckmann', 'Sony Computer', 250000, 50);

$product2->setDiscount(100000);
echo 'Price Before Discount : ' . $product2->getPriceBeforeDiscount();
echo PHP_EOL;
echo 'Price After Discount : ' . $product2->getPriceAfterDiscount();