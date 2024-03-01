<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Property</h3>
            </div>
            <!-- Search form -->
            <form action="{{ route('storeproperty') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 form-group pull-right top_search">
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
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add property</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <!-- Dropdown menu for settings -->
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="item form-group">
                                <label for="area" class="col-form-label col-md-3 col-sm-3 label-align">Area<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="area" class="form-control" type="number" name="area" required="required">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="location" class="col-form-label col-md-3 col-sm-3 label-align">Location <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="location" class="form-control" type="text" name="location" required="required">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="bathn" class="col-form-label col-md-3 col-sm-3 label-align">Bath <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="bathn" class="form-control" type="number" name="bathn" required="required">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="bedn" class="col-form-label col-md-3 col-sm-3 label-align">Bed <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="bedn" class="form-control" type="number" name="bedn" required="required">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="price" class="form-control" type="number" name="price" required="required">
                                </div>
                            </div>
                            <div class="item form-group">
    <label class="col-form-label col-md-3 col-sm-3 label-align">Listing Type <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <label>
            <input type="radio" name="listing_type" value="rent" required="required"> For Rent
        </label>
        <label>
            <input type="radio" name="listing_type" value="sell" required="required"> For Sale
        </label>
    </div>
</div>


                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="file" id="image" name="image" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="category_id">Category <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="category_id" id="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button type="submit" class="btn btn-success">Add</button>
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
