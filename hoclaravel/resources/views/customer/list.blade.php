@extends('templates.layout')
@section('content')
    <h2>{{ $title }}</h2>

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
        @foreach($listCustomer as $customers)
            <tr>
                <td>{{$customers->id}}</td>
                <td>{{$customers->name}}</td>
                <td>{{$customers->birthday}}</td>
                <td>{{$customers->gender == 1? 'Nam': 'Nữ' }}</td>
            </tr>
        @endforeach

    </table>
@endsection
