<?php
include "../functions/db.php";
include "../layout/header.php";
?>
<div class="container">
<body>
<?php
$query = "SELECT * FROM teachers";
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
        </div>    
    <?php } ?>
</body>
</div>