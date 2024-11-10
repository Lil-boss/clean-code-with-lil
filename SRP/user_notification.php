
<!-- question -->
 <!-- Initial Code (Needs Refactoring for SRP) -->
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
        
        // Logic to send notification
        $this->sendEmailNotification();
    }

    private function sendEmailNotification() {
        // Simple email notification logic
        echo "Email sent to " . $this->email;
    }
}

// Usage
$user = new UserAccount("John Doe", "john@example.com");
$user->register();
?>




// Evaluation
// What’s Good 👍
// Separation of Responsibilities: You've correctly separated user management and notification responsibilities, making each class easier to understand and maintain.
// Reusability: The Notification class can now be reused for other parts of the application if needed, without relying on user registration.
// Suggestions for Further Improvement 💡
// Dependency Injection: Instead of passing the email address directly to the Notification class, consider injecting a Notification instance into UserAccount. This way, you can call the notification directly after registration without requiring the client code to create two separate instances.
// Method Naming and Context: You could also improve the user experience by adding a notifyUser() method inside the UserAccount class, which would call Notification. This approach could better encapsulate user notification needs.


<?php

class UserAccount {
    private $name;
    private $email;
    private $notification;

    public function __construct(string $name, string $email, Notification $notification) {
        $this->name = $name;
        $this->email = $email;
        $this->notification = $notification;
    }

    public function register() {
        // Logic to register user
        echo "User registered: " . $this->name . PHP_EOL;
        
        // Notify user
        $this->notifyUser();
    }

    private function notifyUser() {
        $this->notification->sendEmailNotification($this->email);
    }
}

class Notification {
    public function sendEmailNotification(string $email) {
        // Simple email notification logic
        echo "Email sent to " . $email . PHP_EOL;
    }
}

// Usage
$notification = new Notification();
$user = new UserAccount("John Doe", "hello@gmail.com", $notification);
$user->register();
?>