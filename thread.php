<?php
include 'includes/db.php';
include 'includes/functions.php';
include 'templates/header.php';

$thread_id = $_GET['id'];

$sql = "SELECT threads.*, users.username FROM threads JOIN users ON threads.user_id = users.id WHERE threads.id = $thread_id";
$thread = $conn->query($sql)->fetch_assoc();
?>

<h2><?= htmlspecialchars($thread['title']) ?></h2>
<p><?= htmlspecialchars($thread['content']) ?></p>
<small>Posted by <?= htmlspecialchars($thread['username']) ?> on <?= $thread['created_at'] ?></small>

<h3>Replies</h3>
<?php
$sql = "SELECT replies.*, users.username FROM replies JOIN users ON replies.user_id = users.id WHERE thread_id = $thread_id ORDER BY created_at DESC";
$result = $conn->query($sql);

while ($reply = $result->fetch_assoc()):
?>
    <div>
        <p><?= htmlspecialchars($reply['content']) ?></p>
        <small>Posted by <?= htmlspecialchars($reply['username']) ?> on <?= $reply['created_at'] ?></small>
    </div>
<?php endwhile; ?>

<?php if (isLoggedIn()): ?>
    <h3>Add a Reply</h3>
    <form method="POST" action="add_reply.php">
        <textarea name="content" required></textarea>
        <input type="hidden" name="thread_id" value="<?= $thread_id ?>">
        <button type="submit">Reply</button>
    </form>
<?php endif; ?>

<?php include 'templates/footer.php'; ?>
