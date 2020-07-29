@extends("layout")
@section("content")
    <section class="section-password-reset">
        <div class="container">
            <div class="row fs-0 padding-top-30 padding-bottom-200 padding-bottom-xs-100">
                <div class="col-xs-12">
                    <h1 class="lato-regular fs-55 fs-xs-30 fs-sm-40 padding-top-30 padding-top-xs-0 padding-bottom-10 text-center">Password recover</h1>
                </div>
                <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4">
                    @if(session('success-response'))
                        <div class="alert alert-success fs-18 margin-top-25">{!! session('success-response') !!}</div>
                    @elseif(session('error-response'))
                        <div class="alert alert-danger fs-18 margin-top-25">{!! session('error-response') !!}</div>
                    @else
                        <form action="{{route('submit-dentacare-password-reset', ['token' => $token])}}" method="POST" id="dentacare-password-reset-form">
                            <div class="padding-bottom-20 field-parent">
                                <div class="custom-google-label-style module" data-input-colorful-border="true">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" id="password" maxlength="20" class="full-rounded form-field"/>
                                </div>
                            </div>
                            <div class="padding-bottom-20 field-parent">
                                <div class="custom-google-label-style module" data-input-colorful-border="true">
                                    <label for="repeat-password">Repeat password:</label>
                                    <input type="password" name="repeat-password" id="repeat-password" maxlength="20" class="full-rounded form-field"/>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" value="SAVE PASSWORD" class="white-light-blue-btn"/>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection