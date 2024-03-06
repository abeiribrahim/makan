<!-- Search Start -->
<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
    <form action="{{ route('searchresult') }}" method="GET">
            <div class="row g-2">
                <div class="col-md-4">
                    <input type="text" class="form-control border-0 py-3" name="keyword" placeholder="Search Keyword">
                </div>
                <div class="col-md-4">
                    <select class="form-select border-0 py-3" name="category_id">
                        <option value="" selected>Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-select border-0 py-3" name="location">
                        <option value="" selected>Location</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark border-0 w-100 py-3">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Search End -->
