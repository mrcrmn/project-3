<nav class="bg-white border-b-2 border-grey-light py-2 relative">
    <div class="container mx-auto">
        <div class="flex justify-between items-center px-2 flex-wrap md:flex-no-wrap">
            <a href="{{ route('home') }}" class="w-full md:w-1/3 md:w-auto no-underline text-blue-darker text-center md:text-left text-2xl font-bold py-3">
                Webshop
            </a>

            <hamburger></hamburger>

            <div class="offcanvas w-full md:w-2/3 flex-wrap md:flex-no-wrap">
                <div class="w-full md:w-1/2 md:px-2 mb-4 md:mb-0">
                    <search-bar action="{{ route('search') }}"></search-bar>
                </div>
    
                <div class="w-full md:w-auto flex justify-center md:justify-start">
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
    </div>
</nav>