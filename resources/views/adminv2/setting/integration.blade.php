@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    <div class="row">
        <div class="col-lg-6">
            <div class="card-title-head">
                <h6>@lang('admin/setting.recaptcha')</h6>
            </div>
            {{ html()->label(__('admin/setting.recaptcha_status')) }}
            {{ html()->select(
                'recaptcha_status',
                App\Enums\StatusEnum::getOnOffSelectArray(),
                config('setting.recaptcha.status'),
            )->class('form-control') }}
            {{ html()->label(__('admin/setting.recaptcha_site_key')) }}
            {{ html()->text('recaptcha_site_key', config('setting.recaptcha.site_key'))->placeholder(__('admin/setting.recaptcha_site_key_placeholder'))->class('form-control') }}
            {{ html()->label(__('admin/setting.recaptcha_secret_key')) }}
            {{ html()->text('recaptcha_secret_key', config('setting.recaptcha.secret_key'))->placeholder(__('admin/setting.recaptcha_secret_key_placeholder'))->class('form-control') }}
        </div>
        <div class="col-lg-6">
            <div class="card-title-head">
                <h6>@lang('admin/setting.analytics')</h6>
            </div>
            {{ html()->label(__('admin/setting.google_analytics_status')) }}
            {{ html()->select(
                'analytics_status',
                App\Enums\StatusEnum::getOnOffSelectArray(),
                config('setting.google_analytics.status'),
            )->class('form-control') }}
            {{ html()->label(__('admin/setting.google_analytics_code')) }}
            {{ html()->textarea('code', config('setting.google_analytics.code'))->placeholder(__('admin/setting.google_analytics_code_placeholder'))->class('form-control')->rows(3) }}
        </div>
    </div>
@endsection
