@extends('templates.layout')
@section('content')
    <h2>{{ $title }}</h2>
    <a href="{{route('add-customer')}}">Thêm khách hàng</a>
    {{-- action bắt theo tên của route --}}
    <form action="{{route('search-customer')}}" method="POST">
        @csrf
        <input type="text" name="searchCustomer">
        <input type="submit" value="Search" name="btnSend">
    </form>


    <table class="table table-striped table-hover">
        <th>ID</th>
        <th>Name</th>
        <th>Ngày sinh</th>
        <th>Giới tính</th>
        <th>Hình ảnh</th>
        @foreach($listCustomer as $customers)
            <tr>
                <td>{{$customers->id}}</td>
                <td>{{$customers->name}}</td>
                <td>{{$customers->birthday}}</td>
                <td>{{$customers->gender == 1? 'Nam': 'Nữ' }}</td>
                <td><img src="{{$customers->hinh? Storage::url($customers->hinh):''}}" style="width: 100px; height: 100px"></td>
                <td><a href="{{route('edit-customer',  ['id'=>$customers->id])}}">Sửa</a></td>
                <td><a href="{{route('delete-customer',  ['id'=>$customers->id])}}">Xóa</a></td>
            </tr>
        @endforeach

    </table>
@endsection
