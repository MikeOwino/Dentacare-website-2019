@php($testimonials = (new \App\Http\Controllers\Admin\UserExpressionsController())->getAllTestimonials())
@if(!empty($testimonials))
    <section class="shortcode-testimonials shortcode padding-bottom-100 padding-top-250 padding-top-xs-200">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <div class="testimonials-slider arrows-type-one color-white">
                        @foreach($testimonials as $testimonial)
                            <div class="single-slide text-center">
                                <i class="fa fa-quote-left fs-30" aria-hidden="true"></i>
                                <div class="fs-32 fs-xs-20 line-height-40 line-height-xs-30 padding-top-20 testimonial-text">{!! $testimonial->text !!}</div>
                                <div class="stars padding-top-20 padding-bottom-20">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <h4 class="fs-26 lato-bold">{{$testimonial->title}}</h4>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif