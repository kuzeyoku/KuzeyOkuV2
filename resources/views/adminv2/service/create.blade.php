@extends(themeView('admin', 'layout.create'), ['tab' => true])
@section('form')
    {!! Form::file('image', [
        'class' => 'dropify-image',
        'accept' => '.png, .jpg, .jpeg, .gif',
        'data-allowed-file-extensions' => 'png jpg jpeg gif',
    ]) !!}
    {!! Form::file('document', [
        'class' => 'dropify-document',
        'accept' => '.pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx',
        'data-allowed-file-extensions' => 'pdf doc docx xls xlsx ppt pptx',
    ]) !!}
    @foreach (LanguageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {{ Form::label("title[$lang->code]", __("admin/{$folder}.form_title")) }} <span class="manitory">*</span>
            {{ Form::text("title[$lang->code]", null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_title_placeholder"),
            ]) }}
            {{ Form::label('description', __("admin/{$folder}.form_description")) }}
            {{ Form::textarea("description[$lang->code]", null, ['class' => 'editor']) }}
        </div>
    @endforeach
    <div class="row">
        <div class="col-lg-4">
            {{ Form::label('category_id', __("admin/{$folder}.form_category")) }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
        </div>
        <div class="col-lg-4">
            {{ Form::label('order', __('admin/general.order')) }} <span class="manitory">*</span>
            {{ Form::number('order', 0, [
                'class' => 'form-control',
                'placeholder' => __('admin/general.order_placeholder'),
            ]) }}
        </div>
        <div class="col-lg-4">
            {{ Form::label('status_', __('admin/general.status')) }} <span class="manitory">*</span>
            {{ Form::select('status', statusList(), 'default', ['class' => 'form-control']) }}
        </div>
    </div>
@endsection
