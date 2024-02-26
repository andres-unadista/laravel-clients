@include('clients.clients')
@extends('home')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <!-- Modal trigger button -->
            <button type="button" class="btn btn-primary btn-lg my-3" title="Crear" data-bs-toggle="modal"
                data-bs-target="#createClient">
                <i class="bi bi-person-plus"></i>
            </button>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($clients as $client)
                            <tr class="">
                                <td scope="row">{{ $client['name'] }}</td>
                                <td>{{ ucfirst($client['email']) }}</td>
                                <td>{{ $client['phone'] }}</td>
                                <td class="d-flex align-items-center justify-content-center">
                                    <button type="button" class="btn btn-primary" title="Editar" data-bs-toggle="modal"
                                        data-bs-target="#editClient{{ $client['id'] }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <form class="m-0 mx-1" action="{{ route('client.destroy', $client['id']) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Eliminar">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @include('clients.info')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
