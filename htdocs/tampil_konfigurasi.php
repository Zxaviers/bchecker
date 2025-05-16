<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Konfigurasi</title>
    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #444;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Data Konfigurasi Perangkat</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>CPU</th>
            <th>GPU</th>
            <th>Resolusi</th>
            <th>Tujuan</th>
            <th>Bottleneck (%)</th>
            <th>Catatan</th>
        </tr>
        <?php
        $sql = "SELECT 
                    c.Config_ID, 
                    p.CPU_Model, 
                    g.GPU_Model, 
                    r.Resolution_Type, 
                    pr.Purpose_Name,
                    c.Bottleneck_Percentage, 
                    c.Notes
                FROM Configuration c
                JOIN Processor p ON c.CPU_ID = p.CPU_ID
                JOIN Graphic_Card g ON c.GPU_ID = g.GPU_ID
                JOIN Screen_Resolution r ON c.Resolution_ID = r.Resolution_ID
                JOIN Purpose pr ON c.Purpose_ID = pr.Purpose_ID";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['Config_ID']}</td>
                        <td>{$row['CPU_Model']}</td>
                        <td>{$row['GPU_Model']}</td>
                        <td>{$row['Resolution_Type']}</td>
                        <td>{$row['Purpose_Name']}</td>
                        <td>{$row['Bottleneck_Percentage']}%</td>
                        <td>{$row['Notes']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</body>
</html>
