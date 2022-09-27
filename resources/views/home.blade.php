@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-bordered mb-5">
                            <thead>
                                <tr class="table-success">
                                    <th scope="col">#</th>
                                    <th scope="col">type</th>
                                    <th scope="col">url</th>
                                    <th scope="col">parameters</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $order['id'] }}</th>
                                        <td>{{ $order['type'] }}</td>
                                        <td><a href="{{ $order['url'] }}" target="_blank">{{ $order['url'] }}</a></td>
                                        <td>{{ $order['parameters'] }}</td>
                                        <td><a href="{{ route('import', ['id' => $order['id']]) }}" target="_blank">import
                                                group</a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
