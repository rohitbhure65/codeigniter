<h2>Edit User</h2>
<form action="<?= site_url('user/update/'.$user['id']) ?>" method="post">
    Name: <input type="text" name="name" value="<?= $user['name'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $user['email'] ?>"><br>
    Phone: <input type="text" name="phone" value="<?= $user['phone'] ?>"><br>
    Address: <textarea name="address"><?= $user['address'] ?></textarea><br>
    Gender:
    <select name="gender">
        <option value="Male" <?= $user['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
        <option value="Female" <?= $user['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
        <option value="Other" <?= $user['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
    </select><br>
    DOB: <input type="date" name="dob" value="<?= $user['dob'] ?>"><br>
    <input type="submit" value="Update">
</form>
