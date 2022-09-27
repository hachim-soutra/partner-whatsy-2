@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">CSV Import</div>

                    <div class="card-body">
                        <form class="form-horizontal py-3" method="POST" action="{{ route('import_parse', ['id' => $id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @if (count($errors) > 0)
                                <div class="row">

                                    <div class="col-md-8 col-md-offset-1">

                                        <div class="alert alert-danger alert-dismissible">

                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">×</button>

                                            <h4><i class="icon fa fa-ban"></i> Error!</h4>

                                            @foreach ($errors->all() as $error)
                                                {{ $error }} <br>
                                            @endforeach

                                        </div>

                                    </div>

                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-1">
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">×</button>
                                            <h5>{!! Session::get('success') !!}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row form-group {{ $errors->has('csv_file') ? ' has-error' : '' }}">
                                <label for="csv_file" class="col-md-12">CSV file to import</label>
                                <div class="col-md-12 py-3">
                                    <input id="csv_file" type="file" class="form-control" name="csv_file" required />
                                    <button type="submit" class="btn btn-primary mt-3">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="card-body">
                        <table class="table table-bordered mb-5">
                            <thead>
                                <tr class="table-success">
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $group)
                                    <tr>
                                        <th scope="row">{{ $group->id }}</th>
                                        <td>{{ $group->name }}</td>
                                        <td>{{ $group->phone }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $groups->links() !!}
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
