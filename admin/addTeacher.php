<head>
    <link rel="stylesheet" href="../css/style.css">
</head>

<div class="log-box">
    <div class="loginbox">
        <img src="../images/teacher.png" class="avatar">
        <form method="POST" action="../functions/userTeacher.php">
            <div class="form-group">
                <label for="first_name">First name: </label>
                <input type="text" name="first_name" class="form-control" placeholder="Teacher first name" id="firstName" required>
            </div>
            <div class="form-group">
                <label for="middle_name">Middle name: </label>
                <input type="text" name="middle_name" class="form-control" placeholder="Teacher middle name" id="middleName" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last name: </label>
                <input type="text" name="last_name" class="form-control" placeholder="Teacher last name" id="lastName" required>
            </div>
            <div class="form-group">
                <label for="username">Username: </label>
                <input type="text" name="username" class="form-control" placeholder="Teacher username" id="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" name="email" class="form-control" placeholder="Teacher email" id="email" required>
            </div>
            <div class="form-group">
                <label for="subjectP">Subject: </label>
                <select id="subjectP" name="subjectP" class="form-control" style="height:30px; width:120px;">
                    <option value="select" selected="selected">Select Subject</option>
                    <option value="1" data-marker="1">English</option>
                    <option value="2" data-marker="2">Maths</option>
                    <option value="3" data-marker="3">Programming</option>
                    <option value="4" data-marker="4">Music</option>
                    <option value="5" data-marker="5">History</option>
                    <option value="6" data-marker="6">Biology</option>
                </select>
            </div>
            <?php # removed class addition ?>
            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" name="password" class="form-control" placeholder="Teacher password" id="password"  required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password: </label>
                <input type="password" name="confirmPassword" class="form-control" placeholder="Re-enter teacher password" id="confirmPassword"  required>
            </div>
            <div class="form-group">
                <input type="submit" value="Register Teacher" class="btn btn-primary">
                <input type="hidden" name="action" value="register">
            </div>
        </form>
    </div>
</div>