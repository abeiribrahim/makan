<!-- page content -->
<form action="{{ route('updateproperty', $properties->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage properties</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Property</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a class="dropdown-item" href="#">Settings 1</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="bathn">Bathrooms <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="bathn" name="bathn" value="{{ $properties->bathn }}" required="required" class="form-control ">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="bedn">Bedrooms<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea id="bedn" name="bedn" required="required" class="form-control">{{ $properties->bedn }}</textarea>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="area" class="col-form-label col-md-3 col-sm-3 label-align">Area <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="area" class="form-control" type="number" name="area" value="{{ $properties->area }}"  required="required"> Sqf
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="location" class="col-form-label col-md-3 col-sm-3 label-align">Location <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="location" class="form-control" type="text" name="location" value="{{ $properties->location }}"  required="required">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="price" class="form-control" type="number" name="price" value="{{ $properties->price }}" required="required">USD
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="published" {{ $properties->published == 1 ? 'checked' : '' }} value="1" class="flat">
                                        </label>
                                    </div>
                                </div>
                                <div class="item form-group">
    <label for="rent">Rent:</label>
    <input type="radio" id="rent_yes" name="rent" value="1" {{ old('rent', $properties->rent) == '1' ? 'checked' : '' }}>
    <label for="rent_yes">Yes</label>
    <input type="radio" id="rent_no" name="rent" value="0" {{ old('rent', $properties->rent) == '0' ? 'checked' : '' }}>
    <label for="rent_no">No</label>
</div>
<div class="item form-group">
    <label for="sell">Sell:</label>
    <input type="radio" id="sell_yes" name="sell" value="1" {{ old('sell', $properties->sell) == '1' ? 'checked' : '' }}>
    <label for="sell_yes">Yes</label>
    <input type="radio" id="sell_no" name="sell" value="0" {{ old('sell', $properties->sell) == '0' ? 'checked' : '' }}>
    <label for="sell_no">No</label>
</div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" class="form-control" id="image" placeholder="Enter image" name="image">
                                        <img src="{{ asset('adminassets/images/' . $properties->image) }}">
                                        <input type="hidden" name="oldImage" value="{{ $properties->image }}">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Property Type <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" name="category_id" id="">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $properties->category_id ? 'selected' : '' }}>{{ $category->cat_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
</form>
