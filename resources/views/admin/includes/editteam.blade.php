<!-- page facebook_url -->
<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Manage Teams</h3>
						</div>
						<form action="{{route('admin.updateteam',$teams->id)}}" method="post" enctype="multipart/form-data">
                         @csrf
                         @method('put')
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
									<h2>Edit team</h2>
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
								<div class="x_facebook_url">
									<br />
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="fname" > Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="fname" name="fname" required="required" value="{{$teams->fname}}" class="form-control ">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="designation" > designation <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="designation" required="required" name="designation" value="{{$teams->designation}}" class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="facebook_url">facebook<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="facebook_url" name="facebook_url" required="required" value="{{$teams->facebook_url}}" class="form-control">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="facebook_url">Instagram <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="instagram_url" name="instagram_url" required="required" value="{{$teams->instagram_url}}" class="form-control">
											</div>
										</div>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="twitter_url">twitter <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="twitter_url" name="twitter_url" required="required" value="{{$teams->twitter_url}}" class="form-control">
											</div>
										</div>
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Published</label>
											<div class="checkbox">
												<label>
													<input type="checkbox" name="published" class="flat">
												</label>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" id="image" name="image"  class="form-control">
												<image src="{{asset('adminassets/images/'.$teams->image)}}">
												<input type="hidden" name="oldImage" value="{{$teams->image}}">
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
			<!-- /page facebook_url -->