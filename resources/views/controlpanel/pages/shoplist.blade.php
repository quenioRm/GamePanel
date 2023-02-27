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
    width: 46px;
    height: 46px;
}
img, svg {
    vertical-align: middle;
}

.grid-container {
    display: grid;
    grid-template-columns: auto auto;
    column-gap: 20px;
    row-gap: 20px;
    position: relative;
    left: 60px;
}

.grid-item {
  text-align: center;
  width: 280px;
  height: 237px;
}

#hidden {
  display: none;
}
#visible:hover #hidden {
  display: block;
}

</style>

@section('controlPalnel')
        <h2 class="line no_margin account_main_page_title">{{__('messages.controlPanelAccountInfo')}}</h2>
        <div class="account_main">

            <div class="deshboard">



                  <ul>
                    <li class="item js-playingBdo" id="visible">
                        <dd class="subitem" style="width: 200px; padding:2px">
                            <a href="{{route('controlpanel.accountprofileinfo')}}" class="arrow btn_normal">
                                <span>Trajes</span>
                            </a>
                        </dd>
                        <ul class="bdo_slider owl-carousel js-bdoSliderWrap no_slide" id="hidden">
                            <li class="item js-playingBdo">
                                <dd class="subitem" style="width: 200px; position:relative; left:20px; padding:2px">
                                    <a href="{{route('controlpanel.accountprofileinfo')}}" class="arrow btn_normal">
                                        <span>dsadasdas</span>
                                    </a>
                                </dd>
                            </li>
                        </ul>
                    </li>
                    <li class="item js-playingBdo" id="visible">
                        <dd class="subitem" style="width: 200px; padding:2px">
                            <a href="{{route('controlpanel.accountprofileinfo')}}" class="arrow btn_normal">
                                <span>Trajes 2</span>
                            </a>
                        </dd>
                        <ul class="bdo_slider owl-carousel js-bdoSliderWrap no_slide" id="hidden">
                            <li class="item js-playingBdo">
                                <dd class="subitem" style="width: 200px; position:relative; left:20px">
                                    <a href="{{route('controlpanel.accountprofileinfo')}}" class="arrow btn_normal">
                                        <span>dasdsa2sdas</span>
                                    </a>
                                </dd>
                            </li>
                        </ul>
                    </li>
                  </ul>


                    <div class="grid-container">

                        <div class="grid-item">
                            <div class="desh_box playing_box js-playingBox">
                                <div class="desh_title">
                                    <span class="pi pi_dash_game"></span>
                                    <h3 class="title">Pedra Filosofal</h3>
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

                                                </dl>
                                                <dd class="subitem">
                                                    <a href="{{route('controlpanel.accountprofileinfo')}}" class="arrow btn_normal">
                                                        <span>Adicionar ao carrinho</span>
                                                    </a>
                                                </dd>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid-item">
                            <div class="desh_box playing_box js-playingBox">
                                <div class="desh_title">
                                    <span class="pi pi_dash_game"></span>
                                    <h3 class="title">Pedra Filosofal</h3>
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

                                                </dl>
                                                <dd class="subitem">
                                                    <a href="{{route('controlpanel.accountprofileinfo')}}" class="arrow btn_normal">
                                                        <span>Adicionar ao carrinho</span>
                                                    </a>
                                                </dd>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid-item">
                            <div class="desh_box playing_box js-playingBox">
                                <div class="desh_title">
                                    <span class="pi pi_dash_game"></span>
                                    <h3 class="title">Pedra Filosofal</h3>
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

                                                </dl>
                                                <dd class="subitem">
                                                    <a href="{{route('controlpanel.accountprofileinfo')}}" class="arrow btn_normal">
                                                        <span>Adicionar ao carrinho</span>
                                                    </a>
                                                </dd>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="grid-item">
                            <div class="desh_box playing_box js-playingBox">
                                <div class="desh_title">
                                    <span class="pi pi_dash_game"></span>
                                    <h3 class="title">Pedra Filosofal</h3>
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

                                                </dl>
                                                <dd class="subitem">
                                                    <a href="{{route('controlpanel.accountprofileinfo')}}" class="arrow btn_normal">
                                                        <span>Adicionar ao carrinho</span>
                                                    </a>
                                                </dd>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

            </div>

        </div>
@endsection
@push('scripts')

@endpush
