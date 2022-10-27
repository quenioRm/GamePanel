@extends('controlpanel.layout.main')

@section('title', __('messages.controlPanelAccountInfo'))

@section('controlPalnel')
<article class="content logging">
    <h2 class="line">Histórico de Login</h2>
    <div class="search_date_wrap">
            <div class="search_title">
                <h3>Histórico de Login</h3>
                <ul class="bullet_list fs15">
                    <li>Apenas os últimos 3.000 registros realizados dentro de 6 meses podem ser verificados.</li>
                    <li>Em caso de acesso suspeito, altere a senha e adicione autenticação em de duas etapas.</li>
                </ul>
                <div class="logging_page_links">
                    <a href="https://account.pearlabyss.com/pt-BR/Account/Password?_returnUrl=https%3a%2f%2faccount.pearlabyss.com%2fpt-BR%2fAccount%2fMyInfo%2fLogging" class="btn_text text_blue">Trocar Senha</a>
                    <a href="https://account.pearlabyss.com/pt-BR/Account/Otp" class="btn_text text_blue">Adicionar Autenticação em Duas Etapas</a>
                </div>
                <ul class="bullet_list fs15"></ul>
            </div>
            <div id="divLoggingListArea">
                <div class="mylog_history_result search_result">
                    @yield('acountIpPaginate')
                </div>
                <div class="paging">
                    <div class="js-pagination inline">
                        <div class="common_paging js-paging">
                            @foreach ($items['links'] as $link)
                                @if ($link['label'] == "&laquo; Anterior")
                                    @if ($items['current_page'] > 1)
                                        <a href="{{$items['first_page_url']}}" class="link_item box pi_wrap">
                                            <i class="pi pi_arrowPrev left"></i>
                                            <span class="blind">Prev</span>
                                        </a>
                                    @endif
                                @elseif($link['label'] == "Próximo &raquo;")
                                    <a href="{{$items['last_page_url']}}" class="link_item box pi_wrap">
                                        <i class="pi pi_arrowNext right"></i>
                                        <span class="blind">Next</span>
                                    </a>
                                @else
                                    {{-- <button type="button"  data-page="{{$link['label']}}">{{$link['label']}}</button>     --}}
                                    <a class="link_item {{($items['current_page'] == $link['label'] ? 'active' : '')}}" 
                                    href="{{$link['url']}}">{{$link['label']}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </div>
</article>
@endsection
@push('scripts')

@endpush