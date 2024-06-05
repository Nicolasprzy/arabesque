<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Article - École de Danse Arabesque</title>
    <link rel="stylesheet" href="adminCss/articles.css">
    <link rel="stylesheet" href="adminCss/style.css">
    <!-- Include stylesheet quill -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

</head>

<body>

    <?php include 'pages/header.php'; ?>
    <main>
        <div class="container">
            <h1>Créer un Article</h1>
            <form id="articleForm" action="index.php?page=save_article" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Titre de l'Article</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="category">Catégorie de l'Article</label>
                    <select id="category" name="category" required>
                        <option value="categorie1">Catégorie 1</option>
                        <option value="categorie2">Catégorie 2</option>
                        <option value="categorie3">Catégorie 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="headerImage">Image d'Entête</label>
                    <input type="file" id="headerImage" name="headerImage" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="content">Contenu de l'Article</label>
                    <div id="editor" style="height: 300px;"></div>
                    <textarea name="content" id="content" style="display:none;"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Créer l'Article</button>
                </div>
            </form>
        </div>
    </main>
    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: {
                container: [
                    ['bold', 'italic', 'underline'], // toggled buttons
                    ['blockquote'],
                    ['link', 'image', 'video'],
                    [{
                        'header': 1
                    }, {
                        'header': 2
                    }], // custom button values
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }, {
                        'list': 'check'
                    }],
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }], // outdent/indent
                    [{
                        'size': ['small', false, 'large', 'huge']
                    }], // custom dropdown
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }], // dropdown with defaults from theme
                    [{
                        'align': []
                    }],
                    ['clean']
                ],
                handlers: {
                    'image': function() {
                        const input = document.createElement('input');
                        input.setAttribute('type', 'file');
                        input.setAttribute('accept', 'image/*');
                        input.click();

                        input.onchange = () => {
                            const file = input.files[0];
                            if (file) {
                                const formData = new FormData();
                                formData.append('image', file);

                                fetch('upload_image.php', {
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.json())
                                    .then(result => {
                                        const range = quill.getSelection();
                                        quill.insertEmbed(range.index, 'image', result.filePath);
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                    });
                            }
                        };
                    }
                }
            }
        }
    });

    document.getElementById('articleForm').onsubmit = function() {
        // Retrieve the content from the editor
        var content = document.querySelector('textarea[name=content]');
        content.value = quill.root.innerHTML;
    };
    </script>
</body>

</html>