<?php
$conn = mysqli_connect("localhost", "root", "admin123", "Student_Management_DB");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['enroll'])) {
    if (
        $_POST['student_number'] == '' ||
        $_POST['first_name'] == '' ||
        $_POST['last_name'] == '' ||
        $_POST['gender'] == '' ||
        $_POST['department'] == '' ||
        $_POST['year_level'] == ''
    ) {
        echo "Fields must not be null";

    } 
    else if ($_POST['year_level'] < 1 || $_POST['year_level'] > 5) {
        echo "Year Level must be between 1 and 5";

    } 
    else {

        $sql = "INSERT INTO Student
                (StudentNumber, FirstName, LastName, Gender, Department, YearLevel, AcademicStanding, Status)
                VALUES
                ('$_POST[student_number]',
                 '$_POST[first_name]',
                 '$_POST[last_name]',
                 '$_POST[gender]',
                 '$_POST[department]',
                 '$_POST[year_level]',
                 '$_POST[academic_standing]',
                 '$_POST[status]')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Student successfully enrolled";
        } else {
            echo "Error: Student already exists";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registrar Section</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #e8d7b8;
        }


        .top-bar {
            height: 60px;
            background: #7a3f3f;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding-right: 25px;
        }

        .top-bar img {
            width: 36px;
            height: 36px;
        }


        .container {
            padding: 30px 50px;
        }

        h1 {
            margin-bottom: 20px;
        }


        .form-box {
            border: 2px solid #7a3f3f;
            border-radius: 12px;
            padding: 20px 30px 30px;
            position: relative;
        }


        .trash {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #4b2b1a;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        .form-title {
            text-align: center;
        }

        .form-title h2 {
            margin: 0;
        }

        .form-title p {
            margin: 5px 0 15px;
        }

        hr {
            border: none;
            border-top: 1px solid #444;
            margin-bottom: 20px;
        }


        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px 60px;
            padding: 0 40px;
        }

        .field {
            display: flex;
            align-items: center;
        }

        .field label {
            width: 120px;
            font-size: 15px;
        }

        .field input {
            width: 200px;
            height: 24px;
        }


        .buttons {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            padding: 5px 10px;
        }


        .left-buttons {
            display: grid;
            grid-template-columns: auto auto;
            gap: 15px;
        }


        .left-buttons .update {
            grid-column: 1 / 2;
        }

        .right-buttons {
            display: grid;
            grid-template-columns: repeat(2, 150px);
            gap: 15px;
            align-items: center;
        }

        .view {
            background: #5a2a00;
            width: 150px;
            height: 45px;
        }


        button {
            padding: 10px 22px;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
        }


        .enroll {
            background: #0b7d3e;
            width: 150px;
            height: 45px;
        }

        .drop {
            background: #b51212;
            width: 150px;
            height: 40px;
        }

        .update {
            background: #5a2a00;
            width: 150px;
            height: 40px;
        }

        .view {
            background: #5a2a00;
        }

        .right-buttons {
            flex-direction: column;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25);
        }

        .enroll:hover {
            background: #0f9a4d;
        }

        .drop:hover {
            background: #d01818;
        }

        .update:hover,
        .view:hover {
            background: #6e3400;
        }


        button:active {
            transform: translateY(0);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <div class="top-bar">
        <img src="Assets/admin.png" alt="Profile">
    </div>

    <div class="container">
        <h1>Registrar Section</h1>

        <div class="form-box">
            <div class="trash">🗑</div>

            <div class="form-title">
                <h2>Enroll Student</h2>
                <p>Fill up the form</p>
            </div>

            <hr>


            <form method="POST">
                <div class="form-grid">

                    <div class="field">
                        <label>Student Number:</label>
                        <input type="text" name="student_number">
                    </div>

                    <div class="field">
                        <label>Department:</label>
                        <input type="text" name="department">
                    </div>

                    <div class="field">
                        <label>First Name:</label>
                        <input type="text" name="first_name">
                    </div>

                    <div class="field">
                        <label>Year Level:</label>
                        <input type="number" name="year_level">
                    </div>

                    <div class="field">
                        <label>Last Name:</label>
                        <input type="text" name="last_name">
                    </div>

                    <div class="field">
                        <label>Status:</label>
                        <select>
                            <option value="">Select Status</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Graduated">Graduated</option>
                        </select>
                    </div>

                    <div class="field">
                        <label>Gender:</label>
                        <input type="text" name="gender">
                    </div>

                    <div class="field">
                        <label>Academic Standing:</label>
                        <input type="text" name="academic_standing">
                    </div>
                </div>
            </form>

        </div>

        <div class="buttons">
            <div class="left-buttons">
                <button type="submit" name="enroll" class="enroll">Add Student</button>
                <button class="view">View Student</button>
                <button class="view">View Grades</button>
                <button class="view">View Faculty</button>
            </div>

            <div class="right-buttons">
                
                <button class="view">View Course</button>
                <button class="view">View Enrollments</button>
                <button class="view">View Students Performance</button>
            </div>
        </div>
    </div>

</body>

</html>
