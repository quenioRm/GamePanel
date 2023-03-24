@extends('controlpanel.layout.main')

@section('title', __('messages.controlPanelAccountInfo'))

@section('controlPalnel')
<article class="content profileaccount">
    <h2 class="line">{{__('messages.controlPanelProfile')}} {{mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' )}}</h2>
    <div class="icon_box icon_none">
        <button type="button" class="mypage_profile_wrap js-openProfile">
            <span class="blind">-</span>
            <span class="icon_character_area">
                <span class="icon_character" 
                style="background-image: url({{($account[0]['avatar'] == '' ? asset('img/noavatar.png') : 
                asset('storage/user/avatar/' . Auth::user()->id .'/'. $account[0]['avatar']))}});"></span>
            </span>
            <i class="pi pi_setting"></i>
        </button>
        <br>

        <form method="POST" id="FormUploadAvatar" enctype="multipart/form-data">
            <input type="file" id="avatar" class="form-control" name="avatar" />
            <button type="submit" class="btn btn-sm">...</button>
        </form>

        {{-- Profile Image --}}
        @include('controlpanel.pages.includes.profileaccountmodal')
    </div>

    <form id="frmProfileAccount" name="frmProfileAccount" method="post" action="{{route('gamepanel.controlpanel.profileaccount')}}" novalidate="novalidate">
        @csrf

        <input class="" icon="" labelname="" placeholder="" data-val="true" 
        data-val-number="The field _profileImageNo must be a number." data-val-required="The _profileImageNo field is required."
        id="profileImageNo" name="profileImageNo" type="hidden" value="0">

        <div class="select_pet_wrap">
            <div class="box_nickname">
                <span class="custom_input label icon icon_user">
                    <div class="custom_input label">
                        <div class="custom_inputBox">
                            <input
                                class="{{($errors->has('name') ? 'input-validation-error' : 'active valid')}}"
                                icon=""
                                placeholder=""
                                data-val="true"
                                data-val-maxlength="{{__('messages.controlPanelProfileInputLoginRequired')}}"
                                data-val-maxlength-max="16"
                                data-val-minlength="{{__('messages.controlPanelProfileInputLoginRequired')}}"
                                data-val-minlength-min="2"
                                data-val-regex="{{__('messages.controlPanelProfileInputLoginRequired')}}"
                                data-val-regex-pattern="^(?!.*[\(\)\{\}\[\],.`~!@#$%^&amp;*|\\\'&quot;;:\/?★─│┌┐┘└├┬┤┴│━┃┏┓┛┗┣┳┫┻╋┠┯┨┷┿┝┰┥┸╂┒┑┚┙┖┕┎┍┞┟┡┢┦┧┩┪┭┮┱┲┵┶┹┺┽┾╀╁╃╄╅╆╇╈╉╊０１２３４５６７８９ⅰⅱⅲⅳⅴⅵⅶⅷⅸⅹⅠⅡⅢⅣⅤⅥⅦⅧⅨⅩ＋－＜＝＞±×÷≠≤≥∞∴♂♀∠⊥⌒∂∇≡≒≪≫√∽∝∵∫∬∈∋⊆⊇⊂⊃∪∩∧∨￢⇒⇔∀∃∮∑∏！＇，．／：；？＾＿｀｜￣、、。·‥…¨〃­―∥＼∼´～ˇ˘˝˚˙¸˛¡¿ː㉠㉡㉢㉣㉤㉥㉦㉧㉨㉩㉪㉫㉬㉭㉮㉯㉰㉱㉲㉳㉴㉵㉶㉷㉸㉹㉺㉻㈀㈁㈂㈃㈄㈅㈆㈇㈈㈉㈊㈋㈌㈍㈎㈏㈐㈑㈒㈓㈔㈕㈖㈗㈘㈙㈚㈛＃＆＊＠§※☆★○●◎◇◆□■△▲▽▼→←↑↓↔〓◁◀▷▶♤♠♡♥♧♣⊙◈▣◐◑▒▤▥▨▧▦▩♨☏☎☜☞¶†‡↕↗↙↖↘♭♩♪♬㉿㈜№㏇™㏂㏘℡?ªº＂（）［］｛｝‘’“”〔〕〈〉《》「」『』【】ⓐⓑⓒⓓⓔⓕⓖⓗⓘⓙⓚⓛⓜⓝⓞⓟⓠⓡⓢⓣⓤⓥⓦⓧⓨⓩ①②③④⑤⑥⑦⑧⑨⑩⑪⑫⑬⑭⑮⒜⒝⒞⒟⒠⒡⒢⒣⒤⒥⒦⒧⒨⒩⒪⒫⒬⒭⒮⒯⒰⒱⒲⒳⒴⒵⑴⑵⑶⑷⑸⑹⑺⑻⑼⑽⑾⑿⒀⒁⒂＄％￦Ｆ′″℃Å￠￡￥¤℉‰?㎕㎖㎗ℓ㎘㏄㎣㎤㎥㎥㎦㎙㎚㎛㎜㎝㎞㎟㎠㎡㎢㏊㎍㎎㎏㏏㎈㎉㏈㎧㎨㎰㎱㎲㎳㎴㎵㎶㎷㎸㎹㎀㎁㎂㎃㎄㎺㎻㎼㎽㎾㎿㎐㎑㎒㎓㎔Ω㏀㏁㎊㎋㎌㏖㏅㎭㎮㎯㏛㎩㎪㎫㎬㏝㏐㏓㏃㏉㏜㏆ΑΒΓΔΕΖΗΘΙΚΛΜΝΞΟΠΡΣΤΥΦΧΨΩαβγδεζηθικλμνξοπρστυφχψωㄱㄲㄳㄴㄵㄶㄷㄸㄹㄺㄻㄼㄽㄾㄿㅀㅁㅂㅃㅄㅅㅆㅇㅈㅉㅊㅋㅌㅍㅎㅏㅐㅑㅒㅓㅔㅕㅖㅗㅘㅙㅚㅛㅜㅝㅞㅟㅠㅡㅢㅣㅥㅦㅧㅨㅩㅪㅫㅬㅭㅮㅯㅰㅱㅲㅳㅴㅵㅶㅷㅸㅹㅺㅻㅼㅽㅾㅿㆀㆁㆂㆃㆄㆅㆆㆇㆈㆉㆊㆋㆌㆍㆎ½⅓⅔¼¾⅛⅜⅝⅞¹²³⁴ⁿ₁₂₃₄ＡＢＣＤＥＦＧＨＩＪＫＬＭＮＯＰＱＲＳＴＵＶＷＸＹＺａｂｃｄｅｆｇｈｉｊｋｌｍｎｏｐｑｒｓｔｕｖｗｘｙｚ]).*"
                                data-val-required="{{__('messages.controlPanelProfileInputLogin')}}"
                                id="name"
                                labelname="{{__('messages.controlPanelProfileInputLogin')}}"
                                name="name"
                                type="text"
                                value="{{old('name', $account[0]['name'])}}"
                                aria-describedby="webNickName-error"
                                aria-invalid="false"
                            />
                            <label for="webNickName"><span>{{__('messages.controlPanelProfileInputLogin')}}</span></label><span class="custom_line" style="width: 143.4px; left: 16.8px;"></span>
                        </div>
                        <div class="input_validate error"><span class="{{($errors->has('name') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="name" data-valmsg-replace="true">
                            @if ($errors->has('name'))
                               <span class="">{{$errors->first('name')}}</span>
                            @endif
                            </span>
                        </div>   
                    </div>
                </span>
                <ul class="bullet_list">
                    <li>{{__('messages.controlPanelProfileInputLoginMessage_1')}}</li>
                    <li>{{__('messages.controlPanelProfileInputLoginMessage_2')}}</li>
                </ul>
                <div class="btn_wrap">
                    <button type="submit" class="btn btn_big btn_blue mob_half" id="btnProfileAccount">
                        <span>{{__('messages.controlPanelProfileBtnSave')}}</span>
                    </button>
                </div>
            </div>
        </div>
    </form>

</article>
@endsection
@push('scripts')

    <script src="{{asset('assets/js/profile/mypage.js?v=638016825217184276')}}"></script>

    <script>
        $(document).ready(function () {
            _abyss.mypage.profileAccountInit();
        });
    </script>

    {{-- <script>
        function ShowModal()
        {
            $('#profile_popup').addClass('active');
        }

        function CloseModal()
        {
            $("#profile_popup").removeClass('active');
        }

        
    </script> --}}
    <script>
        $('#avatar').change(function () {

            var fd = new FormData();
            var files = $('#avatar')[0].files;

            fd.append('avatar',files[0]);
            fd.append('_token', '{{ csrf_token() }}');

            $.ajax({
            url: '{{route('gamepanel.controlpanel.profileaccountformuploadavatar')}}',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    // background: '#fff',
                    title: response.resultMsg,
                    showConfirmButton: false,
                    timer: 6500
                })
                
                setTimeout(function() { 
                    location.reload();
                }, 6500);
            },
            error: function (jqXHR, exception) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: jqXHR.responseJSON.resultMsg,
                    showConfirmButton: false,
                    timer: 6500
                })
            }
            });
        });
    </script>
@endpush