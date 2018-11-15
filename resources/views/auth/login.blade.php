@extends('layouts.app')

@section('content')

<div class="container mx-auto">
    <div class="flex justify-center">
        <ui-card class="w-2/5">
            <template slot="heading">
                {{ __('Login') }}
            </template>
            <form action="{{ route('login') }}" method="POST" slot="body">
                @csrf
                
                <div class="mb-8">
                    <ui-input icon="user" label="{{ __('E-Mail Address') }}" value="{{ old('email') }}" type="email" name="email" required {!! $errors->has('email') ? 'error="'.$errors->first('email').'"' : '' !!}></ui-input>
                    <ui-input icon="lock" label="{{ __('Password') }}" type="password" name="password" required {!! $errors->has('password') ? 'error="'.$errors->first('password').'"' : '' !!}></ui-input>
                </div>

                <div class="flex justify-end">
                    <div class="w-2/3">
                        <ui-checkbox class="mb-4" name="remember" label="{{ __('Remember Me') }}"></ui-checkbox>
                        <ui-form-button class="mr-2">{{ __('Login') }}</ui-form-button>
                        <ui-button href="{{ route('password.request') }}" simple>{{ __('Forgot Your Password?') }}</ui-button>
                    </div>
                </div>
                
            </form>
        </ui-card>
    </div>
</div>
@endsection
