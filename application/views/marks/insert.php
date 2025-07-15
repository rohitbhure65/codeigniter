<!DOCTYPE html>
<html>
<head>
    <title>Insert Marks</title>
    <style>

    </style>
</head>
<body>
    <div class="container">
        <h1>Insert Marks</h1>
        
        <form action="<?php echo base_url('marks/store'); ?>" method="post">
            <div class="form-group">
                <label for="student_name">Student Name:</label>
                <input type="text" id="student_name" name="student_name" required>
            </div>
            
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            
            <div class="form-group">
                <label for="marks">Marks:</label>
                <input type="number" id="marks" name="marks" min="0" max="100" required>
            </div>
            
            <div class="form-group">
                <input type="submit" value="Insert Marks">
            </div>
        </form>
    </div>
</body>
</html>
