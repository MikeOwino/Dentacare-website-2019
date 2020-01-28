@extends("layout")
@section("content")
    @if(is_object($page) && property_exists($page, 'html') && !empty($page->html))
        {{(new \App\Http\Controllers\PagesController())->shortcodeExtractor(html_entity_decode($page->html))}}
    @endif
@endsection
