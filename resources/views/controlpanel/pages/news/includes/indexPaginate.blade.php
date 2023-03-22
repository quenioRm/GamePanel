@extends('controlpanel.pages.news.index')

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
            <th scope="col">Categoria</th>
            <th scope="col">Nome</th>
            <th scope="col">Idioma</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items['data'] as $item)
            <tr>
                @switch($item['category'])
                    @case('announce')
                    <td>
                        Anúncio
                    </td>
                        @break
                    @case('event')
                    <td>
                        Evento
                    </td>
                        @break
                    @case('maintenance')
                        <td>
                            Manutenção
                        </td>
                        @break
                    @case('update')
                    <td>
                        Atualização
                    </td>
                        @break

                    @default

                @endswitch

                <td>
                    {{$item['name']}}
                </td>
                <td>
                    {{$item['language']}}
                </td>
                <td>
                    <a href="{{route('gamepanel.controlpanel.news.edit', $item['id'])}}">Editar</a> /
                    <a href="{{route('gamepanel.controlpanel.news.delete', $item['id'])}}">Deletar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

@push('scripts')

@endpush
