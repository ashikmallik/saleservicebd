
@extends('backend.master')

@section('content')
<div class="box-content">
						<form action="{{route('size.store')}}" method="post" class="form-horizontal" >
                            @csrf
							<div class="control-group">
							  <label class="control-label" for="typeahead">size</label>
							  <div class="controls">
								<input type="text" name="size" class="span6 typeahead" id="input" data-role="tagsinput">
							  </div>
							</div>
							        
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <a href="{{route('size.index')}}" class="btn">show category</a>
							</div>
						</form>   
                        <br>
                        <br>
                        <br><br>
                        <br>
                        <br>
                   
@endsection