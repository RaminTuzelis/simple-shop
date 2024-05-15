<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/theme/css/vendor/bootstrap.min.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('assets/theme/css/vendor/font.awesome.min.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('assets/theme/css/plugins/slick.min.css') }}" defer>
    <link rel="stylesheet" href="{{ asset('assets/theme/css/style.css?v=1.10') }}" defer>
    <link rel="stylesheet" href="{{ asset('assets/theme/css/custom.css?v=1.10') }}" defer>
    <style>
        .upload-area {
            border: 2px dashed #ccc;
            height: 150px;
            width: 100%;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            cursor: pointer;
        }

        .upload-area .drag-area {
            text-align: center;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .upload-area .drag-area span {
            margin: 10px 0;
        }

        .upload-area .drag-area .icon {
            font-size: 48px;
            color: #ccc;
        }

        .upload-area .drag-area header {
            font-weight: bold;
            text-transform: uppercase;
        }

        .upload-area .drag-area button {
            padding: 10px 20px;
            cursor: pointer;
            background-color: #dc3545;
            opacity: 0.8;
        }

        .upload-area .drag-area button:hover {
            opacity: 1;
        }

        .upload-area:hover {
            background-color: #f8f8f8;
        }

        #comment {
            width: 100%;
            min-height: 150px;
            padding: 10px;
            box-sizing: border-box;
            resize: none;
        }
        .custom-icon {
            width: 90px;
            height: auto;
            margin-bottom: 5px;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dropzone = document.getElementById('dropzone');
            var fileInput = document.getElementById('upload_file');
            var dragArea = dropzone.querySelector('.drag-area');

            dragArea.querySelector('button').addEventListener('click', function(e) {
                e.preventDefault();
                fileInput.click();
            });

            fileInput.addEventListener('change', function() {
                if (this.files.length > 0) {
                    dragArea.querySelector('header').textContent = `Selected file: ${this.files[0].name}`;
                }
            });

            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropzone.addEventListener(eventName, function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }, false);
            });

            ['dragenter', 'dragover'].forEach(eventName => {
                dropzone.addEventListener(eventName, function() {
                    dropzone.classList.add('highlight');
                }, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropzone.addEventListener(eventName, function() {
                    dropzone.classList.remove('highlight');
                }, false);
            });

            dropzone.addEventListener('drop', function(e) {
                var dt = e.dataTransfer;
                var files = dt.files;

                fileInput.files = files;
                dragArea.querySelector('header').textContent = `Selected file: ${files[0].name}`;
            });
        });

    </script>
</head>
<body class="antialiased">
<div class="shop-main-area">
    <div class="container container-default custom-area">
        <div class="container">
            <form action="{{ url('/submit-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row my-4">
                    <h4>Pateikti užklausa</h4>
                </div>

                <div class="row align-items-end">
                    <div class="col-sm">
                        <div class="input-group input-group-sm mb-3">
                            <label for="paper_cups_size" class="col-sm-2 col-form-label">Dydis: </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="text-center mb-2">
                            <img src="{{ asset('storage/popieriniai.png') }}" class="custom-icon">
                            Popieriniai puodeliai
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" id="paper_cups_size"
                                   name="paper_cups_size" class="form-control"
                                   placeholder="Nurodykite dydį">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="text-center mb-2">
                            <img src="{{ asset('storage/popieriniai.png') }}" class="custom-icon">
                            Plastikiniai puodeliai
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" id="plastic_cups_size"
                                   name="plastic_cups_size" class="form-control"
                                   placeholder="Nurodykite dydį">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="text-center mb-2">
                            <img src="{{ asset('storage/skaidrus-puodeliai.png') }}" class="custom-icon">
                            Skaidrūs puodeliai
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" id="transparent_cups_size"
                                   name="transparent_cups_size" class="form-control"
                                   placeholder="Nurodykite dydį">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="text-center mb-2">
                            <img src="{{ asset('storage/daugkartiniai-copy.png') }}" class="custom-icon">
                            Daugkartiniai puodeliai
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" id="reusable_cups_size"
                                   name="reusable_cups_size" class="form-control"
                                   placeholder="Nurodykite dydį">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="text-center mb-2">
                            <img src="{{ asset('storage/maiseliai-be-rankenu.png') }}" class="custom-icon">
                            Maišeliai be rankenų
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" id="paper_bags_no_handle_size"
                                   name="paper_bags_no_handle_size" class="form-control"
                                   placeholder="Nurodykite dydį">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="text-center mb-2">
                            <img src="{{ asset('storage/maiseliai-su-rankenomis.png') }}" class="custom-icon">
                            Maišeliai su rankenomis
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" id="paper_bags_size"
                                   name="paper_bags_size" class="form-control"
                                   placeholder="Nurodykite dydį">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="text-center mb-2">
                            <img src="{{ asset('storage/picu-dezes.png') }}" class="custom-icon">
                            Picų dėžės
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" id="pizza_box_size"
                                   name="pizza_box_size" class="form-control"
                                   placeholder="Nurodykite dydį">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="text-center mb-2">
                            <img src="{{ asset('storage/kitos.png') }}" class="custom-icon">
                             Kitos dėžutės
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" id="other_size"
                                   name="other_size" class="form-control"
                                   placeholder="Nurodykite dydį">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="input-group input-group-sm mb-3">
                            <label for="paper_cups_quantity" class="col-sm-2 col-form-label">Kiekis: </label>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" id="paper_cups_quantity"
                                   name="paper_cups_quantity" class="form-control" placeholder="Nurodykite kiekį">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" id="plastic_cups_quantity"
                                   name="plastic_cups_quantity" class="form-control" placeholder="Nurodykite kiekį">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" id="transparent_cups_quantity"
                                   name="transparent_cups_quantity" class="form-control" placeholder="Nurodykite kiekį">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" id="reusable_cups_quantity"
                                   name="reusable_cups_quantity" class="form-control" placeholder="Nurodykite kiekį">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" id="paper_bags_no_handle_quantity"
                                   name="paper_bags_no_handle_quantity" class="form-control" placeholder="Nurodykite kiekį">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" id="paper_bags_quantity"
                                   name="paper_bags_quantity" class="form-control" placeholder="Nurodykite kiekį">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" id="pizza_box_quantity"
                                   name="pizza_box_quantity" class="form-control" placeholder="Nurodykite kiekį">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" id="other_quantity"
                                   name="other_quantity" class="form-control" placeholder="Nurodykite kiekį">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="company_name">Įmonės pavadinimas</label>
                            <input class="form-control" name="company_name">
                            @error('company_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="contact">Kaip galėtumėme su Jumis susisiekti?</label>
                            <input class="form-control" name="contact" placeholder="Įrašykite kontaktą">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="exampleInputEmail1">El. Paštas</label>
                            <input class="form-control" name="email" type="email">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefonas</label>
                            <input class="form-control" name="phone">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="comment">Komentaras</label>
                            <textarea id="comment" name="comment" class="form-control" placeholder="Neprivalomas komentaras apie poreikius" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-sm">
                        <label for="upload_file">Prisegti logo ar maketą</label>
                        <div class="upload-area" id="dropzone">
                            <input type="file" id="upload_file" name="upload_file" class="form-control-file" hidden>
                            <div class="drag-area">
                                <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                <header>Vilkite ir numeskite, kad įkeltumėte failą</header>
                                <span>Arba</span>
                                <button class="btn btn-danger">Naršyti failą</button>
                            </div>
                        </div>
                    </div>
                </div>
                <row class="row mt-3">
                    <div class="form-check">
                        <input class="form-check-input" id="terms" name="terms" type="checkbox">
                        <label class="form-check-label" for="terms">
                            Sutinku, su asmens duomenų tvarkymo taisyklėmis ir privatumo politika
                        </label>
                    </div>
                </row>
                <row class="row mt-3">
                    <button type="submit" class="no-touch btn obrien-button primary-btn">
                        <p>Siųsti užklausą</p>
                    </button>
                </row>
            </form>
        </div>
    </div>
</div>
</body>
</html>
