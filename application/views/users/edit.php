<style>
    body { font-family: Arial, sans-serif;
    display: flex; justify-content: center; align-items: center; height: 100vh; }
    h2 { margin-bottom: 20px; }
    form {
        max-width: 400px;
        background: #f9f9f9;
        padding: 18px 24px 24px 24px;
        border-radius: 6px;
        box-shadow: 0 2px 8px #eee;
    }
    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
    }
    input[type="text"], input[type="email"], input[type="date"], textarea, select {
        width: 100%;
        padding: 7px 10px;
        margin-bottom: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 15px;
    }
    textarea { resize: vertical; }
    input[type="submit"] {
        background: #007bff;
        color: #fff;
        border: none;
        padding: 9px 22px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 15px;
    }
    input[type="submit"]:hover {
        background: #0056b3;
    }
    form p{
        color: red;
    }
</style>
<section>
    <h2>Edit User</h2>
    <form action="<?= site_url('user/update/'.$user['id']) ?>" method="post">
    <label>Name:</label>
    <input type="text" name="name" value="<?= set_value('name', $user['name']) ?>">
    <?php echo form_error('name'); ?>
    <label>Email:</label>
    <input type="email" name="email" value="<?= set_value('email', $user['email']) ?>">
    <?php echo form_error('email'); ?>
    <label>Phone:</label>
    <input type="text" name="phone" value="<?= set_value('phone', $user['phone']) ?>">
    <?php echo form_error('phone'); ?>
    <label>Address:</label>
    <textarea name="address"><?= set_value('address', $user['address']) ?></textarea>
    <?php echo form_error('address'); ?>
    <label>Gender:</label>
    <select name="gender">
        <option value="Male" <?= set_value('gender', $user['gender']) == 'Male' ? 'selected' : '' ?>>Male</option>
        <option value="Female" <?= set_value('gender', $user['gender']) == 'Female' ? 'selected' : '' ?>>Female</option>
        <option value="Other" <?= set_value('gender', $user['gender']) == 'Other' ? 'selected' : '' ?>>Other</option>
    </select>
    <?php echo form_error('gender'); ?>
    <label>DOB:</label>
    <input type="date" name="dob" value="<?= set_value('dob', $user['dob']) ?>">
    <?php echo form_error('dob'); ?>
    <input type="submit" value="Update">
</form>
</section>