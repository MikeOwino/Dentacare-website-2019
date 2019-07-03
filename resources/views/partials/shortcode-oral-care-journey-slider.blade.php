@php($slides = (new \App\Http\Controllers\Admin\OralCareJourneySlidesController())->getAllOralCareJourneySlides())
@if(!empty($slides))
    <div class="oral-care-journey-slider shortcode arrows-type-one">
        @foreach($slides as $slide)
            <div class="single-slide">
                <figure itemscope="" itemtype="http://schema.org/ImageObject">
                    <img src="{{URL::asset('assets/uploads/'. $slide->media->name)}}" alt="{{$slide->media->alt}}"/>
                </figure>
            </div>
        @endforeach
    </div>
@endif