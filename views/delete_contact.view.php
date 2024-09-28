<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Delete Contact</title>
    <link rel="stylesheet" href="css/index.css" />
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
<main class="container">
    <h1>Delete Contact</h1>
    
    <?php if (isset($error)): ?>
        <div class="alert"><?= htmlspecialchars($error); ?></div>
    <?php else: ?>
        <div class="alert">Contact deleted successfully.</div>
    <?php endif; ?>

    <a href="index.php">Go back to contact list</a>
</main>
</body>
</html>
