
@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ "Pregled sadnica" }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($seedlings as $seedling)
                        <div class="card" style="width: 18rem;">
                            <img src="{{url('storage/uploads/seedlings/'.$seedling->cover_image)}}" width="300px" height="300px" class="card-img-top" alt="{{  $seedling->name }}">
                            <div class="card-body">
                              <h5 class="card-title">{{ $seedling->name }}</h5>
                              <a href="{{ url('seedlings/' . $seedling->id) }}" class="btn btn-primary">Pogledaj</a>
                              @can('edit-users')
                              <a href="{{ url('seedlings/' . $seedling->id) }}" class="btn btn-warning">Uredi</a>
                              @endcan
                              @can('delete-users')

                              <form action="{{ route('seedlings.destroy', $seedling) }}" method="POST"
                              class="float-right">
                        @csrf
                        {{ method_field('DELETE') }}

                        <!-- in blade -->
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    style="margin-left: 5px" data-target="#sed{{$seedling->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-minus" viewBox="0 0 16 16">
                                    <path d="M.5 3l.04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
                                    <path d="M11 11.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                                </svg> Izbri??i
                            </button>

                            <div class="modal fade" id="sed{{$seedling->id}}" tabindex="-1"
                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> Potvrtite
                                                radnju</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Jeste li sigurni da ??elite izbrisati
                                            stavku - {{ $seedling->name }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Odustani
                                            </button>
                                            <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-minus" viewBox="0 0 16 16">
                                                    <path d="M.5 3l.04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
                                                    <path d="M11 11.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                                                </svg> Izbri??i
                                                kategoriju
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                        @endcan



                            </div>
                          </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
