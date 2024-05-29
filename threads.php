<?php
include 'includes/db.php';
include 'includes/functions.php';
include 'templates/header.php';
?>

<h2>Threads</h2>
<?php
$sql = "SELECT threads.*, users.username FROM threads JOIN users ON threads.user_id = users.id ORDER BY created_at DESC";
$result = $conn->query($sql);

while ($thread = $result->fetch_assoc()):
?>
    <div>
        <div class="titles">
        <h3 ><a href="thread.php?id=<?= $thread['id'] ?>"><?= htmlspecialchars($thread['title']) ?></a></h3>
        </div>
        <p><?= htmlspecialchars($thread['content']) ?></p>
        <small>Posted by <?= htmlspecialchars($thread['username']) ?> on <?= $thread['created_at'] ?></small>
    </div>
<?php endwhile; ?>

<?php include 'templates/footer.php'; ?>
