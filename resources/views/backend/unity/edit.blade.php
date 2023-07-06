@extends('backend.master')
@section('content')
<div class="box-content">
						<form method="POST" action="{{route('unity.update',$unity->id)}}" class="form-horizontal" >
                            @csrf
                            @method('put')
							<div class="control-group">
							  <label class="control-label" for="typeahead">Name</label>
							  <div class="controls">
								<input type="text" name="name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" value="{{$unity->name}}">
							  </div>
							</div>
							        
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="description">{{$unity->description}}</textarea>
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