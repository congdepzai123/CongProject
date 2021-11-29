@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Updatebrand product
                        </header>
                        <div class="panel-body">
                        <?php 
                        $message =  Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                        ?>
                        @foreach($edit_brand_product as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action= "{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="post">
                                {{ @csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" value="{{$edit_value->brand_name}}" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Từ khóa danh mục</label>
                                    <input type="text" name="brand_product_keywords" class="form-control" id="exampleInputEmail1" placeholder="Từ khóa danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                    <textarea style ="resize:none" rows="8" class="form-control" name="brand_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                
                                
                                <button type="submit" name='add_brand_product' class="btn btn-info">Cập nhật thương hiệu</button>
                            </form>
                            </div>
                        @endforeach
                        </div>
                    </section>
            </div>
@endsection