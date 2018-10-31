<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialProfile\StoreSocialProfile;
use App\Http\Requests\SocialProfile\UpdateSocialProfile;
use App\Models\Company;
use App\Models\SocialProfile;
use App\Repositories\CompanyRepository;

class SocialProfileController extends Controller
{
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        $companies = $this->companyRepository->getWithSocials();
        return view('social.index', compact('companies'));
    }

    public function show(Company $company)
    {
        $socials = $company->socials;
        return view('social.show', compact('socials', 'company'));
    }

    public function create(Company $company)
    {
        return view('social.create', compact('company'));
    }

    public function store(StoreSocialProfile $request)
    {
        SocialProfile::create($request->input());
        return redirect(route('social-profile.show', $request->company_id));
    }

    public function edit(SocialProfile $social_profile)
    {
        $social = $social_profile;
        return view('social.edit', compact('social'));
    }

    public function update(SocialProfile $social_profile, UpdateSocialProfile $request)
    {
        $request->validated();
        SocialProfile::where('id', $social_profile->id)->first()->update($request->input());
        return redirect(route('social-profile.show', $social_profile->company_id));
    }

    public function destroy(SocialProfile $social_profile)
    {
        SocialProfile::destroy($social_profile->id);
        return redirect(route('social-profile.show', $social_profile->company_id));
    }
}