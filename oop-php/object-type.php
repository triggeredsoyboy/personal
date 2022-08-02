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


class PrintProductInfo
{
    public function print(Product $product)
    {
        $str = "{$product->title} | {$product->getLabel()}, (Rp.{$product->price})";
        return $str;
    }
}


$product1 = new Product("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);
$product2 = new Product("Call of Duty", "Mohammad Alavi", "Activision", 350000);

echo "Komik : " . $product1->getLabel();
echo "<br>";
echo "Game : " . $product2->getLabel();
echo "<br>";

$infoProduct1 = new PrintProductInfo();
echo $infoProduct1->print($product2);
