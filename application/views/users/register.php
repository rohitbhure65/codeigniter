<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        background: #f1f3f6;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    section {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        max-width: 440px;
        height: 100vh;
    }
    h2 {
        margin-bottom: 20px;
        color: #22223b;
        text-align: center;
        letter-spacing: 1px;
        font-size: 22px;
    }
    form {
        background: #fff;
        padding: 20px 18px 18px 18px;
        border-radius: 8px;
        box-shadow: 0 2px 12px rgba(34,34,59,0.08);
        display: flex;
        flex-direction: column;
        gap: 8px;
        min-height: 480px;
        justify-content: flex-start;
    }
    label {
        margin-bottom: 4px;
        font-weight: 600;
        color: #22223b;
        letter-spacing: 0.5px;
        font-size: 14px;
    }
    input[type="text"], input[type="email"], input[type="date"], textarea, select, input[type="password"] {
        width: 100%;
        padding: 7px 9px;
        margin-bottom: 12px;
        border: 1.2px solid #d3d3e7;
        border-radius: 4px;
        font-size: 14px;
        background: #f8f8fa;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    input[type="text"]:focus, input[type="email"]:focus, input[type="date"]:focus, textarea:focus, select:focus, input[type="password"]:focus {
        border-color: #4f8cff;
        outline: none;
        box-shadow: 0 0 0 2px #e3f0ff;
        background: #fff;
    }
    textarea {
        resize: vertical;
        min-height: 79px;
        max-height: 120px;
    }
    input[type="submit"] {
        background: linear-gradient(90deg, #4f8cff 0%, #007bff 100%);
        color: #fff;
        border: none;
        padding: 9px 0;
        border-radius: 4px;
        cursor: pointer;
        font-size: 15px;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-top: 6px;
        transition: background 0.2s, box-shadow 0.2s;
        box-shadow: 0 1px 4px #e3e3f3;
    }
    input[type="submit"]:hover {
        background: linear-gradient(90deg, #007bff 0%, #4f8cff 100%);
        box-shadow: 0 2px 8px #d3e3ff;
    }
    form p {
        color: #e63946;
        font-size: 12px;
        margin-bottom: 8px;
        margin-top: -10px;
    }
    select {
        appearance: none;
        background: #f8f8fa url('data:image/svg+xml;utf8,<svg fill="gray" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>') no-repeat right 9px center/16px 16px;
    }
</style>
<section>
    <h2>Sign up</h2>
    <form action="<?= site_url("user/store") ?>" method="post">
    <label>Name:</label>
    <input type="text" name="name" value="<?= isset($form_data["name"])
    	? $form_data["name"]
    	: "" ?>">
    <?php if (isset($validation_errors["name"])): ?>
        <p><?= $validation_errors["name"] ?></p>
    <?php endif; ?>
    <label>Email:</label>
    <input type="email" name="email" value="<?= isset($form_data["email"])
    	? $form_data["email"]
    	: "" ?>">
    <?php if (isset($validation_errors["email"])): ?>
        <p><?= $validation_errors["email"] ?></p>
    <?php endif; ?>
    <label>Password:</label>
    <input type="password" name="password" value="">
    <?php if (isset($validation_errors["password"])): ?>
        <p><?= $validation_errors["password"] ?></p>
    <?php endif; ?>
    <label>Phone:</label>
    <input type="text" name="phone" value="<?= isset($form_data["phone"])
    	? $form_data["phone"]
    	: "" ?>">
    <?php if (isset($validation_errors["phone"])): ?>
        <p><?= $validation_errors["phone"] ?></p>
    <?php endif; ?>
    <label>Address:</label>
    <textarea name="address"><?= isset($form_data["address"])
    	? $form_data["address"]
    	: "" ?></textarea>
    <?php if (isset($validation_errors["address"])): ?>
        <p><?= $validation_errors["address"] ?></p>
    <?php endif; ?>
    <label>Gender:</label>
    <select name="gender">
        <option value="">Select Gender</option>
        <option value="1" <?= isset($form_data["gender"]) &&
        $form_data["gender"] == 1
        	? "selected"
        	: "" ?>>Male</option>
        <option value="2" <?= isset($form_data["gender"]) &&
        $form_data["gender"] == 2
        	? "selected"
        	: "" ?>>Female</option>
    </select>
    <?php if (isset($validation_errors["gender"])): ?>
        <p><?= $validation_errors["gender"] ?></p>
    <?php endif; ?>
    <label>Role:</label>
    <select name="role">
        <option value="">Select Role</option>
        <option value="1" <?= isset($form_data["role"]) &&
        $form_data["role"] == 1
        	? "selected"
        	: "" ?>>Student</option>
        <option value="2" <?= isset($form_data["role"]) &&
        $form_data["role"] == 2
        	? "selected"
        	: "" ?>>Teacher</option>
    </select>
    <?php if (isset($validation_errors["role"])): ?>
        <p><?= $validation_errors["role"] ?></p>
    <?php endif; ?>
    <label>DOB:</label>
    <input type="date" name="dob" value="<?= isset($form_data["dob"])
    	? $form_data["dob"]
    	: "" ?>">
    <?php if (isset($validation_errors["dob"])): ?>
        <p><?= $validation_errors["dob"] ?></p>
    <?php endif; ?>
    <input type="submit" value="Register">
</form>
</section>
