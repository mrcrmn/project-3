@extends('layouts.app')

@section('content')

<div class="container mx-auto">
    <div class="flex justify-center">
        <ui-card class="w-2/5">
            <template slot="heading">
                {{ __('Reset Password') }}
            </template>
            <div slot="body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-8">
                        <ui-input icon="envelope" name="email" type="email" label="{{ __('E-Mail Address') }}" {!! $errors->has('email') ? 'error="'.$errors->first('email').'"' : '' !!} value="{{ $email ?? old('email') }}"></ui-input>
                        <ui-input icon="lock" label="{{ __('Password') }}" type="password" name="password" required {!! $errors->has('password') ? 'error="'.$errors->first('password').'"' : '' !!}></ui-input>
                        <ui-input icon="lock" label="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required {!! $errors->has('password_confirmation') ? 'error="'.$errors->first('password_confirmation').'"' : '' !!}></ui-input>
                    </div>

                    <div class="flex justify-end">
                        <div class="w-2/3">
                            <ui-form-button class="mr-2">{{ __('Reset Password') }}</ui-form-button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </ui-card>
    </div>
</div>

@endsection
