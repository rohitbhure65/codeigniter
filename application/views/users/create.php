<h2>Create User</h2>
<form action="<?= site_url('user/store') ?>" method="post">
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Phone: <input type="text" name="phone"><br>
    Address: <textarea name="address"></textarea><br>
    Gender:
    <select name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select><br>
    DOB: <input type="date" name="dob"><br>
    <input type="submit" value="Save">
</form>
