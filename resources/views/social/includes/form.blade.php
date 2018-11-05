<form class="form-horizontal" action="{{ isset($social) ? route('social-profile.update', ['social_profile' => $social]) : route('social-profile.store') }}"
      method="POST">
    @csrf
    @isset($social) @method('PUT') @endif
    <div class="form-group">
        <label for="company_name" class="col-sm-3 control-label">Company Name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="company_name"
                   placeholder="Company Name" value="{{ isset($social) ? $social->company->company_name : $company->company_name  }}" disabled>

            <input type="hidden" name="company_id" value="{{ isset($social) ? $social->company->id : $company->id  }}">
        </div>
    </div>
    <div class="form-group">
        <label for="company_social_profile_account_name" class="col-sm-3 control-label">Social Site</label>
        <div class="col-sm-6">
            <input type="text" name="company_social_profile_account_name" class="form-control" id="company_social_profile_account_name"
                   placeholder="Social Site" value="{{ old('company_social_profile_account_name', $social->company_social_profile_account_name ?? '') }}">
        </div>
    </div>
    <div class="form-group">
        <label for="company_social_profile_account_url" class="col-sm-3 control-label">URL</label>
        <div class="col-sm-6">
            <input type="text" name="company_social_profile_account_url" class="form-control" id="company_social_profile_account_url"
                   placeholder="URL" value="{{ old('company_social_profile_account_url', $social->company_social_profile_account_url ?? '') }}">
        </div>
    </div>
    <div class="form-group">
        <label for="company_social_profile_account_username" class="col-sm-3 control-label">Username</label>
        <div class="col-sm-6">
            <input type="text" name="company_social_profile_account_username" class="form-control" id="company_social_profile_account_username"
                   placeholder="Client Phone" value="{{ old('company_social_profile_account_username', $social->company_social_profile_account_username ?? '') }}">
        </div>
    </div>
    <div class="form-group">
        <label for="client_phone" class="col-sm-3 control-label">Password</label>
        <div class="col-sm-6">
            <input type="text" name="company_social_profile_account_password" class="form-control" id="company_social_profile_account_password"
                   placeholder="Client Phone" value="{{ old('company_social_profile_account_password', $social->company_social_profile_account_password ?? '') }}">
        </div>
    </div>

    <div class="form-group col-sm-6">
        <div class="row">
            <div class="col-sm-6 text-right">
                <button class="btn btn-default btn-action">Reset form</button>
            </div>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-success">{{ isset($social) ? 'Update Social Profile' : 'Add Social Profile' }}</button>
            </div>
        </div>
    </div>
</form>