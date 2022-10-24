<div id="profile_popup" class="">
    <h3>Favor escolher uma imagem de perfil.</h3>
    <button type="button" class="popup_close js-closeProfile">
        <span class="blind">Fechar</span>
    </button>
    <div class="character_wrap">
        <br>
        <ul class="character_list">
            <li>
                <button type="button" class="js-choiceBtn profile_img_option {{($account[0]['avatar'] == 'noavatar.png' ? 'active' : '')}}" data-profileimageno="0"
                data-profilefileurl="{{asset('img/noavatar.png')}}">
                    <span class="blind">-</span>
                    <span class="t {{($account[0]['avatar'] == 'noavatar.png' ? 'checked' : '')}}">
                        <i class="pi pi_check"></i>
                    </span>
                    <span class="icon_character_area profile">
                        <span data-class-type="20" class="icon_character" style="background-image: url({{asset('img/noavatar.png')}});"></span>
                    </span>
                </button>
            </li>
            @foreach ($account[0]['useravatar'] as $avatar)
            <li>
                <button type="button" class="js-choiceBtn profile_img_option {{($account[0]['avatar'] == $avatar['avatar'] ? 'active' : '')}}" data-profileimageno="{{$avatar['id']}}" 
                data-profilefileurl="{{asset('storage/user/avatar/' . Auth::user()->id .'/'. $avatar['avatar'])}}">
                    <span class="blind">-</span>
                    <span class="t {{($account[0]['avatar'] == $avatar['avatar'] ? 'checked' : '')}}">
                        <i class="pi pi_check"></i>
                    </span>
                    <span class="icon_character_area profile">
                        <span data-class-type="20" class="icon_character" style="background-image:url({{asset('storage/user/avatar/' . Auth::user()->id .'/'. $avatar['avatar'])}})"></span>
                    </span>
                </button>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="btn_wrap">
        <button id="" type="button" class="btn btn_big btn_blue js-selectProfile">Selecionar</button>
    </div>
</div>
