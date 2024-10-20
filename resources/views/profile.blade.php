@extends('layouts.template')
@section('content')
    <style>
        /* Gradient Background for the Card */
        .card {
            background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            padding: 40px 30px;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        /* Profile Image Design */
        .profile-image-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 10px;
            position: relative;
        }

        .profile-user-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #6c63ff;
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.1s ease-in-out;
        }

        .profile-user-img:hover {
            transform: scale(1.1);
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2);
        }

        /* Centering Choose File and Button */
        .ubah-foto-btn,
        .form-control-file {
            display: block;
            margin: 10px auto;
            text-align: center;
        }

        .ubah-foto-btn {
            background-color: #6c63ff;
            border: none;
            color: #fff;
            font-weight: 500;
            padding: 8px 16px;
            transition: background-color 0.3s ease;
            border-radius: 10px;
        }

        .ubah-foto-btn:hover {
            background-color: #5952db;
        }

        /* Typography and Information Styling */
        .profile-username {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            margin-top: 20px;
        }

        .text-muted {
            font-size: 1.2rem;
            font-weight: 300;
            color: #777;
        }

        /* List Style */
        .list-group-item {
            border: none;
            font-size: 1rem;
            color: #555;
            padding: 15px 0;
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #ddd;
        }

        /* Memastikan ukuran elemen menyesuaikan dengan border */
        * {
            box-sizing: border-box;
        }

        .list-group {
            border: 2px solid #6c63ff;
            /* Kotak ungu */
            border-radius: 3px;
            /* Membuat sudut melengkung */
            padding: 0;
            /* Menghapus padding tambahan di dalam */
            margin: 0;
            /* Hapus margin agar elemen putih menyatu dengan border */
        }

        .list-group-item {
            background-color: #fff;
            /* Latar belakang putih */
            padding: 15px;
            /* Atur padding agar nyaman */
            margin: 3px;
            /* Hapus margin agar elemen sesuai dengan kotak */
            border-bottom: 1px solid #ddd;
            /* Garis pembatas antar item */
        }

        .list-group-item:last-child {
            border-bottom: none;
            /* Menghapus garis di bawah item terakhir */
        }


        /* Button Design */
        .btn-primary {
            background-color: #6c63ff;
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #5752d3;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-3px);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .profile-user-img {
                width: 120px;
                height: 120px;
            }

            .profile-username {
                font-size: 1.5rem;
            }

            .text-muted {
                font-size: 1rem;
            }
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card-primary card-outline text-center">
                    <div class="card-body box-profile">
                        <div class="profile-image-container">
                            <img class="profile-user-img img-fluid"
                                @if (file_exists(public_path(
                                            'storage/uploads/profile_pictures/' .
                                                auth()->user()->username .
                                                '/' .
                                                auth()->user()->username .
                                                '_profile.png'))) src="{{ asset('storage/uploads/profile_pictures/' . auth()->user()->username . '/' . auth()->user()->username . '_profile.png') }}"
                                @elseif (file_exists(public_path(
                                            'storage/uploads/profile_pictures/' .
                                                auth()->user()->username .
                                                '/' .
                                                auth()->user()->username .
                                                '_profile.jpg'))) 
                                    src="{{ asset('storage/uploads/profile_pictures/' . auth()->user()->username . '/' . auth()->user()->username . '_profile.jpg') }}"
                                @elseif (file_exists(public_path(
                                            'storage/uploads/profile_pictures/' .
                                                auth()->user()->username .
                                                '/' .
                                                auth()->user()->username .
                                                '_profile.jpeg'))) 
                                    src="{{ asset('storage/uploads/profile_pictures/' . auth()->user()->username . '/' . auth()->user()->username . '_profile.jpeg') }}"
                                @else
                                    src="https://via.placeholder.com/150" @endif
                                alt="User profile picture">

                            <form action="{{ route('upload.foto') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" id="upload_foto" name="foto" accept="image/*"
                                    class="form-control-file">
                                <button type="submit" class="btn ubah-foto-btn">Ubah Foto</button>
                            </form>
                        </div>

                        <h3 class="profile-username">{{ auth()->user()->nama }}</h3>
                        <p class="text-muted">{{ auth()->user()->level->level_nama }}</p>

                        <!-- Adding border around the list -->
                        <div class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Username</b> <span>{{ auth()->user()->username }}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Nama</b> <span>{{ auth()->user()->nama }}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Tingkat Level</b> <span>{{ auth()->user()->level->level_nama }}</span>
                            </li>
                        </div>

                        <a href="{{ url('/') }}" class="btn btn-primary"><b>Kembali</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
