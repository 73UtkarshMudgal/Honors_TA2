<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Contact</title>
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        function validatePhone(event) {
            const phoneInput = document.getElementById('phone');
            const phoneValue = phoneInput.value;

            // Remove any non-digit characters
            const numericValue = phoneValue.replace(/\D/g, '');

            // Check if the length is exactly 10
            if (numericValue.length !== 10) {
                alert("Phone number must be exactly 10 digits and only numeric characters are allowed.");
                phoneInput.value = ''; // Clear the input
                phoneInput.focus();
                event.preventDefault(); // Prevent form submission
                return false;
            }
            return true;
        }

        // Show modal function
        function showErrorModal(message) {
            const modal = document.getElementById('errorModal');
            const modalMessage = document.getElementById('modalMessage');
            modalMessage.textContent = message;
            modal.style.display = 'block';
        }

        // Hide modal function
        function hideErrorModal() {
            const modal = document.getElementById('errorModal');
            modal.style.display = 'none';
        }
    </script>
    <style>
        .form-container {
            display: flex; /* Use flexbox layout */
            align-items: flex-start; /* Align items to the top */
            justify-content: center; /* Center items horizontally */
            padding: 20px;
        }

        .form {
            padding: 20px; /* Adjust for left and right padding */
            max-width: 700px; /* Optional: limit width */
            background-color: #222; /* Same as form background color */
            border-radius: 8px; /* Optional: rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Optional: shadow for depth */
            margin-left: 20px; /* Space between header and form */
        }

        .form-header {
            font-size: 48px; /* Larger font size for the header */
            color: #fff; /* White color for visibility */
            margin-right: 100px; /* Space between header and form */
            align-self: center; /* Center vertically */
        }

        input[type="text"] {
            flex-grow: 1; /* Allow phone input to take the remaining space */
            margin-left: 5px; /* Optional: add some spacing */
        }

        select {
            width: 320px; /* Increased width for better visibility */
            margin-right: 5px; /* Optional: add some spacing */
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8); /* Darker background for dark mode */
            padding-top: 60px;
        }

        .modal-content {
            background-color: #333; /* Dark background for modal */
            color: #f44336; /* Bright red for error text */
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #f44336; /* Red border for emphasis */
            width: 80%;
            max-width: 500px;
            text-align: center;
            border-radius: 8px; /* Rounded corners */
        }

        .close {
            color: #f44336; /* Red close button */
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #ffdddd; /* Lighter shade on hover */
            text-decoration: none;
            cursor: pointer;
        }

        small {
            color: #ccc; /* Light color for small text */
        }
    </style>
</head>
<body>
<header class="container">
    <nav>
        <ul>
            <li><strong>Utkarsh Pvt. Ltd.</strong></li>
        </ul>
        <ul>
            <li><a href="index.php">List Contacts</a></li>
            <li><a href="add_contact.php">Add Contact</a></li>
        </ul>
    </nav>
</header>
<main class="form-container">
    <div class="form-header">Add Contact</div>
    <form method="POST" onsubmit="return validatePhone(event)" class="form">
        <div>
            <label for="name"><i class="fas fa-user"></i> Name</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="email"><i class="fas fa-envelope"></i> Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="phone"><i class="fas fa-phone"></i> Phone</label>
            <div style="display: flex; align-items: center;">
                <select name="country_code" required>
                    <option value="">Select Country Code</option>
                    <option value="+1">USA (+1)</option>
                    <option value="+44">UK (+44)</option>
                    <option value="+91">India (+91)</option>
                    <option value="+61">Australia (+61)</option>
                    <option value="+49">Germany (+49)</option>
                </select>
                <input type="text" name="phone" id="phone" required placeholder="Phone number" maxlength="10">
            </div>
            <small>Only digits [0-9] are allowed and the phone number must be exactly 10 digits.</small>
        </div>
        <input type="submit" value="Add Contact">
    </form>

    <!-- Modal for error messages -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="hideErrorModal()">&times;</span>
            <p id="modalMessage"></p>
            <button onclick="hideErrorModal()">Close</button>
        </div>
    </div>
</main>

<?php if (isset($error)): ?>
    <script>
        showErrorModal(<?= json_encode($error); ?>);
    </script>
<?php endif; ?>

</body>
</html>
