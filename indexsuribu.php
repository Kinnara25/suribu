<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Suribu</title>
</head>

<?php

$container{
  'background-position': '50% 50%';
  'font-weight': 'bold';
  'margin-left': '0px';
  'padding-top': '15px';
  'position': 'relative';
}

$wrapper{
  'display': 'grid';
  'grid-template-columns': '1fr 2fr';
}

$thead={
'background-color':'grey';
'width':'545px';
}



?>
<body>

  <div class="container"> 
  <!-- Content here -->
      <div class="row-8">
        <div class="card col-6">
          <div class="bg-warning col-12">Permintaan Suribu</div>
            <form action="suribu.php" method="post">

              <h4></h4>
              <div class="card bg-secondary text-black"></div>
              <div class="row">
                <div class="col-6">
                  <div class="row">
                    <div class="mb-3 col-10">
                      <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                      <input class="form-control" type="date" id="tgl_selesai" name="Tanggal Selesai" placeholder="Tanggal Selesai" />
                    </div>

                  <div class="row">
                    <div class="mb-3 col-10">
                      <label for="stok_barang" class="form-label">Stock Barang Saat ini</label>
                      <input class="form-control" type="number" id="stok_barang" name="Total Stock Barang Sementara" />
                    </div>
                  </div>


                  <div class="row">
                    <div class="mb-3 col-10">
                      <label for="stok_barang" class="form-label">Jumlah Permintaan Suribu</label>
                      <input class="form-control" type="number" id="stok_barang" name="Total Stock Barang Sementara" />
                    </div>
                  </div>


                    <div class="mb-3 col-10">
                      <label for="Status">Status</label>
                      <label><input type="checkbox"Name="Status" value=" Urgent">Urgent</label>
                    </div>


                    <div class="mb-3 mt-2 col-12">          
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="mb-3">
                    <label for="kode_item" class="form-label">Kode Item</label>
                    <select class="form-select" aria-label="Default select example" id="kode_item" name="Item Kode">
                            <option>Item Kode</option>
                            <option>INO407</option>
                            <option>INO408</option>
                            <option>INO409</option>
                            <option>INO410</option>
                            <option>INO411</option>
                            <option>INO412</option>
                            <option>INO413</option>
                            <option>INO415</option>
                            <option>INO416</option>
                            <option>INO417</option>
                            <option>INO418</option>

                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="nama_item" class="form-label">Nama Item</label>
                    <select class="form-select" aria-label="Default select example" id="nama_item" name="Cylinder Item">
                          <option>Cylinder Item</option>
                          <option>KLP 40.00t</option>
                          <option>HLP 47.00t</option>
                          <option>HLP 52.00t</option>
                          <option>HLP 62.00t</option>
                          <option>HLP 70.00t</option>
                          <option>HLP 80.00t</option>
                          <option>HLP 82.00t</option>
                          <option>HLP 84.00t</option>
                          <option>HLP 88.00t</option>
                          <option>HLP 93.00t</option>
                          <option>HLP 104.00t</option>
                          <option>HLP 135.00t</option>
                    </select> 
                  </div>

                  <div class="row">
                    <div class="mb-3 col-12">
                      <label for="keterangan" class="form-label">Keterangan</label>
                      <textarea class="form-control" id="keterangan" name="keterangan" rows="1" placeholder="Keterangan"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="card-body">
      <div class="bg-warning col-12">
        <div class="tab-content" id="ujicoba">
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
              <li class="nav-item">
                <button class="nav-link active" id="Request-tab" data-bs-toggle="tab" data-bs-target="#custom-tabs-two-per" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Request</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" id="Permintaan-Selesai-tab" data-bs-toggle="tab" data-bs-target="#custom-tabs-two-selesai" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Permintaan Selesai</button>
              </li>
            </ul>
          </div>
          </div>
          </div> 

            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade" id="custom-tabs-two-per" role="tabpanel" aria-labelledby="profile-tab">
                <table class="table-hover dataTable no-footer" id="tb_permintaan" role="grid" aria-describedby="tb_perbaikan_info" style="width:959px;">
                <thead>
                    <th>Tanggal</th>
                    <th>Nama Item</th>
                    <th>No.Request</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                  </thead>
                  <tbody>

                  <?php
                      include 'koneksi.php';
                      $indexsuribu= "SELECT * FROM suribu";
                      if($result = mysqli_query($koneksi,$indexsuribu))
                      if(mysqli_num_rows($result) > 0)($row = mysqli_fetch_array($result))
                  ?>
                    <tr>
                      <td><?php echo $row['tanggal']?></td>
                      <td><?php echo $row['nama_item'] ?></td>
                      <td><?php echo $row['no_request'] ?></td>
                      <td><?php echo $row['jumlah'] ?></td>
                      <td><?php echo $row['status'] ?></td>
                    </tr>

                  <?php
                      echo "<table border='1' cellpadding='4'>";
                      echo "<tr>";
                          echo "<th>tanggal</th>";
                          echo "<th>nama_item</th>";
                          echo "<th>no_request</th>";
                          echo "<th>jumlah</th>";
                          echo "<th>status</th>";
                      echo "</tr>";
                  ?>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade" id="custom-tabs-two-selesai" role="tabpanel" aria-labelledby="contact-tab" tabindex="1">
                <table class="table-hover dataTable no-footer" id="tb_Permintaan" role="grid" aria-describedby="tb_perbaikan_info" style="width: 959px;">
                  <thead>
                    <th>Tanggal</th>
                    <th>Nama Item</th>
                    <th>No.Request</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Tanggal Selesai</th>
                  </thead>

                  <tbody>
                    <?php
                      echo "<table border='1' cellpadding='4'>";
                      echo "<tr>";
                          echo "<th>tanggal</th>";
                          echo "<th>nama_item</th>";
                          echo "<th>no_request</th>";
                          echo "<th>jumlah</th>";
                          echo "<th>status</th>";
                          echo "<th>tanggal_selesai</th>";
                      echo "</tr>";
                    ?>
                    <tr>
                      <td><?php echo $row['tanggal']?></td>
                      <td><?php echo $row['nama_item'] ?></td>
                      <td><?php echo $row['no_request'] ?></td>
                      <td><?php echo $row['jumlah'] ?></td>
                      <td><?php echo $row['status'] ?></td>
                      <td><?php echo $row['tanggal_selesai'] ?></td>
                    </tr>
                    <?php
                    ?>
                  </tbody>
                </table>
              </div>

        <!-- /.card-header -->
          <div class="tab-content pt-3" id="custom-tabs-two-per">
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-two-tabContent">
                <div class="tab-pane fade active show" id="custom-tabs-two-per" role="tabpanel" aria-labelledby="custom-tabs-two-per-tab">
                  <div class="table-responsive">
                    <div id="tb_permintaan_wrapper" class="dataTables_wrapper no-footer"></div>
                  </div>
                </div>
              </div>
            </div> 
        </div>
   
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>



