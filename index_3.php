<?php
require_once __DIR__ . '/vendor/autoload.php';
use \Mpdf\Mpdf;

// ข้อมูลตัวอย่าง
$data = [
    [
        'id' => '001',
        'name' => 'John Doe',
        'faculty' => 'Engineering',
        'major' => 'Computer Science'
    ],
    [
        'id' => '002',
        'name' => 'Jane Smith',
        'faculty' => 'Arts',
        'major' => 'English'
    ],
    [
        'id' => '003',
        'name' => 'Bob Johnson',
        'faculty' => 'Science',
        'major' => 'Physics'
    ]
];

// สร้าง PDF
$mpdf = new Mpdf();

// สร้างหน้ารายงานสำหรับแต่ละสาขา
foreach ($data as $row) {
    // เพิ่มหน้าใหม่
    $mpdf->AddPage();

    // สร้างเนื้อหาของหน้ารายงาน
    $html = '<h1>Report for ' . $row['faculty'] . '</h1>';
    $html .= '<table>';
    $html .= '<tr><th>ID</th><th>Name</th><th>Major</th></tr>';
    $html .= '<tr><td>' . $row['id'] . '</td><td>' . $row['name'] . '</td><td>' . $row['major'] . '</td></tr>';
    $html .= '</table>';

    // เพิ่มเนื้อหาลงในหน้ารายงาน
    $mpdf->WriteHTML($html);
}

// ส่งออกไฟล์ PDF
$mpdf->Output('report.pdf', 'D');
?>
