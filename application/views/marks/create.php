<form action="<?= site_url("marks/create") ?>" method="post">
    <label>Name:</label>
    <input type="text" name="name" value="<?= isset($form_data["name"])
    	? $form_data["name"]
    	: "" ?>" class="<?= isset($validation_errors["name"])
	? "error-input"
	: "" ?>">
    <?php if (isset($validation_errors["name"])): ?>
        <p><?= $validation_errors["name"] ?></p>
    <?php endif; ?>
    <label>Email:</label>
    <input type="email" name="email" value="<?= isset($form_data["email"])
    	? $form_data["email"]
    	: "" ?>" class="<?= isset($validation_errors["email"])
	? "error-input"
	: "" ?>">

    <input type="submit" value="Register">
</form>