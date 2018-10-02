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
            @foreach($offices as $office)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><b>{{ $office->company->company_name }}</b>: {{ $office->office_name}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $offices ->links() }}

@endsection