<link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">

<h1>Photo List</h1>

<div style="text-align: center;">
    <a href="<?= BASE_URL ?>/photo/create" class="button">Upload New Photo</a>
</div>

<ul class="photo-list">
    <?php foreach ($photos as $p): ?>
        <li class="photo-item">
            <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($p['filename'], ENT_QUOTES) ?>"
                 alt="Photo">
            <br>
            <a href="<?= BASE_URL ?>/photo/edit/<?= $p['id'] ?>">Edit</a> |
            <a href="<?= BASE_URL ?>/photo/delete/<?= $p['id'] ?>"
               onclick="return confirm('Are you sure you want to delete this photo?')">
               Delete
            </a>
        </li>
    <?php endforeach; ?>
</ul>
