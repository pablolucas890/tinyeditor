tinymce.init({
  selector: '#myTextarea',
  skin: 'snow',  
  icons: 'thin',
    //ver mais skins em https://www.tiny.cloud/blog/tinymce-skins-and-icons/
  height: 500,
  plugins: [
    //ver mais pluguins em https://www.tiny.cloud/docs/plugins/opensource/
    'advlist autolink link image lists charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
    'table emoticons template paste help',
    //'emoticons',
  ],
  toolbar:
    'anchor ' +
    'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
    'bullist numlist outdent indent | link image | print preview media fullpage | ' +
    'forecolor backcolor emoticons | help',
  menu: {
      favs: {title: 'Meus Favoritos', items: 'code visualaid | searchreplace | emoticons'},
      file: { title: 'Arquivo', items: 'newdocument restoredraft | preview | print ' },
      edit: { title: 'Editar', items: 'undo redo | cut copy paste | selectall | searchreplace' },
      view: { title: 'Ver', items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen' },
      insert: { title: 'Inserir', items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime' },
      format: { title: 'Formato', items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align lineheight | forecolor backcolor | removeformat' },
      tools: { title: 'Ferramentas', items: 'spellchecker spellcheckerlanguage | code wordcount' },
      table: { title: 'Tabela', items: 'inserttable | cell row column | tableprops deletetable' },
      help: { title: 'Me Ajuda', items: 'help' }
  },
  menubar: 'favs file edit view insert format tools table help image',
  content_css: 'css/content.css',
    
  // without images_upload_url set, Upload tab won't show up
  images_upload_url: 'upload.php',
  
  // override default upload handler to simulate successful upload
  images_upload_handler: function (blobInfo, success, failure) {
      var xhr, formData;
    
      xhr = new XMLHttpRequest();
      xhr.withCredentials = false;
      xhr.open('POST', 'upload.php');
    
      xhr.onload = function() {
          var json;
      
          if (xhr.status != 200) {
              failure('HTTP Error: ' + xhr.status);
              return;
          }
      
          json = JSON.parse(xhr.responseText);
      
          if (!json || typeof json.location != 'string') {
              failure('Invalid JSON: ' + xhr.responseText);
              return;
          }
      
          success(json.location);
      };
    
      formData = new FormData();
      formData.append('file', blobInfo.blob(), blobInfo.filename());
    
      xhr.send(formData);
  }
});
