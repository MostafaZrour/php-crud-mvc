<h2 class="mb-4">Update Product</h2>

<form class="border rounded-4 p-3" method="POST" action="?action=update_product">

    <div class="mb-3">
        <input type="hidden" name="id" value="<?= htmlspecialchars($product["id"]) ?>">
        <label for="name" class="form-label">Name</label>
        <input
            type="text"
            class="form-control <?= !empty($errors['name']) ? 'is-invalid' : '' ?>"
            name="name"
            id="name"
            placeholder="Product name"
            value="<?= htmlspecialchars($data['name'] ?? $product["name"]) ?>"
        />
        <?php if (!empty($errors['name'])): ?>
            <div class="invalid-feedback"><?= htmlspecialchars($errors['name']) ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input
            type="number"
            step="0.01"
            class="form-control <?= !empty($errors['price']) ? 'is-invalid' : '' ?>"
            name="price"
            id="price"
            placeholder="0.00"
            value="<?= htmlspecialchars($data['price'] ?? $product["price"]) ?>"
        />
        <?php if (!empty($errors['price'])): ?>
            <div class="invalid-feedback"><?= htmlspecialchars($errors['price']) ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea
            class="form-control <?= !empty($errors['description']) ? 'is-invalid' : '' ?>"
            name="description"
            id="description"
            rows="4"
            placeholder="Product description"
        ><?= htmlspecialchars($data['description'] ?? $product["description"]) ?></textarea>
        <?php if (!empty($errors['description'])): ?>
            <div class="invalid-feedback"><?= htmlspecialchars($errors['description']) ?></div>
        <?php endif; ?>
    </div>

    <button
        type="submit"
        class="btn btn-primary w-100"
    >
        Update
    </button>
</form>
