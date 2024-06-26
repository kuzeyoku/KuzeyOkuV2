@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {{ html()->label(__("admin/{$folder}.contact_phone")) }}
    {{ html()->text('phone', settings('contact.phone'))->placeholder(__("admin/{$folder}.contact_phone_placeholder"))->class('form-control') }}
    {{ html()->label(__("admin/{$folder}.contact_email")) }}
    {{ html()->text('email', settings('contact.email'))->placeholder(__("admin/{$folder}.contact_email_placeholder"))->class('form-control') }}
    {{ html()->label(__("admin/{$folder}.contact_address")) }}
    {{ html()->text('address', settings('contact.address'))->placeholder(__("admin/{$folder}.contact_address_placeholder"))->class('form-control') }}
    {{ html()->label(__("admin/{$folder}.contact_map")) }}
    {{ html()->text('map', settings('contact.map'))->placeholder(__("admin/{$folder}.contact_map_placeholder"))->class('form-control') }}
@endsection
