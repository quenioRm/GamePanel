@extends('controlpanel.layout.main')

@section('title', __('messages.controlPanelAccountInfo'))

@section('controlPalnel')
<article class="content logging">
    <h2 class="line">Noticias</h2>
    <div id="divLoggingListArea col-sm" style="left: 20px; position: relative; top: 10px">
        <form action="{{route('gamepanel.controlpanel.news.add')}}" class="js-submitActive container_wrap" id="frmJoin" method="post">
        @csrf

        <textarea id="summernote" name="description"></textarea>

        <br>
        <div class="input_margin js-country" data-nation="BR">
            <div class="custom_wrap select2-input select2-input ">
               <div class="custom_select">
                  <select Icon="" Placeholder="" class="js-nationSelect js-select2" data-val="true" data-val-required="Favor selecionar a região." id="nationCode" labelName="Região" name="language">
                     <option value="pt-BR">Português Brasil</option>
                     <option value="en">Inglês</option>
                     <option value="es">Espanhol</option>
                     {{-- @foreach ($countries as $country)
                          <option value="{{$country->code_1}}" @if (old('nationCode') == $country->code_1) {{ 'selected' }} @endif>{{$country->name}}</option>
                     @endforeach --}}
                  </select>
               </div>
               <label for="nationCode" class="input_label js-labelSelect">Idioma</label>
            </div>
            <div class="input_validate error"><span class="{{($errors->has('nationCode') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="nationCode" data-valmsg-replace="true">
                 @if ($errors->has('nationCode'))
                    <span class="">{{$errors->first('nationCode')}}</span>
                 @endif
                 </span>
           </div>
         </div>

         <br>
         <div class="input_margin js-country" data-nation="BR">
             <div class="custom_wrap select2-input select2-input ">
                <div class="custom_select">
                   <select Icon="" Placeholder="" class="js-nationSelect js-select2" data-val="true" data-val-required="Favor selecionar a região." id="nationCode" labelName="Região" name="category">
                      <option value="announce">Anúncio</option>
                      <option value="event">Evento</option>
                      <option value="maintenance">Manutenção</option>
                      <option value="update">Atualização</option>
                      {{-- @foreach ($countries as $country)
                           <option value="{{$country->code_1}}" @if (old('nationCode') == $country->code_1) {{ 'selected' }} @endif>{{$country->name}}</option>
                      @endforeach --}}
                   </select>
                </div>
                <label for="nationCode" class="input_label js-labelSelect">{{__('messages.nation')}}</label>
             </div>
             <div class="input_validate error"><span class="{{($errors->has('nationCode') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="nationCode" data-valmsg-replace="true">
                  @if ($errors->has('nationCode'))
                     <span class="">{{$errors->first('nationCode')}}</span>
                  @endif
                  </span>
            </div>
          </div>

          <br>
          <div class="input_margin">
            <div class="custom_input label ">
              <div class="custom_inputBox">
                 <input class="{{($errors->has('name') ? 'input-validation-error' : '')}}" Icon="" id="name" placeholder="" data-val="true"
                 data-val-required="{{__('messages.name-data-val-required')}}" labelName="Nome" name="name"
                 type="text" value="{{old('name')}}" /><label for="name"><span>{{__('messages.name')}}
                 </span></label>
                 <span class="custom_line"></span>
             </div>
             <div class="input_validate error"><span class="{{($errors->has('name') ? 'field-validation-error' : 'field-validation-valid')}}" data-valmsg-for="name" data-valmsg-replace="true">
                 @if ($errors->has('name'))
                    <span class="">{{$errors->first('name')}}</span>
                 @endif
                 </span>
              </div>
            </div>
         </div>

         <br>
         <input type="file" name="image_url">

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
