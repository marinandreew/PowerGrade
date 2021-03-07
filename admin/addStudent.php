<head>
    <link rel="stylesheet" href="../css/style.css">
</head>

<div class="log-box">
    <div class="loginbox">
        <img src="../images/student.png" class="avatar">
        <form method="POST" action="../functions/userStudent.php">
        <div class="form-group">
                <label for="first_name">First name: </label>
                <input type="text" name="first_name" class="form-control" placeholder="Student first name" id="firstName"  required>
            </div>
            <div class="form-group">
                <label for="middle_name">Middle name: </label>
                <input type="text" name="middle_name" class="form-control" placeholder="Student middle name" id="middleName"  required>
            </div>
            <div class="form-group">
                <label for="last_name">Last name: </label>
                <input type="text" name="last_name" class="form-control" placeholder="Student last name" id="lastName"  required>
            </div>
            <div class="form-group">
                <label for="username">Username: </label>
                <input type="text" name="username" class="form-control" placeholder="Student username" id="username"  required>
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" name="email" class="form-control" placeholder="Student email" id="email"  required>
            </div>
            <div class="form-group">
                <label for="class">Class: </label>
                <select id="class" name="class" class="select" style="height:30px; width:120px;">
                    <option value="select" selected="selected">Select Class</option>
                    <option value="1" data-marker="1">1</option>
                    <option value="2" data-marker="2">2</option>
                    <option value="3" data-marker="3">3</option>
                    <option value="4" data-marker="4">4</option>
                    <option value="5" data-marker="5">5</option>
                    <option value="6" data-marker="6">6</option>
                    <option value="7" data-marker="7">7</option>
                    <option value="8" data-marker="8">8</option>
                    <option value="9" data-marker="9">9</option>
                    <option value="10" data-marker="10">10</option>
                    <option value="11" data-marker="11">11</option>
                    <option value="12" data-marker="12">12</option>
                </select>
            </div>
            <p>&nbsp;</p>
            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" name="password" class="form-control" placeholder="Student password" id="password"  required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password: </label>
                <input type="password" name="confirmPassword" class="form-control" placeholder="Re-enter student password" id="confirmPassword"  required>
            </div>
            <div class="form-group">
                <input type="submit" value="Register Student" class="btn btn-primary">
                <input type="hidden" name="action" value="register">
            </div>
        </form>
    </div>
</div>