<form class="border rounded-4 p-3" method="POST" action="?action=update">

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="hidden" name="id" value="<?= htmlspecialchars($user["id"]) ?>">
        <input
            type="text"
            class="form-control <?= !empty($errors['name']) ? 'is-invalid' : '' ?>"
            name="name"
            id="name"
            value="<?= htmlspecialchars($data['name'] ?? $user["name"]) ?>"
            aria-describedby="helpId"
            placeholder=""
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
            value="<?= htmlspecialchars($data['email'] ?? $user["email"]) ?>"
            aria-describedby="emailHelpId"
            placeholder="abc@mail.com"
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
