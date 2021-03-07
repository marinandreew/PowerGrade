<?php
include "../functions/db.php";
include "../layout/header.php";
if (!$loggedIn){
    header("Location: login.php"); 
}

if(isset($_GET['studentId']))
{
    $if = $_GET['studentId'];
    ?>
    <form action="add.php?studentId=<?php echo($if);?>" method="post" enctype="multipart/form-data">
        <div class="loginbox">
            <p>Title:</p>
            <p><input type="text" name="title" maxlength="50" class="input-title" placeholder="Information and date about grade" required></p>
           
    
            <p>Grade:   
            <select id="grade" name="grade" class="select">
                <option value="2" data-marker="2">2</option>
                <option value="3" data-marker="3">3</option>
                <option value="4" data-marker="4">4</option>
                <option value="5" data-marker="5">5</option>
                <option value="6" data-marker="6">6</option>
            </select>
            <input type="submit" name="upload" value="Add">
            
            </p>
            </div>
        </div>
    </form> <?php
}
else{
    header("Location: main.php");
}
