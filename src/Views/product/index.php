<h2 class="mb-4">Products</h2>
<a href="?action=store_product" class="btn btn-success mb-3">Add Product</a>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $index => $product): ?>
            <tr>
                <td><?= $index + 1; ?></td>
                <td><?= htmlspecialchars($product["name"]); ?></td>
                <td>$<?= htmlspecialchars($product["price"]); ?></td>
                <td><?= htmlspecialchars(substr($product["description"], 0, 50)); ?></td>
                <td>
                    <a href="?action=show_product&id=<?= $product['id']; ?>" class="btn btn-primary btn-sm">Update</a>
                    <a href="?action=delete_product&id=<?= $product['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
