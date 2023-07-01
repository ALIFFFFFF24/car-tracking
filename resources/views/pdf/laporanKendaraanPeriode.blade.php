<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        table, th, td {
          border:1px solid black;
        }

        h1, h2 {
            text-align: center;
        }
        </style>
</head>
  <body>
    <h1>{{$title}}</h1>
    <h2>{{$date1}} / {{$date2}}</h2>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Vehicles Id</th>
            <th>Vehicle Registration Number</th>
            <th>Delivery Status</th>
        </tr>
        @php $i=1; @endphp
        @foreach ($vehicles as $vehicle)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$vehicle->tgl}}</td>
                <td>{{$vehicle->nama_sopir}}</td>
                <td>{{$vehicle->nopol}}</td>
                <td>{{$vehicle->sts}}</td>
            </tr>
        @endforeach
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>

