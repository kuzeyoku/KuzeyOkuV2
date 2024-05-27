@extends(themeView('admin', 'layout.list'))
@section('table')
    <table class="table">
        <thead>
            <tr>
                <th>#ID</th>
                <th>@lang("admin/{$folder}.table_title")</th>
                <th>@lang("admin/{$folder}.table_category")</th>
                <th>@lang('admin/general.table_created_at')</th>
                <th>@lang('admin/general.table_updated_at')</th>
                <th>@lang('admin/general.table_status')</th>
                <th style="width:200px">@lang('admin/general.table_action')</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->titles[config('app.fallback_locale')] }}</td>
                    <td>{{ $item->category->title ?? __('admin/general.uncategorized') }}</td>
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                    <td>{{ $item->updated_at->diffForHumans() }}</td>
                    <td>{!! $item->status_view !!}</td>
                    @include(themeView('admin', 'layout.action'), [
                        'show' => '',
                        'comment' => '',
                        'edit' => '',
                        'delete' => '',
                    ])
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">@lang('admin/general.table_no_data')</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $items->links("pagination::bootstrap-4") }}
@endsection
