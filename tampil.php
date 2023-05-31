<?php
class DataPage
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function displayData()
    {
        ?>
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
            <h2>DATA - DATA</h2>
            <table class="table" border="1" cellpadding="10" cellspacing="0">
                <th>NIS</th>
                <th>Matematika</th>
                <th>Prod</th>
                <th>Pipas</th>
                <th>Sejarah</th>
                <th>Agama</th>
                <th>Bindo</th>
                <th>Aksi</th>

                <a class="a" href="index.php">Tambah data</a><br>

                <?php
                $no = 1;
                $ambil = mysqli_query($this->conn, "SELECT * FROM hitung");
                while ($data = mysqli_fetch_array($ambil)) {
                    ?>
                    <tr class="tr">
                        <td><?php echo $data['nis']; ?></td>
                        <td><?php echo $data['mtk']; ?></td>
                        <td><?php echo $data['prod']; ?></td>
                        <td><?php echo $data['pipas']; ?></td>
                        <td><?php echo $data['sejarah']; ?></td>
                        <td><?php echo $data['agama']; ?></td>
                        <td><?php echo $data['bindo']; ?></td>
                        <td>
                            <a href="hapus.php?nis=<?php echo $data['nis']; ?>">HAPUS</a>
                            <a href=""></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </body>

        </html>
    <?php
    }
}

// Usage
include "koneksi.php";
$dataPage = new DataPage($conn);
$dataPage->displayData();
?>