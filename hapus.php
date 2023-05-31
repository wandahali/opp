<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <br>

    <?php
    include "koneksi.php";

    class DataHandler
    {
        private $conn;

        public function __construct($conn)
        {
            $this->conn = $conn;
        }

        public function deleteData($nis)
        {
            $query = "DELETE FROM hitung WHERE nis = '$nis'";
            $result = mysqli_query($this->conn, $query);

            if ($result) {
                echo "<a href='tampil.php'>Berhasil</a>";
            } else {
                echo "Gagal menghapus data.";
            }
        }
    }

    $dataHandler = new DataHandler($conn);
    if (isset($_GET['nis'])) {
        $nis = $_GET['nis'];
        $dataHandler->deleteData($nis);
    }
    ?>

</body>

</html>