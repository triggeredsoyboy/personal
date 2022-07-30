<?php

class Product
{
    public $title = "title",
        $author = "author",
        $publisher = "publisher",
        $price = 0;

    public function getLabel()
    {
        return "$this->author, $this->publisher";
    }
}

// $product1 = new Product();
// $product1->title = "Laskar Pelangi";
// var_dump($product1);

// $product2 = new Product();
// $product2->title = "Call of Duty";
// $product2->addProperty = "Unknown";
// var_dump($product2);

$product3 = new Product();
$product3->title = "Naruto";
$product3->author = "Masashi Kishimoto";
$product3->publisher = "Shonen Jump";
$product3->price = 30000;

$product4 = new Product();
$product4->title = "Call of Duty";
$product4->author = "Mohammad Alavi";
$product4->publisher = "Activision";
$product4->price = 350000;

echo "Komik : " . $product3->getLabel();
echo "<br>";
echo "Game : " . $product4->getLabel();
