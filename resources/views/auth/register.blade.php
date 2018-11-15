@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <ui-card class="w-2/5">
            <template slot="heading">
                {{ __('Register') }}
            </template>

            <div slot="body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-8">
                        <ui-input icon="user" label="{{ __('Name') }}" value="{{ old('name') }}" type="text" name="name" required {!! $errors->has('name') ? 'error="'.$errors->first('name').'"' : '' !!}></ui-input>
                        <ui-input icon="envelope" label="{{ __('E-Mail Address') }}" value="{{ old('email') }}" type="email" name="email" required {!! $errors->has('email') ? 'error="'.$errors->first('email').'"' : '' !!}></ui-input>
                        <ui-input icon="lock" label="{{ __('Password') }}" type="password" name="password" required {!! $errors->has('password') ? 'error="'.$errors->first('password').'"' : '' !!}></ui-input>
                        <ui-input icon="lock" label="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required {!! $errors->has('password_confirmation') ? 'error="'.$errors->first('password_confirmation').'"' : '' !!}></ui-input>
                    </div>

                    <div class="flex justify-end">
                        <div class="w-2/3">
                            <ui-form-button class="mr-2">{{ __('Register') }}</ui-form-button>
                        </div>
                    </div>
                </form>
            </div>
        </ui-card>
    </div>
</div>
@endsection
