<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Welcome, <?= htmlspecialchars($user['user_name']) ?>!</h2>
                    <p class="card-text">You are successfully logged in.</p>
                    <p class="text-muted">Email: <?= htmlspecialchars($user['user_email']) ?></p>
                </div>
            </div>

            <div class="mt-4">
                <h3>Dashboard</h3>
                <p>This is your dashboard after login.</p>
                <a href="?action=products" class="btn btn-info">Go to Products</a>
            </div>
        </div>
    </div>
</div>
