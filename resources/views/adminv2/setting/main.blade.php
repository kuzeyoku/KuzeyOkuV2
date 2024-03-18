@extends(themeView('admin', 'layout.main'))
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>@lang('admin/setting.title')</h4>
                    <h6>@lang('admin/setting.description')</h6>
                </div>
            </div>
        </div>
        {{ Form::open(['url' => route('admin.setting.update'), 'method' => 'PUT']) }}
        {{ Form::hidden('category', request()->category) }}
        <div class="card">
            <div class="card-header">
                <h4>@lang('admin/setting.category_' . request()->category)</h4>
            </div>
            <div class="card-body">
                @yield('setting_form')
            </div>
        </div>
        {{ Form::submit(__('admin/general.save'), ['class' => 'btn btn-submit']) }}
        {{ Form::close() }}
    </div>
@endsection