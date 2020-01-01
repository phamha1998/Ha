@extends('backend.master.master')
@section('content')
@section('titile','Chỉnh sửa sản phẩm')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @if (session('thongbao'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('thongbao') }}</strong>
        </div>
            
        @endif
        <form  method="post" enctype="multipart/form-data">@csrf
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">Sửa sản phẩm {{ $product->name }} ({{ $product->product_code }})</div>
                        <div class="panel-body">
                            
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-xs-8">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Danh mục</label>
                                                <select name="category" class="form-control">
                                                    {{ getCategory($category,0,"",$product->id) }}
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Mã sản phẩm</label>
                                                <input  type="text" name="product_code" class="form-control"
                                                    value="{{ $product->product_code }}">
                                                    {{ showErrors($errors,'product_code') }}
                                            </div>
                                            <div class="form-group">
                                                <label>Tên sản phẩm</label>
                                                <input  type="text" name="product_name" class="form-control"
                                                    value="{{ $product->name }}">
                                                    {{ showErrors($errors,'product_name') }}
                                            </div>
                                            <div class="form-group">
                                                <label>Giá sản phẩm (Giá chung)</label> <a href="/admin/product/edit-variant/{{ $product->id }}"><span
                                                        class="glyphicon glyphicon-chevron-right"></span>
                                                    Giá theo biến thể</a>
                                                <input  type="number" name="product_price" class="form-control"
                                                    value="{{ $product->price }}">
                                                    {{ showErrors($errors,'product_price') }}
                                            </div>
                                            <div class="form-group">
                                                <label>Sản phẩm có nổi bật</label>
                                                <select name="featured" class="form-control">
                                                    <option @if($product->featured==0)selected @endif value="0">Không</option>
                                                    <option @if($product->featured==1)selected @endif value="1">Có</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Trạng thái</label>
                                                <select  name="product_state" class="form-control">
                                                    <option @if($product->state==1)selected @endif value="1">Còn hàng</option>
                                                    <option @if($product->state==0)selected @endif value="0">Hết hàng</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Ảnh sản phẩm</label>
                                                <input id="img" type="file" name="product_img" class="form-control hidden"
                                                    onchange="changeImg(this)">
                                                <img id="avatar" class="thumbnail" width="100%" height="350px" src="/backend/img/{{ $product->img }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Thông tin</label>
                                        <textarea  name="info" style="width: 100%;height: 100px;">{{ $product->info }}</textarea>
                                    </div>


            </div>
            <div class="col-xs-4">

                <div class="panel panel-default">
                    
                    <div class="panel-body tabs">
                       
                               
                                {{ showErrors($errors,'attr_name') }}
                                {{ showErrors($errors,'value_name') }}
                        <ul class="nav nav-tabs">
                            
                            @php
                                $i=0;
                            @endphp
                            @foreach ($attrs as $attr)
                            <li @if($i==0) class='active' @endif><a href="#tab{{ $attr->id }}" data-toggle="tab">{{ $attr->name }}</a></li>
                                @php
                                    $i=1;
                                @endphp
                            @endforeach
                            
                        </ul>
                        <div class="tab-content">
                            @foreach ($attrs as $attr)
                            <div   class="tab-pane fade @if($i==1) active @endif in" id="tab{{ $attr->id }}">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            @foreach ($attr->values as $item)
                                            <th>{{  $item->value }}</th>
                                            @endforeach
                                           
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($attr->values as $item)
                                            <td> <input @if(check_value($product,$item->id)) checked @endif class="form-check-input" type="checkbox" name="attr[{{ $attr->id }}][]"
                                                value="{{ $item->id }}"> </td>
                                            @endforeach
                                          
                                           

                                        </tr>
                                    </tbody>
                                </table>
                               
                                
                            </div>
                            @php
                            $i=2;
                            @endphp

                            @endforeach
   
                        </div>
                    </div>
                </div>
                <div class="form-group">

                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <p></p>

                        </label>
                    </div>
                </div>

            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Miêu tả</label>
                            <textarea id="editor"  name="description" style="width: 100%;height: 100px;">{{ $product->describe }}</textarea>

                        </div>


                        <button class="btn btn-success" name="add-product" type="submit">Sửa sản phẩm</button>
                        <button class="btn btn-danger" type="reset">Huỷ bỏ</button>

                    </div>

                </div>
            </div>

        </div>

        <div class="clearfix"></div>
    </form>
    </div>
    </div>
    </div>
    </div>

    <!--/.row-->

    </div>
    <!--end main-->
    @endsection
    @section('script')
    @parent

@endsection
