<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Property Types</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{asset('assets/img/icon-luxury.png')}}" alt="Icon">
                        </div>
                        <h6>{{ $category->cat_name }}</h6>
                        <span>Number of Properties: {{ $category->properties_count }} Properties</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Category End -->
