@extends(themeView('admin', 'layout.create'), ['tab' => true])
@section('form')
    {{ html()->file('image')->attribute('data-allowed-file-extensions', 'png jpg jpeg gif')->accept('.png, .jpg, .jpeg, .gif')->class('dropify-image') }}

    @foreach (languageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {{ Form::label("title[$lang->code]", __("admin/{$folder}.form_title")) }}
            {{ html()->text("title[$lang->code]")->placeholder(__("admin/{$folder}.form_title"))->class('form-control') }}
            {{ Form::label("description[$lang->code]", __("admin/{$folder}.form_description")) }}
            {{ Form::textarea("description[$lang->code]", null, [
                'rows' => 3,
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_description_placeholder"),
            ]) }}
        </div>
    @endforeach
    <div class="row">
        <div class="col-lg-6">
            {{ Form::label('button', __("admin/{$folder}.form_button")) }}
            {{ Form::text('button', null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_button_placeholder"),
            ]) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('video', __("admin/{$folder}.form_video")) }}
            {{ Form::text('video', null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_video_placeholder"),
            ]) }}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            {{ Form::label(__('admin/general.order')) }}
            {{ Form::number('order', 0)->placeholder(__('admin/general.order_placeholder'))->class('form-control') }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('status', __('admin/general.status')) }}
            {{ html()->select('status', statusList())->class('form-control') }}
        </div>
    </div>
@endsection
