@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="container mx-auto">
    <div class="flex justify-center">
        <ui-card class="w-2/5">
            <template slot="heading">
                {{ __('Reset Password') }}
            </template>
            <div slot="body">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-8">
                        <ui-input icon="envelope" name="email" type="email" label="{{ __('E-Mail Address') }}" {!! $errors->has('email') ? 'error="'.$errors->first('email').'"' : '' !!} value="{{ old('email') }}"></ui-input>
                    </div>
                    <div class="flex justify-end">
                        <div class="w-2/3">
                            <ui-form-button class="mr-2">{{ __('Send Password Reset Link') }}</ui-form-button>
                        </div>
                    </div>
                </form>
            </div>
        </ui-card>
    </div>
</div>
@endsection
