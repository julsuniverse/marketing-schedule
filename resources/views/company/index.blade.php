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
                <td>Marketing</td>
                <td>Reviews</td>
                <td>View User</td>
                <td>Social Profile</td>
                <td>Office</td>
                <td>Company Action</td>
            </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $company->company_name }}</td>
                        <!-- Marketing -->
                        <td>
                            <marketing-toogle
                                    :company_id="{{ $company->id }}"
                                    :marketing="{{ $company->marketing }}"
                            ></marketing-toogle>
                        </td>
                        <!-- Reviews -->
                        <td>
                            {{ $company->count_reviews }}
                        </td>
                        <!-- View User -->
                        <td>
                            @if(count($company->users) > 0)
                                @foreach($company->users as $user)
                                    <a href="#" class="text-info">
                                        {{ $user->user_name }}
                                    </a>
                                @endforeach
                            @else
                                <small>
                                    <em>no user</em>
                                </small>
                            @endif
                        </td>
                        <!-- Social Profile -->
                        <td></td>
                        <!-- Office -->
                        <td></td>
                        <!-- Company Action -->
                        <td>
                            <a href="{{ route('company.edit', $company) }}" class="btn btn-xs btn-success fa fa-pencil btn-action"></a>
                            @include('company.includes.delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $companies->links() }}
@endsection
