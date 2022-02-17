@extends('layouts.app')
@section('content')
    <h3 class="page-title">Clientes</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('client.get.list') }}">Clientes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gerenciar Clientes</li>
        </ol>
    </nav>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Clientes Cadastrados</h4>
                <p class="card-description"> Lista os clientes cadastrados</code>
                </p>
                <table id="clients" class="table table-bordered" style="width:100%">
                    <thead class="p5 mt5">
                        <tr>
                            <th> # </th>
                            <th> Nome </th>
                            <th> CPF </th>
                            <th> E-mail </th>
                            <th> Detalhes </th>
                            <th> Editar </th>
                            <th> Deletar </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td> {{ $client->id }} </td>
                                <td> {{ $client->name }} </td>
                                <td> {{ $client->cpf }} </td>
                                <td> {{ $client->email }} </td>
                                <td class="text-center">

                                    <a href="{{ route('client.get.detail', $client->id) }}">
                                        <button class="btn btn-outline-primary btn-rounded btn-icon">
                                        <i class="mdi mdi-account-search-outline"></i>
                                        </button>
                                    </a>
                                </td>
                                <td class="text-center">

                                    <a href="{{ route('client.get.edit', $client->id) }}">
                                        <button class="btn btn-outline-warning btn-rounded btn-icon">
                                        <i class="mdi mdi-grease-pencil"></i>
                                        </button>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('client.put.deactive', $client->id) }}"
                                        method="POST">
                                        <button class="btn btn-outline-danger btn-rounded btn-icon">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                        @method('PUT')
                                        @csrf
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- toast -->

    @include('layouts.components.toast')

    <!-- toast end -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#clients').DataTable({
                "scrollX": true,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json'
                },
                "lengthMenu": [ 20, 40, 60, 80, 100 ]
            });
        });
    </script>
@endsection
