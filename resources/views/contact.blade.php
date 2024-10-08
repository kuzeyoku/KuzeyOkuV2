@extends('layout.main')
@section('title', __('front/contact.txt1'))
@section('content')
    @include('layout.breadcrumb')
    <section class="contact-details">
        <div class="container ">
            <div class="row">
                <div class="col-xl-5 col-lg-6 mb-md-60">
                    <div class="contact-details__right">
                        <div class="sec-title">
                            <span class="sub-title">@lang('front/contact.txt2')</span>
                            <h2>@lang('front/contact.txt3')</h2>
                            <div class="text">@lang('front/contact.txt4')</div>
                        </div>
                        <ul class="list-unstyled contact-details__info">
                            <li>
                                <div class="icon">
                                    @svg('fas-phone', 'text-white')
                                </div>
                                <div class="text">
                                    <h6>@lang('front/contact.txt5')</h6>
                                    <a href="tel:{{ config('contact.phone') }}">{{ config('contact.phone') }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    @svg('far-envelope', 'text-white')
                                </div>
                                <div class="text">
                                    <h6>@lang('front/contact.txt6')</h6>
                                    <a href="mailto:{{ config('contact.email') }}"><span
                                            class="__cf_email__">{{ config('contact.email') }}</span></a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    @svg('fas-map-marked-alt', 'text-white')
                                </div>
                                <div class="text">
                                    <h6>@lang('front/contact.txt7')</h6>
                                    <span>{{ config('contact.address') }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <iframe src="{{ config('contact.map') }}" width="100%" height="550" frameborder="0"
                        allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="team-contact-form">
        <div class="container pb-100">
            <div class="sec-title text-center">
                <span class="sub-title">@lang('front/contact.txt8')</span>
                <h2 class="section-title__title">@lang('front/contact.txt9')</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    {{ html()->form()->route('contact.send')->id('contact-form')->open() }}
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                {{ html()->text('name')->placeholder(__('front/contact.txt10'))->class('form-control') }}
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                {{ html()->email('email')->placeholder(__('front/contact.txt11'))->class('form-control') }}
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                {{ html()->text('phone')->placeholder(__('front/contact.txt12'))->class('form-control') }}
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                {{ html()->text('subject')->placeholder(__('front/contact.txt13'))->class('form-control') }}
                                @if ($errors->has('subject'))
                                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        {{ html()->textarea('message')->placeholder(__('front/contact.txt14'))->class('form-control') }}
                        @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        @endif
                    </div>
                    <button class="theme-btn btn-style-one g-recaptcha"
                        data-sitekey="{{ config('integration.recaptcha_site_key') }}" data-callback='onSubmit'
                        data-action='submit'>
                        <span class="btn-title">@lang('front/contact.txt15')</span>
                    </button>
                    <button type="reset" class="theme-btn btn-style-one"><span
                            class="btn-title">@lang('front/contact.txt16')</span></button>
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </section>
@endsection
@include('common.alert')
@if (config('integration.recaptcha_status') == App\Enums\StatusEnum::Active->value)
    @push('script')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            function onSubmit(token) {
                document.getElementById("contact-form").submit();
            }
        </script>
    @endpush
@endif
