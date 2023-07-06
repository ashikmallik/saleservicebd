@extends('backend.master')
@section('content')
<div class="box-content">
						<form action="{{route('category.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                            @csrf
							<div class="control-group">
							  <label class="control-label" for="typeahead">name</label>
							  <div class="controls">
								<input type="text" name="name" class="span6 typeahead">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Upload image</label>
							  <div class="controls">
								<input class="input-file uniform_on"  id="fileInput" type="file" name="image">
							  </div>
							</div>          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="description"></textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <a href="{{route('category.index')}}" class="btn">show category</a>
							</div>
						</form>   
                        <br>
                        <br>
                        <br><br>
                        <br>
                        <br>
                   
@endsection