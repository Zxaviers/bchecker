<?php
header('Content-Type: application/json');

// Ambil data dari POST
$cpu_id = $_POST['processor'] ?? '';
$gpu_id = $_POST['graphic_card'] ?? '';
$resolution_id = $_POST['screen_resolution'] ?? '';
$purpose_id = $_POST['purpose'] ?? '';

// Validasi input
if (empty($cpu_id) || empty($gpu_id) || empty($resolution_id) || empty($purpose_id)) {
    echo json_encode([
        'success' => false,
        'message' => 'Semua data harus diisi.'
    ]);
    exit;
}

// Koneksi ke database
$conn = new mysqli("localhost", "root", "Aku898989", "bnc_simbada");
if ($conn->connect_error) {
    echo json_encode([
        'success' => false,
        'message' => 'Koneksi gagal: ' . $conn->connect_error
    ]);
    exit;
}

// Pastikan input berupa integer
$cpu_id = (int)$cpu_id;
$gpu_id = (int)$gpu_id;
$resolution_id = (int)$resolution_id;
$purpose_id = (int)$purpose_id;

// Siapkan dan eksekusi query
$sql = "SELECT Bottleneck_Percentage, Notes 
        FROM Configuration 
        WHERE CPU_ID = ? AND GPU_ID = ? AND Resolution_ID = ? AND Purpose_ID = ?";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode([
        'success' => false,
        'message' => 'SQL prepare failed: ' . $conn->error
    ]);
    exit;
}

$stmt->bind_param("iiii", $cpu_id, $gpu_id, $resolution_id, $purpose_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode([
        'success' => true,
        'bottleneck' => $row['Bottleneck_Percentage'],
        'notes' => $row['Notes']
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Kombinasi konfigurasi tidak ditemukan.'
    ]);
}

$stmt->close();
$conn->close();
