<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $index => $user): ?>
            <tr>
                <td><?= $index + 1; ?></td>
                <td><?= htmlspecialchars($user["name"]); ?></td>
                <td><?= htmlspecialchars($user["email"]); ?></td>
                <td>
                    <a href="?action=show&id=<?= $user['id']; ?>" class="btn btn-primary btn-sm">Update</a>
                    <a href="?action=delete&id=<?= $user['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
