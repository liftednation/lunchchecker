<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunch Plan Checker</title>
    <!-- Tailwind CSS CDN for easy styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: "Inter", sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h1 {
            color: #1a202c;
            margin-bottom: 1.5rem;
            font-size: 1.875rem; /* text-3xl */
            font-weight: 700; /* font-bold */
        }
        label {
            display: block;
            text-align: left;
            margin-bottom: 0.5rem;
            color: #4a5568;
            font-weight: 600;
        }
        input[type="text"] {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1.5rem;
            border: 1px solid #cbd5e0;
            border-radius: 0.5rem;
            box-sizing: border-box;
            font-size: 1rem;
            color: #2d3748;
        }
        button {
            background-color: #4299e1; /* blue-500 */
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
            width: 100%;
        }
        button:hover {
            background-color: #3182ce; /* blue-600 */
        }
        #result {
            margin-top: 1.5rem;
            padding: 1rem;
            border-radius: 0.5rem;
            font-weight: 600;
            text-align: left;
        }
        .rule-violation {
            background-color: #fed7d7; /* red-200 */
            color: #c53030; /* red-700 */
            border: 1px solid #fc8181; /* red-400 */
        }
        .rule-compliant {
            background-color: #c6f6d5; /* green-200 */
            color: #2f855a; /* green-700 */
            border: 1px solid #68d391; /* green-400 */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lunch Plan Checker</h1>

        <label for="personInput">Who are you having lunch with?</label>
        <input type="text" id="personInput" placeholder="e.g., Rob, Alice, Bob" value="Rob">

        <label for="restaurantInput">Where are you having lunch?</label>
        <input type="text" id="restaurantInput" placeholder="e.g., Local Woodfire, Pizza Palace" value="Local Woodfire">

        <button onclick="checkLunchPlan()">Check Plan</button>

        <div id="result" class="hidden"></div>
    </div>

    <script>
        /**
         * This JavaScript function checks if a specific restaurant is allowed when having lunch with a particular person.
         * The rule is: If you are having lunch with "Rob", the restaurant location
         * must NOT be "Local Woodfire".
         *
         * It updates the content and styling of the 'result' div based on the check.
         */
        function checkLunchPlan() {
            // Get values from input fields, trimming whitespace
            const person = document.getElementById('personInput').value.trim();
            const restaurantLocation = document.getElementById('restaurantInput').value.trim();
            const resultDiv = document.getElementById('result');

            // Clear previous classes and content to prepare for new result
            resultDiv.className = 'hidden'; // Reset to hidden and remove old classes like rule-violation/compliant
            resultDiv.innerHTML = ''; // Clear any previous messages

            // Apply the core logic from the PHP script
            if (person === "Rob" && restaurantLocation === "Local Woodfire") {
                // Rule violation scenario
                resultDiv.classList.remove('hidden'); // Make the result div visible
                resultDiv.classList.add('rule-violation'); // Apply red styling for violation
                resultDiv.innerHTML = `
                    <p class="text-lg mb-2">❌ Rule Violation:</p>
                    <p>You cannot have lunch at Local Woodfire with Rob!</p>
                `;
            } else {
                // Rule compliant scenario
                resultDiv.classList.remove('hidden'); // Make the result div visible
                resultDiv.classList.add('rule-compliant'); // Apply green styling for compliant

                let compliantMessage = `<p class="text-lg mb-2">✅ Rule Compliant:</p><p>This lunch plan is fine.</p>`;

                // Add specific notes based on the compliant conditions, mirroring the PHP logic
                if (person === "Rob") {
                    compliantMessage += `<p class="mt-2">Note: You are with Rob, but the restaurant is not Local Woodfire, so it's allowed.</p>`;
                } else if (restaurantLocation === "Local Woodfire") {
                    compliantMessage += `<p class="mt-2">Note: The restaurant is Local Woodfire, but you are not with Rob, so it's allowed.</p>`;
                } else {
                    compliantMessage += `<p class="mt-2">Note: Neither condition for the specific rule is met.</p>`;
                }
                resultDiv.innerHTML = compliantMessage; // Set the compliant message
            }
        }

        // Run the check on page load with default input values
        window.onload = checkLunchPlan;
    </script>
</body>
</html>
