<form class="border rounded-4 p-3" method="POST" action="?action=create">

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input
            type="text"
            class="form-control <?= !empty($errors['name']) ? 'is-invalid' : '' ?>"
            name="name"
            id="name"
            aria-describedby="helpId"
            placeholder=""
            value="<?= htmlspecialchars($data['name'] ?? '') ?>"
        />
        <?php if (!empty($errors['name'])): ?>
            <div class="invalid-feedback"><?= htmlspecialchars($errors['name']) ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input
            type="email"
            class="form-control <?= !empty($errors['email']) ? 'is-invalid' : '' ?>"
            name="email"
            id="email"
            aria-describedby="emailHelpId"
            placeholder="abc@mail.com"
            value="<?= htmlspecialchars($data['email'] ?? '') ?>"
        />
        <?php if (!empty($errors['email'])): ?>
            <div class="invalid-feedback"><?= htmlspecialchars($errors['email']) ?></div>
        <?php endif; ?>
    </div>

    <button
        type="submit"
        class="btn btn-primary w-100"
    >
        Submit
    </button>
</form>
