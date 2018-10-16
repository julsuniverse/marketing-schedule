@extends('layout.layout')

@section('title', 'LMMS Marketing')
@section('sub-title', "$marketingData->date Marketing Schedule")

@section('content')
    <div class="row">
        <div class="col-md-2 text-center">
            <a href="{{ route('marketing', $marketingData->prevDate) }}" class="btn-brown">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Previous Month
            </a>
        </div>
        <div class="col-md-8 text-center">
            {{ $marketingData->date }}
        </div>
        <div class="col-md-2 text-center">
            <a href="{{ route('marketing', $marketingData->nextDate) }}" class="btn-brown">
                Next Month <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>

    <marketing inline-template
               :marketings="{{ collect($marketingData->marketings->items()) }}"
               :statuses="{{ $statuses }}"
               :statuses_pr="{{ $statuses_pr }}"
               v-cloak
    >
        <div id="marketing">
            <table class="table table-hover table-bordered table-responsive marketing-table" id="marketing-dataTables">
                <thead>
                <tr class="table-header">
                    <th>#</th>
                    <th>Company</th>
                    <th>Traffic</th>
                    <th>Calls</th>
                    <th>Forms</th>
                    <th>Pages</th>
                    <th>Posts</th>
                    <th>Citations</th>
                    <th>PR</th>
                    <th>Reviews</th>
                    <th>Text/Emails</th>
                    <th>Report</th>
                </tr>
                </thead>
                <tbody>
                    <tr v-for="(marketing, index) in marketings">
                        <td>@{{ index + 1}}</td>
                        <td>
                            <div @click="selectCompany( marketing.company )">
                                @{{ marketing.company.company_name }}
                            </div>
                        </td>
                        <td>
                            <marketing-input
                                    :value="marketing.traffic ? marketing.traffic : null"
                                    :field="'traffic'"
                                    :marketing_id="marketing.id"
                                    :difference="marketing.diffTraffic"
                                    :with_difference="true"
                            ></marketing-input>
                        </td>
                        <!-- Calls -->
                        <td>
                            <marketing-input
                                    :value="marketing.calls ? marketing.calls : null "
                                    :field="'calls'"
                                    :marketing_id="marketing.id"
                                    :difference="marketing.diffCalls"
                                    :with_difference="true"
                            ></marketing-input>
                        </td>
                        <!-- Forms -->
                        <td>
                            <marketing-input
                                    :value="marketing.forms ? marketing.forms : null"
                                    :field="'forms'"
                                    :marketing_id="marketing.id"
                                    :difference="marketing.diffForms"
                                    :with_difference="true"
                            ></marketing-input>
                        </td>
                        <!-- Pages -->
                        <td class="marketing-td">
                            <marketing-color
                                    :status="marketing.pages_status"
                                    :value="marketing.pages ? marketing.pages :  null"
                                    :field="'pages'"
                                    :marketing_id="marketing.id"
                                    :statuses="statuses"
                            ></marketing-color>

                            <marketing-input
                                    :value="marketing.pages ? marketing.pages : null"
                                    :field="'pages'"
                                    :marketing_id="marketing.id"
                            ></marketing-input>
                        </td>
                        <!-- Posts -->
                        <td class="marketing-td">
                            <marketing-color
                                    :status="marketing.posts_status"
                                    :value="marketing.posts ? marketing.posts : null"
                                    :field="'posts'"
                                    :marketing_id="marketing.id"
                                    :statuses="statuses"
                            ></marketing-color>

                            <marketing-input
                                    :value="marketing.posts ? marketing.posts : null "
                                    :field="'posts'"
                                    :marketing_id="marketing.id"
                            ></marketing-input>
                        </td>
                        <!-- Citations -->
                        <td class="marketing-td" >
                            <marketing-color
                                    :status="marketing.citations_status"
                                    :value="marketing.citations ? marketing.citations : null"
                                    :field="'citations'"
                                    :marketing_id="marketing.id"
                                    :statuses="statuses"
                            ></marketing-color>

                            <marketing-input
                                    :value="marketing.citations ? marketing.citations : null"
                                    :field="'citations'"
                                    :marketing_id="marketing.id"
                            ></marketing-input>
                        </td>
                        <!-- PR -->
                        <td class="marketing-td" >
                            <marketing-color
                                    :status="marketing.pr_status"
                                    :value="marketing.pr ? marketing.pr : null"
                                    :field="'pr'"
                                    :marketing_id="marketing.id"
                                    :statuses="statuses_pr"
                            ></marketing-color>

                            <marketing-input
                                    :value="marketing.pr ? marketing.pr : null"
                                    :field="'pr'"
                                    :marketing_id="marketing.id"
                            ></marketing-input>
                        </td>
                        <!-- Reviews -->
                        <td>
                            <marketing-input
                                    :value="marketing.reviews"
                                    :field="'reviews'"
                                    :marketing_id="marketing.id"
                                    :difference="marketing.diffReviews"
                                    :with_difference="true"
                            ></marketing-input>
                        </td>
                        <!-- Text/Emails -->
                        <td style="max-width: 80px">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="marketing-message" :style="{'background-color' : (marketing.company.reports_email_count == 0) ? 'grey' : 'yellow'}">
                                        @{{ marketing.company.reports_email_count }}
                                    </span>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div class="col-md-6">
                                    <span class="marketing-message" :style="{'background-color' : (marketing.company.reports_email_count == 0) ? 'grey' : 'yellow'}">
                                        @{{ marketing.company.reports_sms_count }}
                                    </span>
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                </div>
                            </div>
                        </td>
                        <!-- Report -->
                        <td>
                            <marketing-report
                                    :marketing_id="marketing.id"
                            ></marketing-report>
                        </td>
                    </tr>

                </tbody>
            </table>

            {{ $marketingData->marketings->links() }}

            <keywords
                    v-if="showKeywords"
                    :active-company.sync="activeCompany"
                    :month="{{ $marketingData->month }}"
                    :year="{{ $marketingData->year }}"
            ></keywords>
        </div>
    </marketing>


@endsection