<!-- Refactored code -->
<?php

class Order {
    private $items = [];
    private $total = 0;

    public function addItem($item, $price) {
        $this->items[] = $item;
        $this->total += $price;
    }
}

class Invoice {
    private $items = [];

    public function generateInvoice($items) {
        // Logic to generate invoice
        echo "Invoice generated for items: " . implode(", ", $items);

        // Logic to send invoice
        echo "Invoice sent to customer";
    }
}

// Usage

$order = new Order();
$order->addItem("Laptop", 1000);
$order->addItem("Phone", 500);

$invoice = new Invoice();
$invoice->generateInvoice($order->items);

?>

<!-- Score 90%

Final Thoughts
You're doing an excellent job implementing SRP! 
Adding a getItems() method to Order provides controlled access to 
items while maintaining encapsulation. Keep this practice in mind for 
future problems, and let’s move to the next SRP challenge when you're 
ready! -->