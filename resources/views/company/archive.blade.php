@extends('layout.layout')

@section('title', 'LMMS Companies')
@section('sub-title')
    LIST ALL COMPANIES
@endsection
@section('sub-title-button')
    <a href="{{ route('company.create') }}" class="add-btn btn pull-right btn-sm btn-warning">
        Add New Company
    </a>
@endsection

@section('content')

    <div class="company">
        <table class="table table-hover table-bordered table-responsive" id="company-dataTables">
            <thead>
            <tr class="table-header">
                <td>#</td>
                <td>Company Name</td>
                <td>User</td>
                <td>Company Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $company->company_name }}</td>
                    <td></td>
                    <!-- Company Action -->
                    <td>
                        @include('company.includes.recover')
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $companies->links() }}
@endsection
