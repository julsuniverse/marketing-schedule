@extends('layout.layout')

@section('title', 'LMMS Marketing')
@section('sub-title', 'Marketing')

@section('content')
    <table class="table table-hover table-bordered table-responsive" id="marketing-dataTables">
        <thead>
        <tr class="table-header">
            <th>#</th>
            <th>Company</th>
            <th>Traffic</th>
            <th>Calls</th>
            <th>Forms</th>
            <th>Pages</th>
            <th>Posts</th>
            <th>Citations</th>
            <th>PR</th>
            <th>Reviews</th>
            <th>Text/Emails</th>
            <th>Report</th>
        </tr>
        </thead>
        <tbody>
            @foreach($marketings as $marketing)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $marketing->company->company_name }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        @php
                            $count = 0;
                            foreach ($marketing->company->offices as $office) {
                                $count += $office->reviews->count();
                            }
                        @endphp
                        {{ $count }}
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $marketings->links() }}

@endsection