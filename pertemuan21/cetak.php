<?php

require_once __DIR__ . '/vendor/autoload.php';

require './functions.php';

$students = get_data("SELECT *, students.id
  FROM ((students 
  INNER JOIN role ON students.role = role.id)
  INNER JOIN position ON students.position = position.id) 
  ORDER BY students.id ASC
  ");

$mpdf = new \Mpdf\Mpdf();
$mpdf->showImageErrors = true;


$html =
  '
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List\'s Students</title>
  <link rel="stylesheet" href="./css/print.css" />
</head>
<body>
  <h1>List\'s Students</h1>

  <table border="1" cellpadding="10" cellspacing="0">

      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>School</th>
        <th>Role</th>
        <th>Position</th>
        <th>Image</th>
      </tr>';

$i = 1;
foreach ($students as $student) {
  $html .= '<tr>
        <td>' . $i++ . '</td>
        <td>'.$student["name"].'</td>
        <td>'.$student["school"].'</td>
        <td>'.$student["name_role"].'</td>
        <td>'.$student["name_position"].'</td>
        <td><img src="img/'. $student["image"] .'" width=\'50\'></td>
      </tr>';
}

$html .= '</table>
</body>
</html>
';


$mpdf->WriteHTML($html);
$mpdf->Output('lists-students.pdf', \Mpdf\Output\Destination::INLINE);
