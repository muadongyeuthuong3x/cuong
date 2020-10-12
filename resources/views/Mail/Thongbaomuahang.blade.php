<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body>

     <h1>Đơn hàng mua của quý khách là </h1>
     <style>
        table {
          border-collapse: collapse;
        }

        table, td, th {
          border: 1px solid black;
        }
        </style>

     <table>
        <tr>
          <td>id</td>
          <th>Name</th>
          <th>Số lượng</th>
          <th>Giá</th>
          <th>Tông tiền</th>


        </tr>
     @foreach ($data as $item)


        <tr>
            <td>{{ $item['id']  }}</td>
            <td>{{ $item->lkspss['tensp'] }}</td>
            <td>{{ $item['quanty'] }}</td>
            <td>{{ $item->lkspss['price_ban']}}</td>
            <td>{{ number_format($item['quanty']*$item->lkspss['price_ban']) }} VNĐ</td>




        </tr>


     @endforeach
     {{-- <td> Tổng tiền : {{ number_format($item['quanty']*$item['price'] ) }}VNĐ </td> --}}
    </table>


</body>
</html>
