<?php
include "../functions/db.php";
$databaseUser = getUserByUsername($userinfo["username"]);
if($databaseUser["user_type"] == 2){ 
    include "../layout/header.php";?>
    <style>
    /* Tooltip container */
    .tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
    }

    /* Tooltip text */
    .tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;

    width: 120px;
    bottom: 100%;
    left: 50%;
    margin-left: -60px; /* Use half of the width (120/2 = 60), to center the tooltip */
    
    /* Position the tooltip text - see examples below! */
    position: absolute;
    z-index: 1;
    }

    /* Show the tooltip text when you mouse over the tooltip container */
    .tooltip:hover .tooltiptext {
    visibility: visible;
    }
    </style>
    <div class="container">
    <form name="form" method="POST" action="">
        <div class="select-selected">
        <select name="subject" id="subject" onchange="this.form.submit()" style="height:30px; width:120px;">
            <option value="select" selected="selected">Select Class</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
        </div>
    </form>

    <div class="content-container">


    <?php

    if(isset($_POST['subject']))
    {
        $class = $_POST['subject'];
        ?><h2>Class: <?php echo($class);?></h2><?php
        $query = "SELECT COUNT(1) FROM students WHERE class = $class";
        $a = $db->query($query);
        $if = $a->fetch_array();

        if($if[0] == 0)
        {
            ?><h3><?php echo "There aren't any students in this class";?></h3><?php
        }
        else
        {
            ?>
        <body>
        <?php
        $query = "SELECT * FROM students WHERE class = $class";
        $a = $db->query($query);?>
            <div class="table">
                <div class="first">
                    <div class="cell-1">
                    First Name
                    </div>
                    <div class="cell-2">
                    Middle Name
                    </div>
                    <div class="cell-3">
                    Last Name
                    </div>
                    <div class="cell-4">
                    Username
                    </div>
                    <div class="cell-5">
                    Grades
                    </div>
                    <div class="cell-6">
                    Add
                    </div>
                </div>
            </div>
            <?php
            while($if = $a->fetch_array()){
            ?>
            
                <div class="table">
                    <div class="second">
                        <div class="cell" data-title="FName"><?php echo($if['first_name']);?></div>
                        <div class="cell" data-title="MName"><?php echo($if['middle_name']);?></div>
                        <div class="cell" data-title="LName"><?php echo($if['last_name']);?></div>
                        <div class="cell" data-title="Username"><?php echo($if['username']);?></div>
                        <?php
                            $stid = $if['id'];
                            $row1 = "SELECT * FROM grades WHERE studentId = $stid";
                            $row2 = $db->query($row1);
                            
                            ?><div class="cell" data-title="Grades"><?php
                                while($row3 = $row2->fetch_array()){
                                    if($if['id'] = $row3['studentId']){
                                        ?>
                                        <div class="tooltip"><?php echo($row3['grade']); ?>
                                            <span class="tooltiptext"><?php echo($row3['title']); ?></span>
                                        </div>
                                        <?php
                                    } 
                                } ?>
                            </div>
                        <div class="cell" data-title="Grades"><a href="addGrade.php?studentId=<?php echo($if['id']);?>"><input class="button" type="submit" value="+"></a></div>
                    </div>    
                </div>
            <?php } ?>
    </body>
    <?php
        }
    } ?>
    </div>
    <?php
}
else{
    echo "Not a teacher!";
}