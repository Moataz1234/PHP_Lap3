<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>lap 3</title>
    <link rel="stylesheet" href="lap3_part1.css">
</head>
<body>
    <?php
    $nameErr = $emailErr = "";
    $name = $email = $group = $classDetails = $gender = $agree = "";
    $courses = array();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } 
        elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST["name"])) {
            $nameErr = "Only letters and white space allowed";
        } 
        else {
            $name = test_input($_POST["name"]);
        }
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
        }
        if (!empty($_POST["group"])) {
            $group = test_input($_POST["group"]);
        }
        if (!empty($_POST["classDetails"])) {
            $classDetails = test_input($_POST["classDetails"]);
        }
        if (!empty($_POST["gender"])) {
            $gender = test_input($_POST["gender"]);
        }
        if (!empty($_POST["courses"])) {
            $courses = $_POST["courses"];
        }
        if (!empty($_POST["agree"])) {
            $agree = test_input($_POST["agree"]);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <table>
            <h2 class="head-table">Application name: AAST_BIS class registration</h2>
            <span>*Required fields</span>
            <tr>
                <td class="col1"><label>Name</label></td>
                <td><input class="input1" type="text" name="name" value="<?php echo $name;?>">
                <span class="error">* <?php echo $nameErr;?></span></td>
            </tr>
            <tr>
                <td class="col1"><label>E-Mail</label></td>
                <td><input class="input2" type="email" name="email" value="<?php echo $email;?>">
                <span class="error">* <?php echo $emailErr;?></span></td>
            </tr>
            <tr>
                <td class="col1"><label>Group#</label></td>
                <td><input class="input2" type="number" name="group" value="<?php echo $group;?>"></td>
            </tr>
            <tr>
                <td class="col1"><label>Class details</label></td>
                <td><textarea class="postal" name="classDetails"><?php echo $classDetails;?></textarea></td>
            </tr>
            <tr>
                <td class="col1"><label>Gender</label></td>
                <td>
                    <input type="radio" id="female" name="gender" value="female" <?php if (isset($gender) && $gender == "female") echo "checked";?>>Female
                    <input type="radio" id="male" name="gender" value="male" <?php if (isset($gender) && $gender == "male") echo "checked";?>>Male
                </td>
            </tr>
            <tr>
                <td class="col1"><label>Select Courses</label></td>
                <td>
                    <select class="input1" name="courses[]" multiple>
                        <option value="php" <?php if (in_array("php", $courses)) echo "selected";?>>PHP</option>
                        <option value="js" <?php if (in_array("js", $courses)) echo "selected";?>>Java Script</option>
                        <option value="mysql" <?php if (in_array("mysql", $courses)) echo "selected";?>>MySQL</option>
                        <option value="html" <?php if (in_array("html", $courses)) echo "selected";?>>HTML</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="col1"><label>Agree</label></td>
                <td><input type="checkbox" name="agree" <?php if ($agree == "on") echo "checked";?>></td>
            </tr>
        </table>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($emailErr)) {
        echo "<h2>Your given values are as:</h2>";
        echo "Name: $name<br>";
        echo "E-mail: $email<br>";
        echo "Group #: $group<br>";
        echo "Class details: $classDetails<br>";
        echo "Gender: $gender<br>";
        echo "Your courses are: ";
        if (!empty($courses)) {
            echo implode(", ", $courses);
        }
    }
    ?>

</body>
</html>
