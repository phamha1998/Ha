@extends('backend.master.master')
@section('content')
@section('titile','Chỉnh sửa thuộc tính')

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh mục/Thuộc tính/Sửa thuộc tính</li>
			</ol>
		</div>
		<!--/.row-->


		<!--/.row-->
		<div class="row col-md-offset-3 ">
			{{ showErrors($errors,'attr_name') }}
			<div class="col-md-6">
			<div class="panel panel-blue">
				<form method="post">@csrf
				<div class="panel-heading dark-overlay">Sửa thuộc tính</div>
				<div class="panel-body">
					
					<div class="form-group">
					  <label for="">Tên Thuộc tính</label>
					  <input type="text" name="attr_name" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $attr->name }}">

					</div>
					<div  align="right"><button class="btn btn-success" type="submit">Sửa</button></div>
				    
				</div>
			</form>
			</div>




			</div>
			<!--/.col-->
		</div>
		<!--/.row-->
	</div>
	<!--/.main-->

	@endsection
