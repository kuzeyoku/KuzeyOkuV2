@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {{ html()->label(__("admin/{$folder}.general_title")) }}
    {{ html()->text('title', settings('general.title'))->placeholder(__("admin/{$folder}.general_title_placeholder"))->class('form-control') }}
    {{ html()->label(__("admin/{$folder}.general_description")) }}
    {{ html()->textarea('description', settings('general.description'))->placeholder(__("admin/{$folder}.general_description_placeholder"))->class('form-control') }}
    {{ html()->label(__("admin/{$folder}.general_keywords")) }}
    {{ html()->text('keywords', settings('general.keywords'))->placeholder(__("admin/{$folder}.general_keywords_placeholder"))->class('form-control') }}
@endsection
