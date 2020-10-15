<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('html/head.php'); ?>
</head>
<?php
require_once('libs/my-func.php');
$gender = array(
    'default' => 'Gender',
    'male' => 'Male',
    'female' => 'Female',
    'other' => 'Other',
);
$job = array(
    'default' => 'Job',
    'developer' => 'Developer',
    'student' => 'Student',
    'teacher' => 'Teacher',
);


$arrElementInForm = [
    createSelectbox('sex', $gender, 'female'),
    createSelectbox('job', $job, 'student'), 
    createInput('text','name', 'input--style-2', 'FullName'),
    createInput('text','age', 'input--style-2', 'Age'),
    createInput('text', 'email', 'input--style-2', 'Email')
];

$xhtmlForm = '';
foreach ($arrElementInForm as $element) {
    $xhtmlForm .= '<div class="input-group abc">' . $element . '</div>';
}
?>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form method="POST" action="#">
                        <?php echo $xhtmlForm; ?>
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('html/script.php'); ?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->