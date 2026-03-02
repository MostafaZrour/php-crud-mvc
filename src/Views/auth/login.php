<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Login</h2>

                    <?php if (!empty($errors['login'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= htmlspecialchars($errors['login']) ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="?action=verify">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control <?= !empty($errors['email']) ? 'is-invalid' : '' ?>"
                                name="email"
                                id="email"
                                placeholder="your@email.com"
                                value="<?= htmlspecialchars($data['email'] ?? '') ?>"
                            />
                            <?php if (!empty($errors['email'])): ?>
                                <div class="invalid-feedback"><?= htmlspecialchars($errors['email']) ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input
                                type="password"
                                class="form-control <?= !empty($errors['password']) ? 'is-invalid' : '' ?>"
                                name="password"
                                id="password"
                                placeholder="Password"
                            />
                            <?php if (!empty($errors['password'])): ?>
                                <div class="invalid-feedback"><?= htmlspecialchars($errors['password']) ?></div>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Login
                        </button>
                    </form>

                    <hr>
                    <p class="text-center text-muted">Test account:</p>
                    <p class="text-center"><strong>Email:</strong> test@example.com<br><strong>Password:</strong> password123</p>
                </div>
            </div>
        </div>
    </div>
</div>
