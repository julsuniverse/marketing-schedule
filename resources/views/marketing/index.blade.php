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

        <table class="table table-hover table-bordered table-responsive" id="marketing-dataTables">
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
            @foreach($marketingData->marketings as $marketing)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $marketing->company->company_name }}</td>
                    <!-- Traffic -->
                    <td>
                        <marketing-input
                                :value="{{ $marketing->traffic ?: 'null' }}"
                                :field="'traffic'"
                                :marketing_id="{{ $marketing->id }}"
                        ></marketing-input>
                    </td>
                    <!-- Calls -->
                    <td>
                        <marketing-input
                                :value="{{ $marketing->calls ?: 'null' }}"
                                :field="'calls'"
                                :marketing_id="{{ $marketing->id }}"
                        ></marketing-input>
                    </td>
                    <!-- Forms -->
                    <td>
                        <marketing-input
                                :value="{{ $marketing->forms ?: 'null' }}"
                                :field="'forms'"
                                :marketing_id="{{ $marketing->id }}"
                        ></marketing-input>
                    </td>
                    <!-- Pages -->
                    <td class="marketing-td">
                        <marketing-color
                                :status="{{ $marketing->pages_status }}"
                                :value="{{ $marketing->pages ?: 'null' }}"
                                :field="'pages'"
                                :marketing_id="{{ $marketing->id }}"
                                :statuses="{{ $statuses }}"
                        ></marketing-color>

                        <marketing-input
                                :value="{{ $marketing->pages ?: 'null' }}"
                                :field="'pages'"
                                :marketing_id="{{ $marketing->id }}"
                        ></marketing-input>
                    </td>
                    <!-- Posts -->
                    <td class="marketing-td">
                        <marketing-color
                                :status="{{ $marketing->posts_status }}"
                                :value="{{ $marketing->posts ?: 'null' }}"
                                :field="'posts'"
                                :marketing_id="{{ $marketing->id }}"
                                :statuses="{{ $statuses }}"
                        ></marketing-color>

                        <marketing-input
                                :value="{{ $marketing->posts ?: 'null' }}"
                                :field="'posts'"
                                :marketing_id="{{ $marketing->id }}"
                        ></marketing-input>
                    </td>
                    <!-- Citations -->
                    <td class="marketing-td" >
                        <marketing-color
                                :status="{{ $marketing->citations_status }}"
                                :value="{{ $marketing->citations ?: 'null' }}"
                                :field="'citations'"
                                :marketing_id="{{ $marketing->id }}"
                                :statuses="{{ $statuses }}"
                        ></marketing-color>

                        <marketing-input
                                :value="{{ $marketing->citations ?: 'null' }}"
                                :field="'citations'"
                                :marketing_id="{{ $marketing->id }}"
                        ></marketing-input>
                    </td>
                    <!-- PR -->
                    <td class="marketing-td" >
                        <marketing-color
                                :status="{{ $marketing->pr_status }}"
                                :value="{{ $marketing->pr ?: 'null' }}"
                                :field="'pr'"
                                :marketing_id="{{ $marketing->id }}"
                                :statuses="{{ $statuses_pr }}"
                        ></marketing-color>

                        <marketing-input
                                :value="{{ $marketing->pr ?: 'null' }}"
                                :field="'pr'"
                                :marketing_id="{{ $marketing->id }}"
                        ></marketing-input>
                    </td>
                    <!-- Reviews -->
                    <td>
                        <marketing-input
                                :value="{{ $marketing->reviews }}"
                                :field="'reviews'"
                                :marketing_id="{{ $marketing->id }}"
                        ></marketing-input>
                    </td>
                    <!-- Text/Emails -->
                    <td>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="marketing-message" style="background-color: @if ($marketing->company->reports_email_count == 0) grey @else yellow @endif">
                                    {{ $marketing->company->reports_email_count }}
                                </span>
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-6">
                                <span class="marketing-message" style="background-color: @if ($marketing->company->reports_email_count == 0) grey @else yellow @endif">
                                    {{ $marketing->company->reports_sms_count }}
                                </span>
                                <i class="fa fa-mobile" aria-hidden="true"></i>
                            </div>
                        </div>
                    </td>
                    <!-- Report -->
                    <td>
                        <marketing-report
                            :marketing_id="{{ $marketing->id }}"
                        ></marketing-report>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        {{ $marketingData->marketings->links() }}


@endsection