<h1 class="lato-regular fs-55 fs-xs-30 fs-sm-40 padding-top-30 padding-top-xs-0 padding-bottom-20">COLLECT YOUR REWARD</h1>
<h2 class="lato-bold fs-40 fs-xs-24 fs-sm-32 padding-bottom-25">
    <span class="inline-block">You have collected:</span>
    <span class="inline-block display-block-xs">
        <img class="inline-block margin-left-20 margin-right-5" src="{{URL::asset('assets/images/logo.svg') }}" alt="Dentacoin logo" width="35"/>
        <span class="lato-black fs-50 inline-block">{{$earned_dcn}}</span>
    </span>
</h2>
<form id="dentacare-withdraw" @if($earned_dcn <= 0) data-stoppage="true" @endif>
    <div class="padding-bottom-30 field-parent max-width-500">
        <div class="custom-google-label-style module" data-input-colorful-border="true">
            <label for="dentacare-address">Enter your wallet address and withdraw</label>
            <input type="text" name="dentacare-address" id="dentacare-address" maxlength="42" class="full-rounded form-field"/>
        </div>
    </div>
    <div>
        <input type="submit" value="COLLECT" class="white-light-blue-btn"/>
    </div>
</form>