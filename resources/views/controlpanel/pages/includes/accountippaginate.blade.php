@extends('controlpanel.pages.accountiplog')

@section('acountIpPaginate')
<table class="tbl_col_type">
    <colgroup>
        <col style="width: 25%;" />
        <col style="width: 20%;" />
        <col style="width: 20%;" />
        <col style="width: 20%;" />
    </colgroup>
    <thead>
        <tr>
            <th scope="col">{{__('messages.date')}}</th>
            <th scope="col">IP</th>
            <th scope="col">{{__('messages.regionaccess')}}</th>
            <th scope="col">Latitude</th>
            <th scope="col">Longitude</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items['data'] as $item)
            <tr>
                <td class="logging_date logging_success">
                    {{date('d/m/Y H:i:s', strtotime($item['created_at']))}}
                    <span class="logging_msg">
                        {{__('messages.loginsuccess')}}
                    </span>
                </td>
                <td>
                    {{$item['ip']}}
                </td>
                <td>
                    {{$item['cityName']}} - {{$item['regionCode']}}, {{$item['countryName']}}
                </td>
                <td>
                    {{$item['latitude']}}
                </td>
                <td>
                    {{$item['longitude']}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

@push('scripts')

@endpush
