@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    {{ __('admin/setting.sitemap_view') }}<a target="_blank"
        href="{{ url(route('sitemap.index')) }}">{{ url(route('sitemap.index')) }}</a>
    <hr>
    @foreach ($service->getSitemapModuleList() as $module)
        {!! Form::label(__("admin/{$folder}.sitemap_{$module}")) !!}
        <div class="row">
            <div class="col-lg-9">
                {!! Form::range($module . '_priority', config('setting.sitemap.' . $module . '_priority'), [
                    'class' => 'form-control',
                    'min' => 0,
                    'max' => 1,
                    'step' => 0.1,
                ]) !!}
            </div>
            <div class="col-lg-3">
                {!! Form::select(
                    $module . '_changefreq',
                    $service->getChangeFreqList(),
                    config('setting.sitemap.' . $module . '_changefreq'),
                    ['class' => 'form-control sitemap-changefreq'],
                ) !!}
            </div>
        </div>
    @endforeach
@endsection