<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h1> {{ $marketing->company->company_name }}</h1>
                <span><i>Reporting for: {{ date('F, Y') }}</i></span>
            </div>
            <div>
                <h2>Website Conversion Information</h2>
                <div>
                    Traffic Visitors: {{ $marketing->traffic ?: 'none' }}
                </div>
                <div>
                    Monthly Calls: {{ $marketing->calls ?: 'none'}}
                </div>
                <div>
                    Form Submissions: {{ $marketing->forms ?: 'none'}}
                </div>
            </div>
            <div>
                <h2>Monthly Work Progress</h2>
                <div>
                    Pages Added to Website: {{ $marketing->pages ?: 'none'}}
                </div>
                <div>
                    Blog Posts Added to Website: {{ $marketing->posts ?: 'none'}}
                </div>
                <div>
                    Local Citations Created: {{ $marketing->citations ?: 'none'}}
                </div>
                <div>
                    Press Release Distributions: {{ $marketing->pr ?: 'none'}}
                </div>
            </div>
            <div>
                <h2>Reviews Progress</h2>
                <div>
                    Reviews Found This Month:
                    @php
                        $count = 0;
                        foreach ($marketing->company->offices as $office) {
                            $count += $office->reviews->count();
                        }
                    @endphp
                    {{ $count }}
                </div>
                <div>
                    Text/Email Marketing: {{ $marketing->company->reports_sms_count }} / {{ $marketing->company->reports_email_count }}
                </div>
            </div>
        </div>
    </div>
</div>
