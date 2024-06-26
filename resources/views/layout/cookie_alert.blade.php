@if (settings('information.cookie_notification_status', App\Enums\StatusEnum::Passive->value) ==
        App\Enums\StatusEnum::Active->value)
    <div class="cookie" id="cookie-notification" style="display:none">
        <img src="{{ themeAsset('front', 'images/cookie.svg') }}" alt="cookie">
        <div class="title">
            {{ __('front/cookie.txt1') }}
        </div>
        <div class="description">
            {!! __('front/cookie.txt2', [
                'url' => $cookiePolicyPageLink,
            ]) !!}
        </div>
        <button class="cookie-btn" id="cookie-accept">{{ __('front/cookie.txt3') }}</button>
    </div>
    @push('script')
        <script src="{{ themeAsset('front', 'js/jquery.cookie.js') }}"></script>
        <script>
            $(document).ready(function() {
                if ($.cookie("cookie_notification") === undefined) {
                    $("#cookie-notification").show("slow");
                }
            });

            $(document).on("click", "#cookie-accept", function() {
                $.cookie("cookie_notification", "accepted", {
                    expires: 1,
                    path: "/"
                });
                $("#cookie-notification").hide("slow");
            });
        </script>
    @endpush
@endif
