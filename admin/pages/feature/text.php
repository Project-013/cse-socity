<?php
// Start session (if not already started)
session_start();

// Initialize feature list array
$features = [];

// Check if features are stored in session
if (isset($_SESSION['features'])) {
    $features = $_SESSION['features'];
}

// Handle add feature form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_feature'])) {
    $name = $_POST['name'];
    $status = $_POST['status'];

    // Validate input
    if (!empty($name) && !empty($status)) {
        // Add new feature to the list
        $features[] = ['name' => $name, 'status' => $status];

        // Store updated features in session
        $_SESSION['features'] = $features;
    }
}

// Handle edit feature form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_feature'])) {
    $index = $_POST['index'];
    $name = $_POST['name'];
    $status = $_POST['status'];

    // Validate input and update the feature
    if (isset($features[$index]) && !empty($name) && !empty($status)) {
        $features[$index]['name'] = $name;
        $features[$index]['status'] = $status;

        // Store updated features in session
        $_SESSION['features'] = $features;
    }
}

// Handle delete feature request
if (isset($_GET['delete'])) {
    $index = $_GET['delete'];

    // Check if the feature index exists
    if (isset($features[$index])) {
        // Remove the feature from the list
        unset($features[$index]);

        // Reset array keys
        $features = array_values($features);

        // Store updated features in session
        $_SESSION['features'] = $features;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Feature List</title>
</head>

<body>
    <h1>Feature List</h1>

    <h2>Add New Feature</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="status">Status:</label>
        <input type="text" name="status" id="status" required><br>

        <input type="submit" name="add_feature" value="Add Feature">
    </form>

    <h2>Existing Features</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($features as $index => $feature) { ?>
        <tr>
            <td><?php echo $feature['name']; ?></td>
            <td><?php echo $feature['status']; ?></td>
            <td>
                <a href="?edit=<?php echo $index; ?>">Edit</a>
                <a href="?delete=<?php echo $index; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <?php
    // Handle edit feature request
    if (isset($_GET['edit'])) {
        $index = $_GET['edit'];
        $feature = $features[$index];
        ?>
    <h2>Edit Feature</h2>
    <form method="post" action="">
        <input type="hidden" name="index" value="<?php echo $index; ?>">

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $feature['name']; ?>" required><br>

        <label for="status">Status:</label>
        <input type="text" name="status" id="status" value="<?php echo $feature['status']; ?>" required><br>

        <input type="submit" name="edit_feature" value="Update">
    </form>
    <?php } ?>

</body>

</html>