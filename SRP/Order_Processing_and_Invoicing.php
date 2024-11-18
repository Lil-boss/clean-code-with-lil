<!-- The code below violates SRP because it handles both order processing and invoicing responsibilities in the same class. 
 Try refactoring it to separate these concerns. -->

 <?php

class Order {
    private $items = [];
    private $total = 0;

    public function addItem($item, $price) {
        $this->items[] = $item;
        $this->total += $price;
    }

    public function processOrder() {
        // Logic to process order
        echo "Processing order with total: $" . $this->total;

        // Logic to generate invoice
        echo "Invoice generated for items: " . implode(", ", $this->items);
    }
}

// Usage
$order = new Order();
$order->addItem("Laptop", 1000);
$order->addItem("Phone", 500);
$order->processOrder();

?>


<!-- Evaluation
What’s Good 👍
Clear Separation of Concerns: You successfully created an Invoice class that solely handles invoice generation, keeping the Order class focused on managing items.
Scalability: With the Invoice and Order responsibilities separated, additional functionality (like new invoice formats or order types) can be implemented independently.
Suggestions for Further Improvement 💡
Access Control: In your current code, $order->items is directly accessed from outside the Order class. To follow encapsulation, consider making items private and adding a public getItems() method in Order to provide access.
Dependency Injection: Instead of passing items directly to Invoice, you could pass the Order object itself. This approach can make the code cleaner and helps avoid accessing private properties directly. -->


<?php

class Order {
    private $items = [];
    private $total = 0;

    public function addItem($item, $price) {
        $this->items[] = $item;
        $this->total += $price;
    }

    public function getItems() {
        return $this->items;
    }

    public function getTotal() {
        return $this->total;
    }
}

class Invoice {
    public function generateInvoice(Order $order) {
        $items = $order->getItems();
        
        echo "Invoice generated for items: " . implode(", ", $items) . PHP_EOL;
        echo "Total amount: $" . $order->getTotal() . PHP_EOL;
        
        // Logic to send invoice
        echo "Invoice sent to customer" . PHP_EOL;
    }
}

// Usage
$order = new Order();
$order->addItem("Laptop", 1000);
$order->addItem("Phone", 500);

$invoice = new Invoice();
$invoice->generateInvoice($order);

?>
