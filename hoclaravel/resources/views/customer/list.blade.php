<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>
<h1>{{$title}}</h1>
    {{--action chuyền theo route--}}
    <form action="{{route('search-customer')}}" method="POST">
        @csrf
       <input type="text" name="searchCustomer">
        <input type="submit" value="Search" name="btnSend">
    </form>
    <h1></h1>
    <table border="1">
        <th>ID</th>
        <th>Name</th>
        <th>Ngày sinh</th>
        <th>Giới tính</th>
        @foreach($listCustomer as $customers)
            <tr>
                <td>{{$customers->id}}</td>
                <td>{{$customers->name}}</td>
                <td>{{$customers->birthday}}</td>
                <td>{{$customers->gender == 1? 'Nam': 'Nữ' }}</td>

            </tr>
        @endforeach

    </table>
</body>
</html>
