@extends('backend.master')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="box-content">
						<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                            @csrf
                            <div class="control-group">
                                <label class="control-label" for="typeahead">product code</label>
                                <div class="controls">
                                  <input type="text" name="code" class="span6 typeahead">
                                </div>
                              </div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">product name</label>
							  <div class="controls">
								<input type="text" name="name" class="span6 typeahead">
							  </div>
							</div>

                            <div class="control-group">
                                <label class="control-label" for="typeahead">product price</label>
                                <div class="controls">
                                  <input type="text" name="price" class="span6 typeahead">
                                </div>
                              </div>

                            <div class="control-group hidden-phone">
                                <label class="control-label" for="textarea2">Description</label>
                                <div class="controls">
                                  <textarea class="cleditor" id="textarea2" rows="3" name="description"></textarea>
                                </div>
                              </div>

                              <div class="control-group">
                                <label class="control-label" for="fileInput">Select Category</label>
                                <div class="controls">
                                  
                                  <select name="category" style="margin-left:20px;" id="">
                                      
                                      <option value="">Select Category</option>
                                      @foreach($categories as $category)
                                      <option value="{{$category->id}}">{{$category->name}}</option>
                                      @endforeach
                                  </select>
                                </div>
                              </div>       

                              <div class="control-group">
                                <label class="control-label" for="fileInput">Select Subcategory</label>
                                <div class="controls">
                                  
                                  <select name="subcategory" style="margin-left:20px;" id="">
                                     
                                      <option value="">Select subcategory</option>
                                      @foreach($subcategories as $subcategory)
                                      <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                      @endforeach
                                  </select>
                                </div>
                              </div>       

                              <div class="control-group">
                                <label class="control-label" for="fileInput">Select brand</label>
                                <div class="controls">
                                  
                                  <select name="brand" style="margin-left:20px;" id="">
                                      
                                      <option value="">Select brand</option>
                                      @foreach($brands as $brand)
                                      <option value="{{$brand->id}}">{{$brand->name}}</option>
                                      @endforeach
                                  </select>
                                </div>
                              </div>       

                              <div class="control-group">
                                <label class="control-label" for="fileInput">Select unit</label>
                                <div class="controls">
                                  
                                  <select name="unit" style="margin-left:20px;" id="">
                                     
                                      <option value="">Select unit</option>
                                      @foreach($unities as $unity)
                                      <option value="{{$unity->id}}">{{$unity->name}}</option>
                                      @endforeach
                                  </select>
                                </div>
                              </div>      
                              
                              <div class="control-group">
                                <label class="control-label" for="fileInput">Select size</label>
                                <div class="controls">
                                  
                                  <select name="size" style="margin-left:20px;" id="">
                                      
                                      <option value="">Select size</option>
                                      @foreach($sizes as $size)
                                      <option value="{{$size->id}}">{{$size->size}}</option>
                                      @endforeach
                                  </select>
                                </div>
                              </div>     

                              <div class="control-group">
                                <label class="control-label" for="fileInput">Select color</label>
                                <div class="controls">
                                  
                                  <select name="color" style="margin-left:20px;" id="">
                                     
                                      <option value="">Select color</option>
                                      @foreach($colors as $color)
                                      <option value="{{$color->id}}">{{$color->color}}</option>
                                      @endforeach
                                  </select>
                                </div>
                              </div>  

							<div class="control-group">
							  <label class="control-label" for="fileInput">Upload image</label>
							  <div class="controls">
								<input class="input-file uniform_on"  id="fileInput" type="file" name="file[]" multiple required>
							  </div>
							</div>          
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <a href="{{route('product.index')}}" class="btn">show category</a>
							</div>
						</form>   
                        <br>
                        <br>
                        <br><br>
                        <br>
                        <br>
                   
@endsection