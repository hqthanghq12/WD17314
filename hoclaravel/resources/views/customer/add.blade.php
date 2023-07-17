@extends('templates.layout')
@section('content')
    <h1>{{$title}}</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="Name" name="name" ><br>
        <input type="text" placeholder="Address" name="address" ><br>
        <input type="text" placeholder="Email" name="email" ><br>
        <input type="text" placeholder="Phone Number" name="phone_number" ><br>
        <input type="date" name="date_of_birth" ><br>
        <input type="radio" name="gender" value="1" checked>
        <label for="">Nam</label>
        <input type="radio" name="gender" value="0">
        <label for="">Nữ</label><br>
        <div class="form-group">
            <label class="col-md-3 col-sm-4 control-label">Ảnh</label>
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-xs-6">
                        <img id="anh_the_preview" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                             style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                        <input type="file" name="image" accept="image/*"
                               class="form-control-file @error('image') is-invalid @enderror" id="cmt_anh">
                        <label for="cmt_truoc">Ảnh thẻ</label><br/>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit">Add new</button>
    </form>
@endsection
