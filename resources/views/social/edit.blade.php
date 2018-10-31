@extends('layout.layout')

@section('title', 'LMMS Companies')
@section('sub-title')
    UPDATE / VIEW SOCIAL PROFILE FOR "{{ $social->company->company_name }}"
@endsection
@section('sub-title-button')
    <a href="{{ route('social-profile.show', $social->company) }}" class="add-btn btn pull-right btn-sm btn-warning">
        View All Profiles
    </a>
@endsection

@section('content')
    @include('social.includes.form')
@endsection
