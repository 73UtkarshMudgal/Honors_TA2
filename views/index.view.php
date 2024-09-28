<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact Management</title>
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
    <h1>My Contacts</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $serial = 1; ?>
            <?php foreach ($contacts as $contact): ?>
            <tr>
            <td><?= $serial++; ?></td> <!-- Increment serial number for each row -->
                <td><?= htmlspecialchars($contact->name); ?></td>
                <td><?= htmlspecialchars($contact->email); ?></td>
                <td><?= htmlspecialchars($contact->phone); ?></td>
                <td>
                    <a href="delete_contact.php?id=<?= htmlspecialchars($contact->id); ?>" class="alert">
                        <i class="fas fa-trash"></i> Delete
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
</body>
</html>
