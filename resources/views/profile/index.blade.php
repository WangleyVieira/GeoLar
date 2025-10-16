@extends('layout.main')

@section('content')

    <style>
        .error{
            color:red
        }
        input[type='file'] {
            display: none;
        }
        /* .max-width {
            max-width: 500px;
            width: 100%;
        } */
        #imgPhoto {
            margin-top: 5%;
            /* width: 100%;
            height: 100%; */
            /* padding:10px; */
            background-color: #eee;
            border: 5px solid #ccc;
            border-radius: 50%;
            cursor: pointer;
            transition: background .3s;
        }
        #imgPhoto:hover{
            background-color: rgb(180, 180, 180);
            border: 5px solid #111;
        }

    </style>

    @include('sweetalert::alert')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Atualizar Perfil</h4>
        </div>
        <div class="card-body">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row">
                    <!-- Seção da Imagem -->
                    <div class="col-md-4 text-center">
                        <div class="imageContainer">
                            <span>Clique na imagem para alterar</span>
                            <div class="mb-3">
                                @if ($hasPhoto == 1)
                                    @php
                                        $path = storage_path('app/public/profile-photo/'.$photo->name_hash);
                                        if (File::exists($path)){
                                            $base64 = base64_encode(file_get_contents($path));
                                            $src = 'data:image/png;base64,' . $base64;
                                        }
                                    @endphp
                                    @if (isset($src))
                                        <img src="{{ $src }}" class="img-fluid rounded-circle mb-3" width="240" height="240" alt="Imagem de perfil" id="imgPhoto">
                                    @else
                                        <img src="{{ asset('img/user-avatar2.png') }}" class="img-fluid rounded-circle mb-3" width="240" height="240" alt="Imagem de perfil" id="imgPhoto">
                                    @endif
                                @else
                                    <img src="{{ asset('img/user-avatar2.png') }}" class="img-fluid rounded-circle mb-3" width="240" height="240" alt="Imagem de perfil" id="imgPhoto">
                                @endif
                                <input type="file" id="flImage" name="fImage" accept="image/jpg, image/jpeg, image/png" class="form-control @error('fImage') is-invalid @enderror">
                                @error('fImage')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Nome</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-left mt-4">
                    <button type="submit" class="submit-button btn btn-primary m-1"><i class="fas fa-save"></i>&nbsp Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        //código referente a foto de perfil
        let photo = document.getElementById('imgPhoto');
        console.log(photo);

        let file = document.getElementById('flImage');

        photo.addEventListener('click', () => {
            file.click();
        });

        file.addEventListener('change', () => {

            if (file.files.length <= 0) {
                return;
            }

            let reader = new FileReader();

            reader.onload = () => {
                photo.src = reader.result;
            }

            reader.readAsDataURL(file.files[0]);
        });
    </script>
@endsection

