<nav class="bg-white border-b-2 border-grey-light py-2">
    <div class="container mx-auto">
        <div class="flex justify-between items-center px-2">
            <a href="{{ route('home') }}" class="no-underline text-blue-darker text-2xl font-bold py-3">
                Webshop
            </a>
            <div>
                @guest
                    <ui-button href="{{ route('login') }}" class="mr-2" simple>{{ __('Login') }}</ui-button>
                    <ui-button href="{{ route('register') }}">{{ __('Register') }}</ui-button>
                @endguest

                @auth
                <div class="flex items-center">
                    <a href="{{ route('checkout') }}" class="mr-8 text-blue-darker font-bold no-underline inline-block flex items-center">
                        <icon icon="cart" size="lg" class="text-darker opacity-75 mr-2"></icon>
                        <div class="flex flex-col">
                            <span id="number-items" class="inline-block text-sm font-semibold opacity-75">{{ Auth::user()->getNumberOfItems() }}</span>
                            <span id="total">{{ Auth::user()->getCartTotal() }}</span>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <ui-form-button href="{{ route('logout') }}">
                            {{ __('Logout') }}
                        </ui-form-button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
    </div>
</nav>