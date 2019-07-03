@extends("layout")
@section("content")
    {{(new \App\Http\Controllers\PagesController())->shortcodeExtractor(html_entity_decode($page->html))}}
@endsection
