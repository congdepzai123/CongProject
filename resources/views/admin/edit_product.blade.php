@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Update  product
                        </header>
                        <div class="panel-body">
                        <?php 
                        $message =  Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                        ?>
                            <div class="position-center">
                            @foreach($edit_product as $key => $pro)
                                <form role="form" action= "{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                                {{ @csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value= "{{$pro->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sản phẩm đã bán sản phẩm</label>
                                    <input type="text"  name="product_sold" class="form-control" id="exampleInputEmail1" value= "{{$pro->product_sold}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                    <input type="text"  name="product_quantity" class="form-control" id="exampleInputEmail1" value= "{{$pro->product_quantity}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Từ khóa danh mục</label>
                                    <input type="text" name="meta_keywords" class="form-control" id="exampleInputEmail1" value= "{{$pro->meta_keywords}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value= "{{$pro->product_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" >
                                    <image  src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" hieght="100" width="100"> 
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style ="resize:none" rows="5" class="form-control" name="product_desc"id="ckeditor3"  >{{$pro->product_desc}}</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style ="resize:none" rows="8" class="form-control" name="product_content"id="ckeditor4"  >{{$pro->product_content}}</textarea>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key => $cate)
                                    @if($cate->category_id==$pro->category_id)
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @else 
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endif
                                @endforeach
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu</label>
                                <select name="product_brand" class="form-control input-sm m-bot15">
                                @foreach($brand_product as $key => $brand)
                                @if($cate->category_id==$pro->category_id)
                                    <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                 @else 
                                 <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                 @endif
                                @endforeach
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                   
                                </select>
                                </div>
                                
                                <button type="submit" name='add_product' class="btn btn-info">Cập nhật sản phẩm</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>
            </div>
@endsection