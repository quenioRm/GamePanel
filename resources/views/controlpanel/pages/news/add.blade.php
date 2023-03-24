@extends('controlpanel.layout.main')

@section('title', "Noticias - Adicionar")

@section('controlPalnel')
<article class="content logging">
    <h2 class="line">Noticias</h2>
    <div class="desh_box playing_box js-playingBox">
        <div class="desh_content">
            <div class="shortcut_list">
                <ul class="bdo_slider owl-carousel js-bdoSliderWrap no_slide">
                    <li class="item js-playingBdo">
                        <dl class="subitems">
                            <dd class="subitem" style="width: 20%">
                                <a href="{{route('gamepanel.controlpanel.news.list')}}" class="arrow btn_normal"><span>Lista</span></a>
                            </dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="divLoggingListArea col-sm" style="left: 20px; position: relative; top: 10px">
        <form action="{{route('gamepanel.controlpanel.news.add')}}" class="js-submitActive container_wrap" id="frmJoin" method="post" enctype="multipart/form-data">
        @csrf

        <div class="input_margin">
            <div class="custom_input label ">
            <div class="custom_inputBox">
                <textarea id="summernote" name="description">{{old('description')}}</textarea>
                <div class="input_validate error"><span class="{{($errors->has('description') ? 'field-validation-error' : 'field-validation-valid')}}">
                    @if ($errors->has('description'))
                    <span class="">{{$errors->first('description')}}</span>
                    @endif
                    </span>
                </div>
            </div>
        </div>

        <br>
        <br>
        <div class="input_margin js-country" data-nation="BR">
            <div class="custom_wrap select2-input select2-input ">
               <div class="custom_select">
                  <select Icon="" Placeholder="" class="js-nationSelect js-select2" data-val="true" data-val-required="Favor selecionar a região." id="language" labelName="Região" name="language">
                     <option value="pt-BR" @if (old('language') == 'pt-BR') {{ 'selected' }} @endif>Português Brasil</option>
                     <option value="en" @if (old('language') == 'en') {{ 'selected' }} @endif>Inglês</option>
                     <option value="es" @if (old('language') == 'es') {{ 'selected' }} @endif>Espanhol</option>
                  </select>
               </div>
               <label for="language" class="input_label js-labelSelect">Idioma</label>
            </div>
            <div class="input_validate error"><span class="{{($errors->has('language') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="language" data-valmsg-replace="true">
                 @if ($errors->has('language'))
                    <span class="">{{$errors->first('language')}}</span>
                 @endif
                 </span>
           </div>
         </div>

         <br>
         <div class="input_margin js-country" data-nation="BR">
             <div class="custom_wrap select2-input select2-input ">
                <div class="custom_select">
                   <select Icon="" Placeholder="" class="js-nationSelect js-select2" data-val="true" data-val-required="Favor selecionar a região." id="nationCode" labelName="Região" name="category">
                      <option value="announce" @if (old('category') == 'announce') {{ 'selected' }} @endif>Anúncio</option>
                      <option value="event" @if (old('category') == 'event') {{ 'selected' }} @endif>Evento</option>
                      <option value="maintenance" @if (old('category') == 'maintenance') {{ 'selected' }} @endif>Manutenção</option>
                      <option value="update" @if (old('category') == 'update') {{ 'selected' }} @endif>Atualização</option>
                   </select>
                </div>
                <label for="category" class="input_label js-labelSelect">Categoria</label>
             </div>
             <div class="input_validate error"><span class="{{($errors->has('category') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="nationCode" data-valmsg-replace="true">
                  @if ($errors->has('category'))
                     <span class="">{{$errors->first('category')}}</span>
                  @endif
                  </span>
            </div>
          </div>

          <br>
          <div class="input_margin">
            <div class="custom_input label ">
              <div class="custom_inputBox">
                 <input class="{{($errors->has('name') ? 'input-validation-error' : '')}}" Icon="" id="name" placeholder=""
                 data-val-required="{{__('messages.name-data-val-required')}}" labelName="Nome" name="name"
                 type="text" value="{{old('name')}}" /><label for="name"><span>{{__('messages.name')}}
                 </span></label>
                 <span class="custom_line"></span>
             </div>
             <div class="input_validate error"><span class="{{($errors->has('name') ? 'field-validation-error' : 'field-validation-valid')}}">
                 @if ($errors->has('name'))
                    <span class="">{{$errors->first('name')}}</span>
                 @endif
                 </span>
              </div>
            </div>
         </div>

         <br>
         <div class="input_margin js-country">
             <div class="custom_wrap select2-input select2-input ">
                <div class="custom_select">
                   <select Icon="" Placeholder="" class="js-nationSelect js-select2" labelName="Destaque" name="topnotice">
                      <option value="0" @if (old('topnotice') == '0') {{ 'selected' }} @endif>Não</option>
                      <option value="1" @if (old('topnotice') == '1') {{ 'selected' }} @endif>Sim</option>
                   </select>
                </div>
                <label for="topnotice" class="input_label js-labelSelect">Destaque</label>
             </div>
             <div class="input_validate error"><span class="{{($errors->has('topnotice') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="nationCode" data-valmsg-replace="true">
                  @if ($errors->has('topnotice'))
                     <span class="">{{$errors->first('topnotice')}}</span>
                  @endif
                  </span>
            </div>
          </div>

        <br>
        <div class="input_margin">
            <div class="custom_input label ">
            <div class="custom_inputBox">
                <input type="file" name="image_url">
                <div class="input_validate error"><span class="{{($errors->has('image_url') ? 'field-validation-error' : 'field-validation-valid')}}" >
                    @if ($errors->has('image_url'))
                        <span class="">{{$errors->first('image_url')}}</span>
                        @endif
                    </span>
                </div>
            </div>
        </div>

         <br>
        <br>
        <div class="btn_wrap">
            <button type="submit" style="width: 20%" class="btn btn_big2 btn_blue js-btnJoin">Cadastrar</button>
         </div>
    </form>
    </div>
</article>
@endsection
@push('scripts')

{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('#summernote').summernote({
      placeholder: 'Hello stand alone ui',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>
@endpush
