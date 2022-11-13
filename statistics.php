<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="stylesta.css">

    <title>SCD 360 conference</title>
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col-sm-12">
            <div id="app">
            <div class="result text-center">
              <div class="score_number">
                  <?php
                  include 'connect.inc';
                  $query = mysqli_query($link, "SELECT * FROM users_scd ORDER BY id DESC");
                  $num = mysqli_num_rows($query);
                  ?>
                  <p><?= $num ?></p>
              </div>
                <?php if($num > 0 ){ ?>
              <div class="result_table col-md-12">
                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>National/Iqama ID</th>
                        <th>Speciality</th>
                        <th>Hospital or institution</th>
                        <th>Email</th>
                        <th>Phone number</th>
                        <th>Address (Hospital)</th>
                        <th>SCFHS card number</th>
                        <th>Digital</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($num > 0 ){
                        while($fetch = mysqli_fetch_array($query))
                        {
                            ?>
                            <tr>
                                <td><?= $fetch['first_name'] ?></td>
                                <!-- <td><?= $fetch['last_name'] ?></td>
                                <td><?= $fetch['speciality'] ?></td> -->
                                <td><?= $fetch['hospital'] ?></td>
                                <td><?= $fetch['email'] ?></td>
                                <td><?= $fetch['phone'] ?></td>
                                <!-- <td><?= $fetch['middle_name'] ?></td>
                                <td><?= $fetch['scfhs'] ?></td>
                                <td><?= $fetch['digital'] ?></td> -->
                                <td><a href="viewfile.php?id=<?= $fetch['id'] ?>"> View </a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>National/Iqama ID</th>
                        <th>Speciality</th>
                        <th>Hospital or institution</th>
                        <th>Email</th>
                        <th>Phone number</th>
                        <th>Address (Hospital)</th>
                        <th>SCFHS card number</th>
                        <th>View</th>
                    </tr>
                    </tfoot>
                </table>
              </div>
                <?php } ?>
            </div>
            </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js" charset="utf-8"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
      });
    </script>
  </body>
</html>
