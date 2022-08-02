<?php

class Product
{
    public $title,
        $author,
        $publisher,
        $price;

    public function __construct($title = "Title", $author = "Author", $publisher = "Publisher", $price = 0)
    {
        $this->title = $title;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->price = $price;
    }

    public function getLabel()
    {
        return "$this->author, $this->publisher";
    }
}


$product1 = new Product("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);
$product2 = new Product("Call of Duty", "Mohammad Alavi", "Activision", 350000);
$product3 = new Product("GTA V");

echo "Komik : " . $product1->getLabel();
echo "<br>";
echo "Game : " . $product2->getLabel();
echo "<br>";
echo "Game : " . $product3->getLabel();
