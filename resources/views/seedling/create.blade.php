@extends('layouts.app')


@section('content')
    <div class="container">
       <div class="text-center">
            <a href="" class="button secondary">Nazad</a>
        </div>
    <hr>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" class="text-center">{{ 'Unesite novu sadnicu' }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">

                            <form class="form-horizontal" method="POST" action="{{ route('seedlings.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group" >
                                    <label for="name" class="col-12">Naziv:</label>
                                    <div class="col-12">
                                        <input id="name" type="text" class="form-control" name="name" placeholder="Puni naziv sadnice" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="col-12">Opis:</label>
                                    <div class="col-12">
                                        <input id="description" type="text" class="form-control" name="description" placeholder="Opis sadnice" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="type" class="col-12">Tip (kategorija):</label>
                                    <div class="col-12">
                                        <input id="type" type="text" class="form-control" name="type" placeholder="Kojoj kategoriji sadnica pripada" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="cover_image" class="col-12">Fotografija:</label>
                                    <div class="col-12">
                                        <input id="cover_image" type="file" class="form-control" name="cover_image" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary" value="Create">
                                            Unesi
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div> </div>

                </div>
            </div>
        </div>


@endsection



