<x-guest-layout>
    <section>
        <div class="limiter">
                <div class="container-login100" style="background-image: url('assets/img/fundo.png');">
                    <div class="wrap-login100">
                        <div>
                            <x-jet-validation-errors class="mb-4" style="color: white" />
                        <form action="{{ route('login')}}" method="post"> 
                            @csrf
                            <span class="login100-form-logo">
                            <a href="{{ url('/')}}"><img src="assets/img/login.png" alt="login"></a>
                            </span>

                            <span class="login100-form-title p-b-34 p-t-27">
                                Login
                            </span>

                            <div class="wrap-input100 validate-input" data-validate = "Enter username">
                                <input class="input100" type="email" name="email" placeholder="Email">
                                <span class="focus-input100" data-placeholder="&#xf207;"></span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Enter password">
                                <input class="input100" type="password" name="password" placeholder="Senha">
                                <span class="focus-input100" data-placeholder="&#xf191;"></span>
                            </div>

                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn">
                                    Login
                                </button>
                            </div>

                            <div class="text-center p-t-90">
                                <a class="txt1" href="{{ route('register')}}">
                                    Cadastrar?
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
</x-guest-layout>
