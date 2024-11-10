<!-- question -->
<!-- Initial Code (Needs Refactoring for OCP) -->

<?php

class PaymentProcessor {
    public function processPayment($type, $amount) {
        if ($type === 'credit') {
            echo "Processing credit card payment of $$amount";
            // Logic for credit card payment
        } elseif ($type === 'paypal') {
            echo "Processing PayPal payment of $$amount";
            // Logic for PayPal payment
        } else {
            echo "Unsupported payment type";
        }
    }
}

// Usage
$processor = new PaymentProcessor();
$processor->processPayment('credit', 100);
$processor->processPayment('paypal', 50);
?>

<!-- answer -->

<?php
interface PaymentInterface {
    public function processPayment($amount);
}

class CreditCardPayment implements PaymentInterface {
    public function processPayment($amount) {
        echo "Processing credit card payment of $$amount";
        // Logic for credit card payment
    }
}

class PayPalPayment implements PaymentInterface {
    public function processPayment($amount) {
        echo "Processing PayPal payment of $$amount";
        // Logic for PayPal payment
    }
}

class PaymentProcessor {
    public function processPayment(PaymentInterface $payment, $amount) {
        $payment->processPayment($amount);
    }
}

// Usage
$processor = new PaymentProcessor();
$processor->processPayment(new CreditCardPayment(), 100);
$processor->processPayment(new PayPalPayment(), 50);
?>

