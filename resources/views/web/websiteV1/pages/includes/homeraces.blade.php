@push('styles')
<link rel="stylesheet" href="{{asset('assets/web/css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset('assets/web/css/page_world.css')}}"/>
@endpush

<section id="section_races_top" class="section-races">
    <div class="wrapper">
        <h3>{{__('messages.class')}}</h3>
        <p>{{__('messages.homerace1')}}</p>
        <div class="slider-races">
            <!-- Nuians -->
            <div class="races-descr">
                <div class="race">
                    <h3>{{__('messages.magician')}}</h3>
                    <p class="about">{{__(('messages.magiciandesc'))}}</p>
                    <div class="race-skills" style="z-index: 20;">
                        <h3>{{__('messages.powerlevel')}}</h3>
                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="70" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.strength')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="60" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.dexterity')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="70" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.constitution')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="80" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.intelligence')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="90" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.willpower')}}</h5>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="race-img">
                    <img src="{{asset('assets/web/images/main/classes/main_magician_large.png')}}" alt="">
                </div>
                <div class="type_m btn-wrapper">
                    <a href="#skills-dialog" class="btn primary light popup-with-skills">Skills</a>
                </div>
            </div>
            <!-- Nuians -->
            <!-- Elves -->
            <div class="races-descr">
                <div class="race">
                    <h3>{{__('messages.trickster')}}</h3>
                    <p class="about">{{__('messages.tricksterdesc')}}</p>
                     <div class="race-skills" style="z-index: 20;">
                        <h3>{{__('messages.powerlevel')}}</h3>
                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="70" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.strength')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="60" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.dexterity')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="60" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.constitution')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="80" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.intelligence')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="100" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.willpower')}}</h5>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="race-img">
                    <img src="{{asset('assets/web/images/main/classes/main_trickster_large.png')}}" alt="">
                </div>
                <div class="type_m btn-wrapper">
                    <a href="#skills-dialog" class="btn primary light popup-with-skills">Skills</a>
                </div>
            </div>
            <!-- Elves -->
            <!--Dwarves -->
            <div class="races-descr">
                <div class="race">
                    <h3>{{__('messages.guardian')}}</h3>
                    <p class="about">{{__('messages.guardiandesc')}}</p>
                     <div class="race-skills" style="z-index: 20;">
                        <h3>{{__('messages.powerlevel')}}</h3>
                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="80" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.strength')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="60" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.dexterity')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="80" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.constitution')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="70" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.intelligence')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="80" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.willpower')}}</h5>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="race-img">
                    <img src="{{asset('assets/web/images/main/classes/main_guardian_large.png')}}" alt="">
                </div>
                <div class="type_m btn-wrapper">
                    <a href="#skills-dialog" class="btn primary light popup-with-skills">Skills</a>
                </div>
            </div>
            <!--Dwarves -->
            <!-- Warborn -->
            <div class="races-descr">
                <div class="race">
                    <h3>{{__('messages.assassin')}}</h3>
                    <p class="about">{{__('messages.assassindesc')}}</p>
                     <div class="race-skills" style="z-index: 20;">
                        <h3>{{__('messages.powerlevel')}}</h3>
                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="80" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.strength')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="90" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.dexterity')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="70" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.constitution')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="70" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.intelligence')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="60" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.willpower')}}</h5>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="race-img">
                    <img src="{{asset('assets/web/images/main/classes/main_assassin_large.png')}}" alt="">
                </div>
                <div class="type_m btn-wrapper">
                    <a href="#skills-dialog" class="btn primary light popup-with-skills">Skills</a>
                </div>
            </div>
            <!-- Warborn -->
            <!-- Firran -->
            <div class="races-descr">
                <div class="race">
                    <h3>{{__('messages.priest')}}</h3>
                    <p class="about">{{__('messages.priestdesc')}}</p>
                     <div class="race-skills" style="z-index: 20;">
                        <h3>{{__('messages.powerlevel')}}</h3>
                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="70" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.strength')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="60" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.dexterity')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="70" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.constitution')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="80" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.intelligence')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="90" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.willpower')}}</h5>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="race-img">
                    <img src="{{asset('assets/web/images/main/classes/main_priest_large.png')}}" alt="">
                </div>
                <div class="type_m btn-wrapper">
                    <a href="#skills-dialog" class="btn primary light popup-with-skills">Skills</a>
                </div>
            </div>
            <!-- Firran -->
            <!-- Harani -->
            <div class="races-descr">
                <div class="race">
                    <h3>{{__('messages.berseker')}}</h3>
                    <p class="about">{{__('messages.bersekerdesc')}}</p>
                     <div class="race-skills" style="z-index: 20;">
                        <h3>{{__('messages.powerlevel')}}</h3>
                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="90" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.strength')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="70" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.dexterity')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="80" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.constitution')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="60" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.intelligence')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="70" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.willpower')}}</h5>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="race-img">
                    <img src="{{asset('assets/web/images/main/classes/main_berseker_large.png')}}" alt="">
                </div>
                <div class="type_m btn-wrapper">
                    <a href="#skills-dialog" class="btn primary light popup-with-skills">Skills</a>
                </div>
            </div>
            <div class="races-descr">
                <div class="race">
                    <h3>{{__('messages.wizard')}}</h3>
                    <p class="about">{{__('messages.wizarddesc')}}</p>
                     <div class="race-skills" style="z-index: 20;">
                        <h3>{{__('messages.powerlevel')}}</h3>
                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="70" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.strength')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="70" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.dexterity')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="60" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.constitution')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="90" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.intelligence')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="80" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.willpower')}}</h5>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="race-img">
                    <img src="{{asset('assets/web/images/main/classes/main_wizard_large.png')}}" alt="">
                </div>
                <div class="type_m btn-wrapper">
                    <a href="#skills-dialog" class="btn primary light popup-with-skills">Skills</a>
                </div>
            </div>
            <div class="races-descr">
                <div class="race">
                    <h3>{{__('messages.ranger')}}</h3>
                    <p class="about">{{__('messages.rangerdesc')}}</p>
                     <div class="race-skills" style="z-index: 20;">
                        <h3>{{__('messages.powerlevel')}}</h3>
                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="60" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.strength')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="70" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.dexterity')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="70" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.constitution')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="90" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.intelligence')}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="border-wrap">
                                        <img data-progress="80" src="{{asset('assets/web/images/main/progress.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h5>{{__('messages.willpower')}}</h5>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="race-img">
                    <img src="{{asset('assets/web/images/main/classes/main_ranger_large.png')}}" alt="">
                </div>
                <div class="type_m btn-wrapper">
                    <a href="#skills-dialog" class="btn primary light popup-with-skills">Skills</a>
                </div>
            </div>
            <!-- Firran -->
        </div>
        <ul class="races-list">
            <li class="active">
                <a href="#" data-slide="0">
                    <div class="thumb">
                        <img src="{{asset('assets/web/images/main/classes/icon/83.png')}}">
                    </div>
                    <div class="caption">{{__('messages.magician')}}</div>
                </a>
            </li>
            <li>
                <a href="#" data-slide="1">
                    <div class="thumb">
                        <img src="{{asset('assets/web/images/main/classes/icon/80.png')}}">
                    </div>
                    <div class="caption">{{__('messages.trickster')}}</div>
                </a>
            </li>
            <li>
                <a href="#" data-slide="2">
                    <div class="thumb">
                        <img src="{{asset('assets/web/images/main/classes/icon/70.png')}}">
                    </div>
                    <div class="caption">{{__('messages.guardian')}}</div>
                </a>
            </li>
            <li>
                <a href="#" data-slide="3">
                    <div class="thumb">
                        <img src="{{asset('assets/web/images/main/classes/icon/72.png')}}">
                    </div>
                    <div class="caption">{{__('messages.assassin')}}</div>
                </a>
            </li>
            <li>
                <a href="#" data-slide="4">
                    <div class="thumb">
                        <img src="{{asset('assets/web/images/main/classes/icon/74.png')}}">
                    </div>
                    <div class="caption">{{__('messages.priest')}}</div>
                </a>
            </li>
            <li>
                <a href="#" data-slide="5">
                    <div class="thumb">
                        <img src="{{asset('assets/web/images/main/classes/icon/68.png')}}">
                    </div>
                    <div class="caption">{{__('messages.berseker')}}</div>
                </a>
            </li>
            <li>
                <a href="#" data-slide="6">
                    <div class="thumb">
                        <img src="{{asset('assets/web/images/main/classes/icon/76.png')}}">
                    </div>
                    <div class="caption">{{__('messages.wizard')}}</div>
                </a>
            </li>
            <li>
                <a href="#" data-slide="7">
                    <div class="thumb">
                        <img src="{{asset('assets/web/images/main/classes/icon/78.png')}}">
                    </div>
                    <div class="caption">{{__('messages.ranger')}}</div>
                </a>
            </li>
        </ul>
    </div>
</section>
@push('scripts')
<script src="{{asset('assets/web/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/web/js/page_world.js')}}"></script>
<script>
    $(function() {
        $('.race-skills table tbody tr td .border-wrap img').each(function(i, obj) {
            if($(this).attr("data-progress") > 0 ){
                $(this).animate({
                    width: ($(this).attr("data-progress") / 100) * 400
                }, 1000);
            }
        });
    });
</script>
<script>
$("a .thumb").click(function(e) {

    $('.race-skills table tbody tr td .border-wrap img').each(function(i, obj) {
        if($(this).attr("data-progress") > 0 ){
            $(this).animate({
                width: '400px'
            });
        }
    });

    $('.race-skills table tbody tr td .border-wrap img').each(function(i, obj) {
        if($(this).attr("data-progress") > 0 ){
            $(this).animate({
                width: ($(this).attr("data-progress") / 100) * 400
            }, 1000);
        }
    });
});
</script>
@endpush
