<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: lightblue;
        }
        p{
            font-weight: bold;
        }
        label{
            font-weight: bold;
            font-size: 20px;
            padding: 20px;
            margin:20px 0px 10px 0px;
        }
        input{
         
            margin: 5px;
            width: 100px;
            padding: auto;
        }
        .result_class>p {
            font-size: 25px;
            font-weight: bold;
        }
       
    </style>
</head>

<body style="text-align: center;">
    <form style="background-color: antiquewhite;padding: 20px;width: 600px;margin: 50px auto;border-radius: 10px" method="post" action="">
        <h3>Please Enter your valid Mark of each subject: </h3>
        <label for="subject_1">Subject 1 Marks: </label><input type="number" id="subject_1" name="subject1"><br>
        <label for="subject_2">Subject 2 Marks: </label><input type="number" id="subject_2" name="subject2"><br>
        <label for="subject_3">Subject 3 Marks: </label><input type="number" id="subject_3" name="subject3"><br>
        <label for="subject_4">Subject 4 Marks: </label><input type="number" id="subject_4" name="subject4"><br>
        <label for="subject_5">Subject 5 Marks: </label><input type="number" id="subject_5" name="subject5"><br>
        <input style="background-color: green;padding: 5px;color: white;border-radius: 5px;margin-top:5px;width: 200px;" type="submit" value="Result Calculate">

    </form>

    <?php
    $result_comment = "";
    $average = "";
    $grade = "";
    $total_marks = "";
    $result_show ="";

    function mark_validation($marks)
    {
        if (is_numeric(($marks)) && ($marks >= 0) && ($marks <= 100)) {
            return true;
        } else {
            return false;
        }
    }

    $subject_1 = $_POST['subject1'];
    $subject_2 = $_POST['subject2'];
    $subject_3 = $_POST['subject3'];
    $subject_4 = $_POST['subject4'];
    $subject_5 = $_POST['subject5'];

    if (mark_validation($subject_1) && mark_validation($subject_2) && mark_validation($subject_3) && mark_validation($subject_4) && mark_validation($subject_5)) {
        if (($subject_1 < 33 || $subject_2 < 33 || $subject_3 < 33 || $subject_4 < 33 || $subject_5 < 33)) {
            $result_comment = "You Are Failed in the Exam";
            $result_show = false;
        } else {
            $result_comment = "Congratulations,You Are Passed in the Exam";
            $total_marks = $subject_1 + $subject_2 + $subject_3 + $subject_4 + $subject_5;
            $average = $total_marks / 5;
            if (($average >= 80) && ($average <= 100)) {
                $grade = "A+";
            } elseif (($average >= 70) && ($average <= 79)) {
                $grade = "A";
            } elseif (($average >= 60) && ($average <= 69)) {
                $grade = "A-";
            } elseif (($average >= 50) && ($average <= 59)) {
                $grade = "B";
            } else if (($average >= 40) && ($average <= 49)) {
                $grade = "C";
            } else {
                $grade = "D";
            }
            $result_show = true;
        }
    } else {
        echo "<b>Mark Range is invalid</b>";
    }
    ?>
    
    <?php if ($result_show):?>
    <div class="result_class" style="text-align: center;">
        <p><?php echo $result_comment ?? ''; ?></p>
        <P>YOUR TOTAL MARKS:&nbsp;<?php echo $total_marks ?? ''; ?></P>
        <p>YOUR AVERAGE MARKS:&nbsp;<?php echo $average ?? ''; ?></p>
        <p>YOUR GRADE:&nbsp;<?php echo $grade ?? ''; ?></p>

    </div>
    <?php else:?>
        <p><?php echo $result_comment ?? ''; ?></p>
    <?php endif; ?>

</body>

</html>