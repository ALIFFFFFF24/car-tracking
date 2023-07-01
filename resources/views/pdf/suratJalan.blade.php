<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Surat Jalan</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .container {
      margin: 20px auto;
      max-width: 1000px;
      padding: 20px;
      border: 1px solid #ccc;
    }
    h1 {
      text-align: center;
    }
    .sender-info, .receiver-info {
      margin-bottom: 10px;
    }
    .label {
      font-weight: bold;
    }
    .footer {
      margin-top: 20px;
      text-align: right;
      font-style: italic;
    }
  </style>
</head>
<body>
  <div class="container">

    <div class="sender-info">
      <span class="label">PT. ABC</span>
      <address>
        RUKO SENTOSA INDAH<br>
        Blok A/23 Jl.Jend Sudirman<br>
        Telp : (081) 454 45312<br>
        SURABAYA
      </address>
    </div>
    <h1>Surat Jalan</h1>
    <p>No : </p>
    <p>Harap diterima dengan baik barang - barang tersebut di bawah ini :</p>
    <table border=1 style="width: 100%;">
      <thead>
        <tr>
          <th>ID Surat Jalan</th>
          <th>Kondisi Barang</th>
          <th>Berat Barang</th>
          <th>Jenis Barang</th>
          <th>Jumlah Barang</th>
          <th>Tujuan</th>
        </tr>
      </thead>
      <tbody>
            <tr>
            <td>{{$deliveries->id}}</td>
            <td>{{$deliveries->kondisi}}</td>
            <td>{{$deliveries->berat_barang}}</td>
            <td>{{$deliveries->jenis_barang}}</td>
            <td>{{$deliveries->jml_barang}}</td>
            <td>{{$deliveries->tujuan}}</td>
            </tr>
      </tbody>
    </table>
    <div class="footer">
      <p>Surabaya,{{$deliveries->tgl}}<p>
      <p>Tanda Tangan:</p>
      <br>
      <br>
      <p>(___________________)</p>
    </div>
  </div>
</body>
</html>