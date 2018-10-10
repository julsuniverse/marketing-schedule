<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\SendToQueue
 *
 */
	class SendToQueue extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Marketing
 *
 * @package App\Models
 * @property int $id
 * @property int $company_id
 * @property int $traffic
 * @property int $calls
 * @property int $forms
 * @property int $pages
 * @property int $posts
 * @property int $citations
 * @property int $pr
 * @property int $month
 * @property int $year
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Office $office
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing whereCalls($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing whereCitations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing whereForms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing wherePages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing wherePosts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing wherePr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing whereTraffic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing whereYear($value)
 */
	class Marketing extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Company
 *
 * @package App\Models
 * @property int $id
 * @property string $company_name
 * @property string|null $company_phone
 * @property string|null $company_email
 * @property string|null $company_google_email
 * @property string|null $company_google_password
 * @property string|null $company_ip_address
 * @property string|null $company_notes
 * @property string|null $company_client_name
 * @property string|null $company_client_phone
 * @property int $marketing
 * @property string $smtp_host
 * @property string $smtp_user
 * @property string $smtp_password
 * @property string $smtp_port
 * @property string $smtp_secure
 * @property int $is_active
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int $levels_id
 * @property int $request_level_id
 * @property string $request_level_date
 * @property int $request_approved
 * @property int $domain_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Office[] $offices
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereCompanyClientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereCompanyClientPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereCompanyEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereCompanyGoogleEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereCompanyGooglePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereCompanyIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereCompanyNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereCompanyPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereDomainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereLevelsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereMarketing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereRequestApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereRequestLevelDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereRequestLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereSmtpHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereSmtpPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereSmtpPort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereSmtpSecure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereSmtpUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Company whereUpdatedAt($value)
 */
	class Company extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Domain
 *
 * @property int $id
 * @property string $domain_url
 * @property string|null $domain_ftp_address
 * @property string|null $domain_ftp_user
 * @property string|null $domain_ftp_password
 * @property string|null $domain_host
 * @property string|null $domain_registrar
 * @property string|null $domain_registrar_username
 * @property string|null $domain_registrar_password
 * @property int $office_id
 * @property int $is_active
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereDomainFtpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereDomainFtpPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereDomainFtpUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereDomainHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereDomainRegistrar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereDomainRegistrarPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereDomainRegistrarUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereDomainUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereOfficeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereUpdatedAt($value)
 */
	class Domain extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Office
 *
 * @package App\Models
 * @property int $id
 * @property string $office_name
 * @property string|null $office_phone
 * @property string|null $office_email
 * @property string $office_location_url
 * @property string $office_google_post_url
 * @property string|null $office_street
 * @property string|null $office_city
 * @property string|null $office_state
 * @property string|null $office_zip
 * @property string|null $office_notes
 * @property string|null $office_google_places_url
 * @property string $office_google_search_url
 * @property string|null $office_bing_places_url
 * @property string $office_google_plus_email
 * @property string $office_google_plus_password
 * @property int $company_id
 * @property string $location_name
 * @property string $api_place_id
 * @property string $api_cid
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int $is_active
 * @property string $api_address
 * @property-read \App\Models\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Marketing[] $marketings
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereApiAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereApiCid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereApiPlaceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereLocationName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereOfficeBingPlacesUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereOfficeCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereOfficeEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereOfficeGooglePlacesUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereOfficeGooglePlusEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereOfficeGooglePlusPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereOfficeGooglePostUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereOfficeGoogleSearchUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereOfficeLocationUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereOfficeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereOfficeNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereOfficePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereOfficeState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereOfficeStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereOfficeZip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Office whereUpdatedAt($value)
 */
	class Office extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $user_name
 * @property string $user_password
 * @property string $user_real_name
 * @property string $user_company_name
 * @property string $user_phone
 * @property string $user_email
 * @property int $user_security
 * @property string|null $user_logo
 * @property int $company_id
 * @property int $roles_id
 * @property int $is_active
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRolesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUserCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUserEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUserLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUserPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUserPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUserRealName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUserSecurity($value)
 */
	class User extends \Eloquent {}
}

