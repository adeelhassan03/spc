// Simple Tiny MCE
tinymce.init({
  selector: ".tinymce_simple",
  theme: "modern",
  height: 80,
  menubar: false,
  statusbar: false,
  plugins: [
    "autolink link image lists hr anchor pagebreak spellchecker",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "save table contextmenu directionality template paste textcolor",
  ],
  toolbar:
    "undo redo styleselect bold italic alignleft aligncenter alignright alignjustify bullist numlist link image preview fullpage forecolor",
  image_advtab: true, // Enable advanced image dialog
  paste_data_images: true, // Allow pasting images from clipboard
  file_picker_callback: function(callback, value, meta) {
    if (meta.filetype === 'image') {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');
      input.onchange = function() {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function() {
          callback(this.result, {
            alt: file.name
          });
        };
        reader.readAsDataURL(file);
      };
      input.click();
    }
  },
});


// Advance Tiny MCE
tinymce.init({
  selector: ".tinymce_advance",
  theme: "modern",
  height: 150,
  plugins: [
    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "save table contextmenu directionality emoticons template paste textcolor code",
  ],
  toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  toolbar2: "print preview media fullpage | forecolor backcolor emoticons | code | imagealignleft imagealigncenter imagealignright",
  setup: function(editor) {
    editor.addButton('imagealignleft', {
      icon: 'alignleft',
      tooltip: 'Align image left',
      onclick: function() {
        editor.execCommand('JustifyLeft');
      },
      stateSelector: 'img'
    });

    editor.addButton('imagealigncenter', {
      icon: 'aligncenter',
      tooltip: 'Align image center',
      onclick: function() {
        editor.execCommand('JustifyCenter');
      },
      stateSelector: 'img'
    });

    editor.addButton('imagealignright', {
      icon: 'alignright',
      tooltip: 'Align image right',
      onclick: function() {
        editor.execCommand('JustifyRight');
      },
      stateSelector: 'img'
    });
  },
  image_advtab: true,
  paste_data_images: true,
  file_picker_callback: function(callback, value, meta) {
    if (meta.filetype === 'image') {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');
      input.onchange = function() {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function() {
          callback(this.result, {
            alt: file.name
          });
        };
        reader.readAsDataURL(file);
      };
      input.click();
    }
  },
});


