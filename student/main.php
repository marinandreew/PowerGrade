<?php
include "../functions/db.php";
$databaseUser = getUserByUsername($userinfo["username"]);
if($databaseUser["user_type"] == 3){ 
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
        <h2 style="color:white;">Welcome, <?=$databaseUser["first_name"];?> <?=$databaseUser["middle_name"];?> <?=$databaseUser["last_name"];?></h2>
    </div>
    <div class="content-container">
    <body>
    <div class="table">
        <div class="first">
            <div class="cell-1">
            English
            </div>
            <div class="cell-2">
            Maths
            </div>
            <div class="cell-3">
            Programming
            </div>
            <div class="cell-4">
            Music
            </div>
            <div class="cell-5">
            History
            </div>
            <div class="cell-6">
            Biology
            </div>
        </div>
    </div>
    
    <div class="table">
        <div class="second">
            <div class="cell" data-title="english"><?php
            $userID = $userinfo["id"];
            $queryt = "SELECT * FROM students WHERE user_id = $userID";
            $ab = $db->query($queryt);
            while($if2 = $ab->fetch_array()){
                $studentID = $if2['id'];
                $querya = "SELECT * FROM grades WHERE studentId = $studentID AND subjectId = 1";
                $aa = $db->query($querya);
                while($if3 = $aa->fetch_array()){ ?>
                    <div class="tooltip"><?php echo($if3['grade']); ?>
                        <span class="tooltiptext"><?php echo($if3['title']); ?></span>
                    </div><?php
                }
            }
            ?>
            </div>
            <div class="cell" data-title="maths"><?php
            $userID = $userinfo["id"];
            $queryt = "SELECT * FROM students WHERE user_id = $userID";
            $ab = $db->query($queryt);
            while($if2 = $ab->fetch_array()){
                $studentID = $if2['id'];
                $querya = "SELECT * FROM grades WHERE studentId = $studentID AND subjectId = 2";
                $aa = $db->query($querya);
                while($if3 = $aa->fetch_array()){ ?>
                    <div class="tooltip"><?php echo($if3['grade']); ?>
                        <span class="tooltiptext"><?php echo($if3['title']); ?></span>
                    </div><?php
                }
            }
            ?></div>
            <div class="cell" data-title="programming"><?php
            $userID = $userinfo["id"];
            $queryt = "SELECT * FROM students WHERE user_id = $userID";
            $ab = $db->query($queryt);
            while($if2 = $ab->fetch_array()){
                $studentID = $if2['id'];
                $querya = "SELECT * FROM grades WHERE studentId = $studentID AND subjectId = 3";
                $aa = $db->query($querya);
                while($if3 = $aa->fetch_array()){ ?>
                    <div class="tooltip"><?php echo($if3['grade']); ?>
                        <span class="tooltiptext"><?php echo($if3['title']); ?></span>
                    </div><?php
                }
            }
            ?></div>
            <div class="cell" data-title="music"><?php
            $userID = $userinfo["id"];
            $queryt = "SELECT * FROM students WHERE user_id = $userID";
            $ab = $db->query($queryt);
            while($if2 = $ab->fetch_array()){
                $studentID = $if2['id'];
                $querya = "SELECT * FROM grades WHERE studentId = $studentID AND subjectId = 4";
                $aa = $db->query($querya);
                while($if3 = $aa->fetch_array()){ ?>
                    <div class="tooltip"><?php echo($if3['grade']); ?>
                        <span class="tooltiptext"><?php echo($if3['title']); ?></span>
                    </div><?php
                }
            }
            ?></div>
            <div class="cell" data-title="history"><?php
            $userID = $userinfo["id"];
            $queryt = "SELECT * FROM students WHERE user_id = $userID";
            $ab = $db->query($queryt);
            while($if2 = $ab->fetch_array()){
                $studentID = $if2['id'];
                $querya = "SELECT * FROM grades WHERE studentId = $studentID AND subjectId = 5";
                $aa = $db->query($querya);
                while($if3 = $aa->fetch_array()){ ?>
                    <div class="tooltip"><?php echo($if3['grade']); ?>
                        <span class="tooltiptext"><?php echo($if3['title']); ?></span>
                    </div><?php
                }
            }
            ?></div>
            <div class="cell" data-title="biology"><?php
            $userID = $userinfo["id"];
            $queryt = "SELECT * FROM students WHERE user_id = $userID";
            $ab = $db->query($queryt);
            while($if2 = $ab->fetch_array()){
                $studentID = $if2['id'];
                $querya = "SELECT * FROM grades WHERE studentId = $studentID AND subjectId = 6";
                $aa = $db->query($querya);
                while($if3 = $aa->fetch_array()){ ?>
                    <div class="tooltip"><?php echo($if3['grade']); ?>
                        <span class="tooltiptext"><?php echo($if3['title']); ?></span>
                    </div><?php
                }
            }
            ?></div>
        </div>
    </div>
    <?php
} else{
        echo "Not a student!";
    }
    ?>
    </div>