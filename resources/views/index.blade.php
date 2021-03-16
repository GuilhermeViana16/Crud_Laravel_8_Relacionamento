@extends('templates.template')

@section('content')
    <h1 class="text-center">Crud</h1> <hr>

    <div class="text-center mt-3 mb-4">
        <a href="{{url('books/create')}}">
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>

    <div class="col-8 m-auto table-responsive">
        @csrf
        <table class="table table-hover text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Título</th>
                <th scope="col">Autor</th>
                <th scope="col">Preço</th>
                <th scope="col">Visualizar</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
            </thead>
            <tbody>
                @foreach($book as $books)
                    @php
                        $user = $books -> find($books -> id) -> relUsers;
                    @endphp            
                    <tr>
                        <th scope="row">{{ $books->id }}</th>
                        <td>{{ $books -> title }}</td>
                        <td>{{ $user -> name }}</td>
                        <td>{{ $books -> price }}</td>
                        <td>
                            <a href="{{url("books/$books->id")}}">
                                <button class="btn btn-dark"><i class="fa fa-eye"></i></button>
                            </a>
                        </td>
                        <td>
                            <a href="{{url("books/$books->id/edit")}}">
                                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                            </a>
                        </td>
                        <td>
                            <a href="{{url("books/$books->id")}}" class="js-del">
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{$book->links("pagination::bootstrap-4")}}
        </div> 
    </div>
@endsection