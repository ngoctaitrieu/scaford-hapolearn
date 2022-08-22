<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">{{ __('reset-password.reset_email_header') }}</h2>

                <div class="card-body">

                    <p>{{ __('reset-password.reset_email_text') }}:</p>
                    <a class="btn btn-primary" href="{{ route('password.reset', $token) }}?email={{ $email }}">{{ __('reset-password.reset_password') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
