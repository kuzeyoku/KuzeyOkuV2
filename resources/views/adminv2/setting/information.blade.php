@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {{ html()->label(__('admin/setting.information_cookie_notification_status')) }}
    {{ html()->select(
        'cookie_notification_status',
        App\Enums\StatusEnum::getOnOffSelectArray(),
        config('setting.information.cookie_notification_status'),
    )->class('form-control') }}
    @php
        $formElementList = [
            'cookie_policy_page',
            'user_agreement_page',
            'privacy_agreement_page',
            'kvkk_page',
            'about_page',
            'faq_page',
        ];
    @endphp
    @foreach ($formElementList as $element)
        {{ html()->label(__('admin/setting.information_' . $element)) }}
        {{ html()->select($element, App\Models\Page::toSelectArray(), config('setting.information.' . $element))->placeholder(__('admin/general.select'))->class('form-control') }}
    @endforeach
@endsection
