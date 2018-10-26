@extends('layout.layout')

@section('title', 'LMMS Companies')
@section('sub-title', "LIST ALL COMPANIES")

@section('content')
    <div class=" col-md-12">
        <form class="form-horizontal" action="{{ route('company.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="company_name" class="col-sm-3 control-label">Company Name</label>
                <div class="col-sm-6">
                    <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Company Name" value="{{ old('company_name') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="company_phone" class="col-sm-3 control-label">Company Phone</label>
                <div class="col-sm-6">
                    <input type="text" name="company_phone" class="form-control" id="company_phone" placeholder="Company Phone" value="{{ old('company_phone') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="client_name" class="col-sm-3 control-label">Client Name</label>
                <div class="col-sm-6">
                    <input type="text" name="company_client_name" class="form-control" id="client_name" placeholder="Client Name" value="{{ old('client_name') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="client_phone" class="col-sm-3 control-label">Client Phone</label>
                <div class="col-sm-6">
                    <input type="text" name="company_client_phone" class="form-control" id="client_phone" placeholder="Client Phone" value="{{ old('client_phone') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="company_email" class="col-sm-3 control-label">Company Email</label>
                <div class="col-sm-6">
                    <input type="email" name="company_email" class="form-control" id="company_email" placeholder="Company Email" value="{{ old('company_email') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="company_ip_address" class="col-sm-3 control-label">Company IP Address</label>
                <div class="col-sm-6">
                    <input type="text" name="company_ip_address" class="form-control" id="company_ip_address" placeholder="Company IP Address" value="{{ old('company_ip_address') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="google_plus_email" class="col-sm-3 control-label">Google+ Email</label>
                <div class="col-sm-6">
                    <input type="email" name="company_google_email" class="form-control" id="google_plus_email" placeholder="Google+ Email" value="{{ old('google_plus_email') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="google_plus_password" class="col-sm-3 control-label">Google+ Password</label>
                <div class="col-sm-6">
                    <input type="text" name="company_google_password" class="form-control" id="google_plus_password" placeholder="Google+ Password" value="{{ old('google_plus_password') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="company_notes" class="col-sm-3 control-label">Company Notes:</label>
                <div class="col-sm-6">
                    <textarea class="form-control" rows="3" name="company_notes" id="company_notes" placeholder="Company Notes"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="hidden" name="marketing" value="0">
                            <input type="checkbox" name="marketing" value="1"> <b>Marketing</b>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="levels_id" class="col-sm-3 control-label">Level Type</label>
                <div class="col-sm-6">
                    <select class="form-control" name="levels_id">
                        @foreach($levels as $level)
                            <option value="{{ $level->id }}" @if($level->id == 3) selected @endif>{{ $level->level_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="well">
                <div class="form-group">
                    <label for="smtp_host" class="col-sm-3 control-label">SMTP Host</label>
                    <div class="col-sm-6">
                        <input type="text" name="smtp_host" class="form-control" id="smtp_host" placeholder="SMTP Host" value="{{ old('smtp_host') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="smtp_user" class="col-sm-3 control-label">SMTP User</label>
                    <div class="col-sm-6">
                        <input type="text" name="smtp_user" class="form-control" id="smtp_user" placeholder="SMTP User" value="{{ old('smtp_user') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="smtp_password" class="col-sm-3 control-label">SMTP Password</label>
                    <div class="col-sm-6">
                        <input type="text" name="smtp_password" class="form-control" id="smtp_password" placeholder="SMTP Password" value="{{ old('smtp_password') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="smtp_port" class="col-sm-3 control-label">SMTP Port</label>
                    <div class="col-sm-6">
                        <input type="text" name="smtp_port" class="form-control" id="smtp_port" placeholder="SMTP Port" value="{{ old('smtp_port') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="smtp_secure" class="col-sm-3 control-label">SMTP Secure Type</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="smtp_secure">
                            <option value="tls">TLS</option>
                            <option value="ssl">SSL</option>
                        </select>
                    </div>
                </div>
            </div>

            <input type="hidden" value="0" name="request_level_id">
            <input type="hidden" value="0" name="request_level_date">
            <input type="hidden" value="0" name="request_approved">

            <div class="form-group col-sm-6">
                <div class="row">
                    <div class="col-sm-6">
                        <button class="btn btn-default">Reset form</button>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success">Add Company</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection