@extends('layout.layout')

@section('title', 'LMMS Companies')
@section('sub-title')
    LIST ALL SOCIAL PROFILES FOR "{{ $company->company_name }}"
@endsection
@section('sub-title-button')
    <a href="{{ route('social-profile.create', $company) }}" class="add-btn btn pull-right btn-sm btn-warning">
       Add Profile
    </a>
@endsection

@section('content')

    <div class="company">
        <table class="table table-hover table-bordered table-responsive" id="company-dataTables">
            <thead>
            <tr class="table-header">
                <td>#</td>
                <td>Social Site</td>
                <td>URL</td>
                <td>Username</td>
                <td>Password</td>
                <td>Profile Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($socials as $social)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <!-- Social Site -->
                    <td>{{ $social->company_social_profile_account_name }}</td>
                    <!-- URL -->
                    <td>
                        {{ $social->company_social_profile_account_url }}
                    </td>
                    <!-- Username -->
                    <td>
                        {{ $social->company_social_profile_account_username }}
                    </td>
                    <!-- Password -->
                    <td>
                        {{ $social->company_social_profile_account_password }}
                    </td>
                    <!-- Profile Action -->
                    <td>
                        <a href="{{ route('social-profile.edit', ['social_profile' => $social]) }}" class="btn btn-xs btn-success fa fa-pencil btn-action"></a>
                        @include('social.includes.delete')
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
