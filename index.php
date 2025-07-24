<?php

/**
 * This PHP script checks if a specific restaurant is allowed when having lunch with a particular person.
 *
 * The rule is: If you are having lunch with "Rob", the restaurant location
 * must NOT be "Local Woodfire".
 */

// --- Configuration ---
// Set the person you are having lunch with
$person = "Rob"; // You can change this to "Rob", "Alice", "Bob", etc.

// Set the restaurant location
$restaurantLocation = "Local Woodfire"; // You can change this to "Local Woodfire", "Pizza Palace", "Sushi Spot", etc.

// --- Logic to check the rule ---
echo "<h2>Lunch Plan Check</h2>";
echo "<p>Person: <strong>" . htmlspecialchars($person) . "</strong></p>";
echo "<p>Restaurant: <strong>" . htmlspecialchars($restaurantLocation) . "</strong></p>";

if ($person === "Rob" && $restaurantLocation === "Local Woodfire") {
    echo "<p style='color: red; font-weight: bold;'>&#x2717; Rule Violation: You cannot have lunch at Local Woodfire with Rob!</p>";
} else {
    echo "<p style='color: green; font-weight: bold;'>&#x2713; Rule Compliant: This lunch plan is fine.</p>";
    // You could add more specific messages here if needed
    if ($person === "Rob") {
        echo "<p>Note: You are with Rob, but the restaurant is not Local Woodfire, so it's allowed.</p>";
    } elseif ($restaurantLocation === "Local Woodfire") {
        echo "<p>Note: The restaurant is Local Woodfire, but you are not with Rob, so it's allowed.</p>";
    } else {
        echo "<p>Note: Neither condition for the specific rule is met.</p>";
    }
}

?>
