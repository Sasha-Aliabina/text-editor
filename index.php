<!DOCTYPE html>
<html lang="ru" >
<head>
  <meta charset="UTF-8">
  <title>Редактор текста</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="content">
    <div id="link" class="hide">
      <input type="text" id="linkInput" class="form-control inputFile" size="75" placeholder="https://example.com"/>
      <input type="text" id="anchorText" class="form-control inputFile" placeholder="текст ссылки" size="25"/>
      <button type="button" id="create-link" class="bttn bttn-success close">Сохранить</button>
      <button type="button" class="bttn bttn-default close">Закрыть</button>
    </div>
    <div id="video" class="hide">
      <label for="insert_video">
      <input type="text" name="videoInput" id="videoInput" size="75" class="form-control inputFile" placeholder="https://www.youtube.com/"/>
      </label>
      <button type="button" id="create-video" class="bttn bttn-success close">Загрузить</button>
      <button type="button" class="bttn bttn-default close">Закрыть</button>
    </div>
    <div id="images" class="hide">
      <form id="uploadForm" class="uploadForm" enctype="multipart/form-data" action="#">
        <block class="input-file-container">
          <input type="file" name="images[]" id="fileInput" class="input-file" multiple />
          <label tabindex="0" for="fileInput" class="input-file-trigger"><i class="fas fa-file-upload"></i>&nbsp; Выберите файл</label>
        </block>
        <p class="file-return"></p>
        <input type="submit" name="submit" class="bttn bttn-success close" value="Загрузить"/>
        <button type="button" class="bttn bttn-default close">Закрыть</button>
      </form>
    </div>
  </div>
  <div id='editControls'>
    <label for="toggle-editor" data-tooltip="Исходный код" class="toggle-editor">
      <input type="checkbox" id="toggle-editor" name="toggle-editor"> <i class="fas fa-code"></i>
      </label>
    <div class='btn-group'>
      <a class='btn click' data-role='undo' data-tooltip="Отменить действие" href='#'><i class="fas fa-reply"></i></a>
      <a class='btn click' data-role='redo' data-tooltip="Повторить действие" href='#'><i class="fas fa-share"></i></a>
    </div>
    <div class='btn-group'>
      <a class='btn click' data-role='bold' data-tooltip="Выделить жирным" href='#'><i class="fas fa-bold"></i></a>
      <a class='btn click' data-role='italic' data-tooltip="Выделить курсивом" href='#'><i class="fas fa-italic"></i></a>
      <a class='btn click' data-role='underline' data-tooltip="Подчеркнуть" href='#'><i class="fas fa-underline"></i></a>
    </div>
    <div class='btn-group'>
      <a class='btn click' data-role='h3' data-tooltip="Заголовок" href='#'><i class="fas fa-heading">1</i></a>
      <a class='btn click' data-role='h4' data-tooltip="Подзаголовок" href='#'><i class="fas fa-heading">2</i></a>
      <a class='btn click' data-role='p' data-tooltip="Обычный текст" href='#'><i class="fas fa-heading">6</i></a>
    </div>
    <div class='btn-group'>
      <a class='btn click' data-role='justifyLeft' data-tooltip="Выровнять по левому краю" href='#'><i class="fas fa-align-left"></i></a>
      <a class='btn click' data-role='justifyCenter' data-tooltip="Выровнять по центру" href='#'><i class="fas fa-align-center"></i></a>
      <a class='btn click' data-role='justifyRight' data-tooltip="Выровнять по правому краю" href='#'><i class="fas fa-align-right"></i></a>
      <a class='btn click' data-role='justifyFull' data-tooltip="Выровнять по ширине" href='#'><i class="fas fa-align-justify"></i></a>
    </div>
    <div id="act" class='btn-group'>
      <a class='btn click icon-link' data-id="link" data-tooltip="Вставить ссылку" href='#'></a>
      <a class='btn click icon-camera' data-id="images" data-tooltip="Вставить изображение" href='#'></a>
      <a class='btn icon-youtube' data-id="video" data-tooltip="Вставить видео" href='#'></a>
    </div>
    <div class='btn-group'>
      <a class='btn click' data-role='insertUnorderedList' data-tooltip="Маркированный список" href='#'><i class="fas fa-list-ul"></i></a>
      <a class='btn click' data-role='insertOrderedList' data-tooltip="Нумерованный список" href='#'><i class="fas fa-sort-numeric-down"></i></a>
    </div>
  </div>
  <div id='editor' class="editor" style='' contenteditable>
    <img src="./uploads/dolphin.jpeg" alt="дельфин" class="user-images"><p>Исследователи утверждают, что <b>у каждого дельфина</b> есть свой <i>уникальный позывной</i>, которые служит ему неким "именем". Благодаря отличительному свисту дельфины зовут друг друга <b>и откликаются</b> на свое "имя".</p><p>Язык дельфинов можно разделить на <u>2 группы</u>:<ul><li>Язык жестов (язык тела) — различные позы, прыжки, повороты, различные способы плавания, знаки, подаваемые хвостом, головой, плавниками.</li><li>Язык звуков (собственно язык) — звуковая сигнализация, выраженная в виде звуковых импульсов и ультразвука. Примерами таких звуков могут быть: щебет, жужжание, визги, скрежет, щёлканье, чмоканье, скрипы, хлопки, писк, рёв, вопли, крики, кваканье, свисты.</li></ul></p>
  </div>
  <script src="./js/main.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script>

    $(document).ready(function(){

      $('#toggle-editor').click(function(){
      let target = $('.editor');
        if ($(this).is(':checked')){
          target.replaceWith('<textarea class="editor">' + target.html() + '</textarea>');
        }else{
          target.replaceWith('<div contenteditable="true" class="editor">' + target.val() + '</div>');
        }
      });

      $('#editControls a').click(function(e) {

        switch($(this).data('role')) {
          case 'h3':
          case 'h4':
          case 'p':
            document.execCommand('formatBlock', false, $(this).data('role'));
            break;
          default:
            document.execCommand($(this).data('role'), false, null);
            break;
        }
      });

      $("#uploadForm").on('submit', function(e){
          e.preventDefault();
          $.ajax({
              type: 'POST',
              url: 'upload.php',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData:false,
              error:function(){
                  alert('Ошибка загрузки файла');
              },
              success: function(data){
                  $('#uploadForm')[0].reset();
                    editor.innerHTML += data;
              }
          });
      });
      
      $("#fileInput").change(function(){
          var fileLength = this.files.length;
          var match= ["image/jpeg","image/png","image/jpg","image/gif"];
          var i;
          for(i = 0; i < fileLength; i++){ 
              var file = this.files[i];
              var imagefile = file.type;
              if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) || (imagefile==match[3]))){
                Swal.fire({
                  icon: 'warning',
                  title: 'Неверный формат файла.',
                  text: 'Допустимые форматы - jpg, jpeg, png, gif.',
                  showConfirmButton: false,
                  timer: 1500
                })
                  $("#fileInput").val('');
                  return false;
              }
          }
      });

      $("#create-link").click(function(){
      let links = "",
          anchor = "";
      
      links = $("#linkInput").val().toString();
      anchor = $("#anchorText").val().toString();

      let a = document.createElement('a');
      a.setAttribute('href', link);
      a.setAttribute('target', '_blank');
      a.textContent = anchor;
        
      if (editor.appendChild(a)) {
        $("#linkInput").val("");
        $("#anchorText").val("");
      }
    });

    $("#create-video").click(function(){
      let begVideo = '<iframe width="560" height="315" src="',
          endVideo = '" frameborder="0" allowfullscreen></iframe>',
          video = "",
          videoHolder = "";
      
      video = $("#videoInput").val().toString();
      video_str = video.replace("watch?", "embed/");

      videoHolder = begVideo + video_str + endVideo;

      if (editor.innerHTML += videoHolder) {
        $("#videoInput").val("");
      } 
    });
  });
  </script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
</body>
</html>
