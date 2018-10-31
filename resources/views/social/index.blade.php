@extends('layout.layout')

@section('title', 'LMMS Companies')
@section('sub-title')
    PROFILE - LIST ALL COMPANIES
@endsection

@section('content')

    <div class="company">
        <table class="table table-hover table-bordered table-responsive" id="company-dataTables">
            <thead>
            <tr class="table-header">
                <td>#</td>
                <td>Company Name</td>
                <td>Profiles</td>
                <td>Profile Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $company->company_name }}</td>
                    <!-- Profiles -->
                    <td>
                        {{ count($company->socials) }}
                    </td>
                    <!-- Profile Action -->
                    <td>
                        <a href="{{ route('social-profile.show', $company) }}" class="btn btn-xs btn-success btn-action">Manage Profile</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $companies->links() }}
@endsection
