<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Level
 *
 * @property int $id
 * @property string $level_name
 * @property string $allowed_text
 * @property string $default_monthly
 * @property string $rate_monthly
 * @property string $csv_limit
 * @property int $is_active
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Level whereAllowedText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Level whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Level whereCsvLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Level whereDefaultMonthly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Level whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Level whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Level whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Level whereLevelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Level whereRateMonthly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Level whereUpdatedAt($value)
 */
	class Level extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Review
 *
 * @package App\Models
 * @mixin \Eloquent
 * @property int $id
 * @property string $review_description
 * @property int $office_id
 * @property int $is_active
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Office $office
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereOfficeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereReviewDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereUpdatedAt($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Company
 *
 * @package App\Models
 * @mixin \Eloquent
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
 * @property string|null $smtp_host
 * @property string|null $smtp_user
 * @property string|null $smtp_password
 * @property string|null $smtp_port
 * @property string|null $smtp_secure
 * @property int $is_active
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int $levels_id
 * @property int $request_level_id
 * @property string $request_level_date
 * @property int $request_approved
 * @property int|null $domain_id
 * @property-read int $count_reviews
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Marketing\Keyword[] $keywords
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Marketing\Marketing[] $marketings
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Office[] $offices
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SmsEmailReport[] $reports_email
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SmsEmailReport[] $reports_sms
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SocialProfile[] $socials
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
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
 * App\Models\SmsEmailReport
 *
 * @property int $id
 * @property int $company_id
 * @property int $csv_id
 * @property string|null $email
 * @property string|null $phone
 * @property string $name
 * @property string|null $sms1
 * @property string|null $sms1_status
 * @property string|null $sms1_timestamp
 * @property string|null $sms2
 * @property string|null $sms2_status
 * @property string|null $sms2_timestamp
 * @property string|null $sms3
 * @property string|null $sms3_status
 * @property string|null $sms3_timestamp
 * @property string|null $email1
 * @property string|null $email1_status
 * @property string|null $email1_timestamp
 * @property string|null $email2
 * @property string|null $email2_status
 * @property string|null $email2_timestamp
 * @property string|null $email3
 * @property string|null $email3_status
 * @property string|null $email3_timestamp
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport time($where, $field, $year, $month)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereCsvId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereEmail1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereEmail1Status($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereEmail1Timestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereEmail2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereEmail2Status($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereEmail2Timestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereEmail3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereEmail3Status($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereEmail3Timestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereSms1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereSms1Status($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereSms1Timestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereSms2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereSms2Status($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereSms2Timestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereSms3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereSms3Status($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereSms3Timestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SmsEmailReport whereUpdatedAt($value)
 */
	class SmsEmailReport extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Domain
 *
 * @package App\Models
 * @mixin \Eloquent
 * @property int $id
 * @property string $domain_url
 * @property string|null $domain_ftp_address
 * @property string|null $domain_ftp_user
 * @property string|null $domain_ftp_password
 * @property string|null $domain_host
 * @property string|null $domain_registrar
 * @property string|null $domain_registrar_username
 * @property string|null $domain_registrar_password
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Domain whereUpdatedAt($value)
 */
	class Domain extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SocialProfile
 *
 * @package App\Models
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $company_social_profile_account_name
 * @property string|null $company_social_profile_account_url
 * @property string|null $company_social_profile_account_username
 * @property string|null $company_social_profile_account_password
 * @property int $company_id
 * @property int $is_active
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Company $company
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialProfile whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialProfile whereCompanySocialProfileAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialProfile whereCompanySocialProfileAccountPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialProfile whereCompanySocialProfileAccountUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialProfile whereCompanySocialProfileAccountUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialProfile whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialProfile whereUpdatedAt($value)
 */
	class SocialProfile extends \Eloquent {}
}

namespace App\Models\Marketing{
/**
 * Class Marketing
 *
 * @package App\Models
 * @mixin \Eloquent
 * @property int $id
 * @property int $company_id
 * @property int|null $traffic
 * @property int|null $calls
 * @property int|null $forms
 * @property int|null $pages
 * @property int|null $posts
 * @property int|null $citations
 * @property int|null $pr
 * @property int $month
 * @property int $year
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $pages_status
 * @property int $posts_status
 * @property int $citations_status
 * @property int $pr_status
 * @property int $reviews
 * @property bool $active
 * @property-read \App\Models\Company $company
 * @property mixed $diff_calls
 * @property mixed $diff_forms
 * @property mixed $diff_reviews
 * @property mixed $diff_traffic
 * @property-read mixed $last_email_date
 * @property-read mixed $last_sms_date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing whereCalls($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing whereCitations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing whereCitationsStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing whereForms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing wherePages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing wherePagesStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing wherePosts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing wherePostsStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing wherePr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing wherePrStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing whereReviews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing whereTraffic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Marketing whereYear($value)
 */
	class Marketing extends \Eloquent {}
}

namespace App\Models\Marketing{
/**
 * App\Models\Marketing\Keyword
 *
 * @property int $id
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Company[] $companies
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Keyword whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Keyword whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Keyword whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marketing\Keyword whereUpdatedAt($value)
 */
	class Keyword extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Office
 *
 * @package App\Models
 * @mixin \Eloquent
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
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

namespace App\Models{
/**
 * App\Models\User
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRolesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUserCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUserEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUserLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUserPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUserPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUserRealName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUserSecurity($value)
 */
	class User extends \Eloquent {}
}

