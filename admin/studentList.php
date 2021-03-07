<?php
include "../functions/db.php";
include "../layout/header.php";
?>
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
$query = "SELECT * FROM students";
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
<?php
    }
} ?>
</div>