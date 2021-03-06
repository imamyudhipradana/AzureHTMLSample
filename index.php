<!DOCTYPE html> 
<html>
 <head>
 <meta charset="utf-8">
    <title>Data Kendaraan Bermotor PT. Indofood(Branch Bandung)</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">
  </head>
 <body>
    <main role="main" class="container">
    <div class="starter-template"> <br><br><br>
        <h1>Data Kendaraan Bermotor PT. Indofood</h1>
        <span class="border-top my-3"></span>
      </div>
        <form action="index.php" method="POST">
          <div class="form-group">
            <label for="name">Nama: </label>
            <input type="text" class="form-control" name="nama" id="name" required="" >
        </div>
        <div class="form-group">
            <label for="email">Nomor Induk Motor(NIM): </label>
            <input type="text" class="form-control" name="nim" id="nim" required=""maxlength="16">
        </div>
        <div class="form-group">
            <label for="NPK">Nomor Pokok Kendaraan: </label>
            <input type="text" class="form-control" name="npk" id="npk" required=""maxlength="20">
        </div>
            <input type="submit" class="btn btn-success" name="submit" value="Simpan">
        </form>
        <br><br>
        <form action="index.php" method="GET">
          <div class="form-group">
            <input type="submit" class="btn btn-info" name="load_data" value="Data Masuk">
          </div>
        </form>   
   
 <?php
    $host = "submisi.database.windows.net";
    $user = "adminserver";
    $pass = "@dmin123456789";
    $db = "Parkir";
    try {
        $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch(Exception $e) {
        echo "Failed: " . $e;
    }
    if (isset($_POST['submit'])) {
        try {
            $name = $_POST['nama'];
            $nim = $_POST['nim'];
            $npk = $_POST['npk'];
            $date = date("Y-m-d");
            // Insert data
            $sql_insert = "INSERT INTO daftar (nama, nim, npk, date) 
                        VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $nim);
            $stmt->bindValue(3, $npk);
            $stmt->bindValue(4, $date);
            $stmt->execute();
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }
        echo "<h3>Your're registered!</h3>";
    } else if (isset($_GET['load_data'])) {
        try {
            $sql_select = "SELECT * FROM daftar";
            $stmt = $conn->query($sql_select);
            $registrants = $stmt->fetchAll(); 
            if(count($registrants) > 0) {
                echo "<h2>Mahasiswa yang sudah teregistrasi kendaraannya sebanyak : ".count($registrants)." Orang</h2>";
                echo "<table class='table table-hover'><thead>";
                echo "<tr><th>Name</th>";
                echo "<th>NIM</th>";
                echo "<th>NPK</th>";
                echo "<th>Date</th></tr></thead><tbody>";
                foreach($registrants as $registrant) {
                    echo "<tr><td>".$registrant['nama']."</td>";
                    echo "<td>".$registrant['nim']."</td>";
                    echo "<td>".$registrant['npk']."</td>";
                    echo "<td>".$registrant['date']."</td></tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<h3>No one is currently registered.</h3>";
            }
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }
    }
 ?>
 </div>
    </main><!-- /.container -->

</tbody>
</table>
 
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
  </body>
</html>
