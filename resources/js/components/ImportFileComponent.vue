<template>
    <div class="card">
        <div class="card-header">CSV Import</div>

        <div class="card-body">
            <form
                class="form-horizontal py-3"
                method="POST"
                action="{{ route('import_parse') }}"
                enctype="multipart/form-data"
            >
                <div
                    class="row form-group {{ $errors->has('csv_file') ? ' has-error' : '' }}"
                >
                    <label for="csv_file" class="col-md-12"
                        >CSV file to import</label
                    >
                    <input type="hidden" name="order_id" value="{{ $id }}" />
                    <div class="col-md-6 py-3">
                        <input
                            id="csv_file"
                            type="file"
                            class="form-control"
                            name="csv_file"
                            required
                        />
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- <div class="card-body">
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
        </div> -->
    </div>
</template>

<script>
export default {

    data() {
        return {
            file: null,
        };
    },
    methods: {},
};
</script>
