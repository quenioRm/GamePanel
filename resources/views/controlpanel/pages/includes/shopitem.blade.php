@extends('controlpanel.pages.shoplist')

@section('shopitem')
    <div class="grid-container">
        @foreach ($items['data'] as $item)
            <div class="grid-item" onmouseover="ModalShow({{$item['id']}})" onmouseleave="ModalClose()">
                <div class="desh_box playing_box js-playingBox">
                    <div class="desh_title">
                        <span class="pi pi_dash_game"></span>
                        <h3 class="title">Pedra Filosofal</h3>
                    </div>
                    <div class="desh_content">
                        <div class="shortcut_list">
                            <ul class="bdo_slider owl-carousel js-bdoSliderWrap no_slide">
                                <li class="item js-playingBdo">
                                    <dl class="subitems">
                                        <dd class="subitem">
                                            <a href="#"
                                                class="arrow btn_normal">
                                                <img src="https://bdocodex.com/items/new_icon/03_etc/07_productmaterial/00007405.webp"
                                                    class="item_icon grade_frame_1" alt="icon">
                                            </a>
                                        </dd>
                                    </dl>
                                    <dd class="subitem">
                                        <a href="{{ route('controlpanel.accountprofileinfo') }}" class="arrow btn_normal">
                                            <span>Adicionar ao carrinho</span>
                                        </a>
                                    </dd>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- The Modal -->
<div id="myModal" class="modal" onmouseleave="ModalClose()">
    <div class="modal-content">
        <div class="desh_box playing_box js-playingBox">
            <div class="desh_content">
                <div class="shortcut_list">
                    <ul class="bdo_slider owl-carousel js-bdoSliderWrap no_slide">
                        <li class="item js-playingBdo">
                            <dl class="subitems">
                                <dd class="subitem">
                                    <a href="#" id="myBtn"
                                        class="arrow btn_normal">
                                        <img src="https://bdocodex.com/items/new_icon/03_etc/07_productmaterial/00007405.webp"
                                            class="item_icon grade_frame_1" alt="icon">
                                    </a>
                                </dd>
                            </dl>
                            <dd class="subitem">
                                <a href="{{ route('controlpanel.accountprofileinfo') }}" class="arrow btn_normal">
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
@endsection

@push('scripts')
<script>


function ModalShow(id){

    console.log(id);

    modal.style.display = "block";
}

function ModalClose(){
    modal.style.display = "none";
    console.log("CLOSE")
}
    // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
@endpush
