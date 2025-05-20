@extends('layouts.main_layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col">

                <div class="row mb-3 align-items-center">
                    <div class="col">
                        <a href="{{ route('paginainicialdohomem') }}">
                            <img src="assets/images/logo.png" alt="Notes logo">
                        </a>
                    </div>
                    <div class="col text-center">
                        A simple <span class="text-warning">Laravel</span> project!
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-end align-items-center">
                            <span class="me-3"><i class="fa-solid fa-user-circle fa-lg text-secondary me-3"></i>[username]</span>
                            <a href="{{route('logout')}}" class="btn btn-outline-secondary px-3">
                                Logout<i class="fa-solid fa-arrow-right-from-bracket ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- no notes available -->
                @if(count($notes) == 0 )
                <div class="row mt-5">
                    <div class="col text-center">
                        <p class="display-6 mb-5 text-secondary opacity-50">You have no notes available!</p>
                        <a href="{{route('criandohorrores')}}" class="btn btn-secondary btn-lg p-3 px-5">
                            <i class="fa-regular fa-pen-to-square me-3"></i>Create Your First Note
                        </a>
                    </div>
                </div>

                @else

                <!-- notes are available -->
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{route('criandohorrores')}}" class="btn btn-secondary px-3">
                        <i class="fa-regular fa-pen-to-square me-2"></i>New Note
                    </a>
                </div>

                @foreach($notes as $note)
                    @include('note')
                @endforeach

                @endif
            </div>
        </div>
    </div>
@endsection

