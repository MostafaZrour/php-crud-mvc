<form class="border rounded-4 p-3" method="POST" action="?action=create">
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input
            type="text"
            class="form-control"
            name="name"
            id="name"
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