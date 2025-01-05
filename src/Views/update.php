<form class="border rounded-4 p-3" method="POST" action="?action=update">
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="hidden" name="id" value="<?= $user["id"] ?>">
        <input
            type="text"
            class="form-control"
            name="name"
            id="name"
            value="<?= $user["name"] ?>"
            aria-describedby="helpId"
            placeholder=""
        />
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input
            type="email"
            class="form-control"
            name="email"
            id="email"
            value="<?= $user["email"] ?>"
            aria-describedby="emailHelpId"
            placeholder="abc@mail.com"
            />
    </div>
    <button
        type="submit"
        class="btn btn-primary w-100"
    >
        Submit
    </button>
    
    
</form>