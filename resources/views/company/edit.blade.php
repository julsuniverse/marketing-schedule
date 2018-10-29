@extends('layout.layout')

@section('title', 'LMMS Companies')
@section('sub-title', "UPDATE / VIEW COMPANY")
@section('sub-title-button')
    <a href="{{ route('company.index') }}" class="add-btn btn pull-right btn-sm btn-warning">
        View All Companies
    </a>
@endsection

@section('content')
    <div class=" col-md-12">
        @include('company.includes.form')
    </div>

@endsection