
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
    <style>
         body { font-family: DejaVu Sans, sans-serif; }
    </style>
</head>
<body>



        <h2>Sản phẩm quý khác đã mua </h2>

        <table>
          <tr>
            <th>Tên sản phẩm </th>
            <th>Số lượng</th>
            <th>Giá </th>
            <th>Tổng tiền </th>

          </tr>


          @foreach ($tensp as $key => $item)
          <tr>

            <td>{{ $item[0]->slug }}</td>
            <td>{{ $soluong[$key]->quanty }}</td>
            <td>{{ number_format($item[0]->price_ban)  }} VNĐ</td>
            <td>{{ number_format($item[0]->price_ban*$soluong[$key]->quanty ) }} VNĐ </td>

          </tr>
          @endforeach



        </table>
        <h1>Tổng số tiền quý khách cần thanh toán là : {{$tong}}</h1>


        <p>Địa chỉ liên hệ  :   {{$diachilh[0]->tinhlk->name  }} - {{$diachilh[0]->huyenlk->name  }}-{{$diachilh[0]->xalk->name  }}  </p>
        <p>Họ tên : {{ $diachilh[0]->name  }} - Số điện thoại liên hệ : {{ $diachilh[0]->sdt  }}</p>

        <style>
            table {
              border-collapse: collapse;
            }

            table, td, th {
              border: 1px solid black;
            }
            </style>

</body>
</html>

