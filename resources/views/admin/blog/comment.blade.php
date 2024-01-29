@extends('admin.layout.main')
@section('pageTitle', __("admin/{$folder}.list"))
@section('content')
    <div class="table-responsive">
        <table class="table table-nowrap table-bordered table-center mb-0">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>{{ __("admin/{$folder}.table_title") }}</th>
                    <th>{{ __("admin/{$folder}.table_category") }}</th>
                    <th>{{ __('admin/general.table_created_at') }}</th>
                    <th>{{ __('admin/general.table_updated_at') }}</th>
                    <th>{{ __('admin/general.table_status') }}</th>
                    <th>{{ __('admin/general.table_action') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)

                @empty
                    <tr>
                        <td colspan="6" class="text-center">{{ __('admin/general.table_no_data') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $items->render('pagination::bootstrap-5') }}
@endsection
