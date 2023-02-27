@extends('controlpanel.layout.main')

@section('title', __('messages.controlPanelAccountInfo'))

<style>
.icon_cell {
    position: relative;
    width: 50px;
    height: 50px;
}
.icon_cell, .quest_icon_cell {
    vertical-align: top;
    text-align: center;
}

.item_icon {
    width: 66px;
    height: 66px;
}
img, svg {
    vertical-align: middle;
}
</style>

@section('controlPalnel')
        <h2 class="line no_margin account_main_page_title">{{__('messages.controlPanelAccountInfo')}}</h2>
        <div class="account_main">

            <div class="deshboard">
                <div class="desh_left">
                    <div class="desh_box playing_box js-playingBox" >
                        <div class="desh_title">
                            <span class="pi pi_dash_game"></span>
                            <h3 class="title" style="width: 100%">Pedra Filosofal</h3>
                        </div>
                        <div class="desh_content" >
                            <div class="shortcut_list">
                                <ul class="bdo_slider owl-carousel js-bdoSliderWrap no_slide">
                                    <li class="item js-playingBdo">
                                        <dl class="subitems">
                                            <dd class="subitem">
                                                <a href="{{route('controlpanel.accountprofileinfo')}}" class="arrow btn_normal">
                                                    <img src="https://bdocodex.com/items/new_icon/03_etc/07_productmaterial/00007405.webp" class="item_icon grade_frame_1" alt="icon">
                                                </a>

                                            </dd>
                                            <dd class="subitem">
                                                <a href="{{route('controlpanel.accountprofileinfo')}}" class="arrow btn_normal">
                                                    <span>Adicionar ao carrinho</span>
                                                </a>
                                            </dd>
                                        </dl>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection
@push('scripts')

@endpush
