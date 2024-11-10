<?php

class UserAccount {
    private $name;
    private $email;

    public function __construct(string $name, string $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function register() {
        // Logic to register user
        echo "User registered: " . $this->name;
    }
}

class Notification {
    private $email;

    public function __construct(string $email) {
        $this->email = $email;
    }

    public function sendEmailNotification() {
        // Simple email notification logic
        echo "Email sent to " . $this->email;
    }
}

// Usage
$user = new UserAccount("John Doe", "hello@gmail.com");
$user->register();

$notification = new Notification("hello@gmail.com");
$notification->sendEmailNotification();

?>


<!-- Score 85%

Final Thoughts
Your refactored code is clear and applies SRP well.
 Using dependency injection takes the flexibility and maintainability even further by allowing UserAccount to control its dependencies more dynamically. 
 Keep up the great work with clean code principles, and let me know if you’d like more examples! -->