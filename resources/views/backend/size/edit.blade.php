@extends('backend.master')
@section('content')
<div class="box-content">
						<form method="POST" action="{{route('size.update',$size->id)}}" class="form-horizontal" >
                            @csrf
                            @method('put')
							<div class="control-group">
							  <label class="control-label" for="typeahead">Name</label>
							  <div class="controls">
								<input type="text" name="size" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" value="{{$size->name}}">
							  </div>
							</div>
							    
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						</form>   
                        <br>
                        <br>
                        <br><br>
                        <br>
                        <br>
                   
@endsection