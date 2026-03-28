<?php include 'db.php'; ?>

<h2>Tasks</h2>

<form method="POST">
    <input name="title" placeholder="New task">
    <button>Add</button>
</form>

<?php
if ($_POST && !empty($_POST['title'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $conn->query("INSERT INTO tasks (title) VALUES ('$title')");
}

$result = $conn->query("SELECT * FROM tasks ORDER BY id DESC");

while ($row = $result->fetch_assoc()) {
    echo "<p>" . htmlspecialchars($row['title']) . "</p>";
}
?>
