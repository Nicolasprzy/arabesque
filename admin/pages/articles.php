<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - École de Danse Arabesque</title>
    <link rel="stylesheet" href="adminCss/articles.css">
    <!-- Include stylesheet quill -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
</head>
<body>
  <div class="essai">
  <?php
      include 'pages/header.php';
  ?>

  <div class="container">
      <!-- Create the editor container -->
      <div class="editor-container">
          <div class="editor" id="editor"></div>
      </div>
  </div>
</div>
  <!-- Include the Quill library -->
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

  <!-- Initialize Quill editor -->
  <script>

const toolbarOptions = [
  ['bold', 'italic', 'underline'],        // toggled buttons
  ['blockquote'],
  ['link', 'image', 'video'],

  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent

  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'align': [] }],

  ['clean']                                         // remove formatting button
];
  const quill = new Quill('#editor', {
  modules: {
    toolbar: toolbarOptions
  },
  placeholder: 'Ecris ton article',
  theme: 'snow', // or 'bubble'
});
</script>
</body>