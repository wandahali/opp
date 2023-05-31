<!DOCTYPE html>
<html lang="en">
<body>
    <center>
<center><h1>INPUT</h1></center>
	<table cellspacing='0'>
		<thead>
        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #AEE2FF;
        }

        h1 {
            text-align: center;
        }

        table {
            margin: 5px auto;
            border-collapse: collapse;
            width: 15%;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        thead th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        input[type="text"] {
            width: 15%;
            padding: 5px;
        }

        input[type="submit"] {
            margin-top: 5px;
            padding: 8px 5px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        hr {
            margin-top: 15px;
        }
    </style>
     
    </style>
        <form action="" method="post">
           <table>
            <tr>
            <h5>NIS</h5>
            <th>NIS</th>
            <input type="text" name="nis">
</tr>
</thead>
<tbody>
<tr>
            <h5>Matematika</h5>
            <td>Matematika</td>
            <input type="text" name="mtk">
</tr>
<tr>
            <h5>Produktif</h5>
            <td>Prod</td>
            <input type="text" name="prod">
</tr>
<tr>
            <h5>Pipas</h5>
            <td>Pipas</td>
            <input type="text" name="pipas">
</tr>
<tr>
            <h5>Sejarah</h5>
            <input type="text" name="sejarah">
</tr>
            <h5>Agama</h5>
            <td>Agama</td>
            <input type="text" name="agama">
<tr>
            <h5>B.indo</h5>
            <td>B.indo</td>
            <input type="text" name="bindo">
</tr>
            <br><br>
            <input type="submit" name="submit">
            <hr>
        </form>
    </center>
</tbody>
</table>
</body>

</html>

<?php
class FormHandler
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function handleSubmit()
    {
        if (isset($_POST['submit'])) {
            $nis = $_POST['nis'];
            $mtk = $_POST['mtk'];
            $prod = $_POST['prod'];
            $pipas = $_POST['pipas'];
            $sejarah = $_POST['sejarah'];
            $agama = $_POST['agama'];
            $bindo = $_POST['bindo'];

            $sql = "INSERT INTO `hitung`(`nis`,`mtk`, `prod`, `pipas`, `sejarah`, `agama`, `bindo`) VALUES ('$nis','$mtk','$prod','$pipas','$sejarah','$agama','$bindo')";
            $apakah = mysqli_query($this->conn, $sql);

            if ($apakah) {
                echo "Berhasil ditambahkan";
            } else {
                echo "Gagal";
                exit;
            }

            $data = array($mtk, $prod, $pipas, $sejarah, $agama, $bindo);

    
            $totalSemua = array_sum($data);
            echo "Jumlah total angka: " . $totalSemua . "<br>";


            $total1 = array_sum($data);
            $jumlahData = count($data);
            $rataRata = $total1 / $jumlahData;
            echo "Jumlah rata rata: " . $rataRata . "<br>";


            $maksimum = max($data);
            echo "Nilai maksimum: " . $maksimum . "<br>";

           
            $minimum = min($data);
            echo "Nilai minimum: " . $minimum . "<br>";

          
            if ($totalSemua >= 540) {
                echo "A";
            } elseif ($totalSemua >= 480) {
                echo "B";
            } elseif ($totalSemua >= 420) {
                echo "C";
            } else {
                echo "D";
            }
            echo "<br>";
        }
    }
}

include "koneksi.php";
$formHandler = new FormHandler($conn);
$formHandler->handleSubmit();
?>
