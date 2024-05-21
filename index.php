<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="text-center">
    <form method="post">
        <input type="text" name = "nama" placeholder = "Masukkan nama" id="nama" required>
        <input type="number" name = "hari" placeholder = "Waktu rental (hari)" id="hari" required>
        <select name="jenisMotor" id="jenisMotor">
            <option value="Scooter">Scooter</option>
            <option value="Ducati">Ducati</option>
            <option value="Harley">Harley</option>
            <option value="Yamaha">Yamaha</option>
        </select>
        <input class="btn btn-primary" type="submit" value="Submit">
    </form>

    <?php
    class rentalMotor {
        private $nama;
        private $hari;
        private $jenisMotor;
        private $hargaMotor;
        private $pajak;

        public function __construct($nama, $hari, $jenisMotor){
            $this->nama = $nama;
            $this->hari = $hari;
            $this->jenisMotor = $jenisMotor;
            $this->hargaMotor = 60000;
            $this->pajak = 10000;

           
        }

        public function hitungTotal(){
            $total = $this->hargaMotor * $this->hari + $this->pajak;
            return $total;
        }

        public function Output(){
            echo "<div class = 'output'>";
            echo  "<h3>Rental motor</h3>";
            echo "Nama : $this->nama <br>" ;
            echo "Lama rental : $this->hari Hari <br>";
            echo "Jenis motor : $this->jenisMotor <br>";
            echo "<p>Total: Rp. " . number_format($this->hitungTotal(), 2) . "</p>";
            echo "</div>";
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $motorRental = new rentalMotor($_POST['nama'], $_POST['hari'], $_POST['jenisMotor']);
        $motorRental->Output();
    }
    ?>
    </div>
</body>
</html>