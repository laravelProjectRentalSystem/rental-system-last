<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login & Register</title>
    <link rel="stylesheet" href="{{ asset('css/login_register.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .error-message {
            color: red;
            font-size: 0.9em;
            margin-top: 0.25em;
            display: block;
        }
        .input-group {
            margin-bottom: 1em;
        }
        .pointer {
            cursor: pointer;
        }
        .alertError {
            font-size: 16px;
            color: #721c24; /* Text color */
            background-color: #f8d7da; /* Background color */
            border: 1px solid #f5c6cb; /* Border color */
            padding: 15px; /* Padding around the text */
            border-radius: 5px; /* Rounded corners */
            margin-top: 20px; /* Top margin */
            max-width: 600px; /* Max width */
            margin-left: auto; /* Center horizontally */
            margin-right: auto; /* Center horizontally */
        }
    </style>
</head>
<body>
    @if (session('status'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Success!',
                text: "{{ session('status') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>
    @endif

    <!-- Test SweetAlert -->
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Test Alert',
                text: "{{ session('status') }}",
                icon: 'info',
                confirmButtonText: 'OK'
            });
        });
    </script> --}}

    <div id="container" class="container">
        <!-- FORM SECTION -->
        <div class="row">
            <!-- SIGN UP -->
            <div class="col align-items-center flex-col sign-up">
                <div class="form-wrapper align-items-center">
                    <form id="registerForm" method="POST" action="{{ route('register') }}" class="form sign-up">
                        @csrf
                        <div class="input-group">
                            <i class='bx bxs-user'></i>
                            <input type="text" name="name" id="registerUsername" placeholder="Username" required>
                            <span id="errorUsername" class="error-message"></span>
                        </div>
                        <div class="input-group">
                            <i class='bx bx-mail-send'></i>
                            <input type="email" name="email" id="registerEmail" placeholder="Email" required>
                            <span id="errorEmail" class="error-message"></span>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="password" name="password" id="registerPassword" placeholder="Password" required>
                            <span id="errorPassword" class="error-message"></span>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="password" name="password_confirmation" id="registerConfirmPassword" placeholder="Confirm password" required>
                            <span id="errorConfirmPassword" class="error-message"></span>
                        </div>

                        <div id="lessorFields" style="display: none;">
                            <div class="input-group">
                                <i class='bx bx-home'></i>
                                <input type="text" name="address" id="registerAddress" placeholder="Address">
                                <span id="errorAddress" class="error-message"></span>
                            </div>
                            <div class="input-group">
                                <i class='bx bx-phone'></i>
                                <input type="tel" name="phone_number" id="registerPhone" placeholder="Phone">
                                <span id="errorPhone" class="error-message"></span>
                            </div>
                        </div>

                        <!-- Custom Role Selection -->
                        <div class="input-group">
                            <i class='bx bx-briefcase'></i>
                            <div class="role-selection">
                                <label>
                                    <input type="radio" name="role" value="lessor" required>
                                    <span>Lessor</span>
                                </label>
                                <label>
                                    <input type="radio" name="role" value="renter" required>
                                    <span>Renter</span>
                                </label>
                            </div>
                            <span id="errorRole" class="error-message"></span>
                        </div>

                        <button type="submit">
                            Sign up
                        </button>
                        <p>
                            <span>Already have an account?</span>
                            <b onclick="toggle()" class="pointer">Sign in here</b>
                        </p>
                    </form>
                </div>
            </div>
            <!-- END SIGN UP -->

            <!-- SIGN IN -->
            <div class="col align-items-center flex-col sign-in">
                <div class="form-wrapper align-items-center">
                    <form id="loginForm" method="POST" action="{{ route('login') }}" class="form sign-in">
                        @csrf
                        @if(session('ErrorLessor'))
                        <p class="alertError">{{ session('ErrorLessor') }}</p>
                        @endif
                        <div class="input-group">
                            <i class='bx bxs-user'></i>
                            <input type="text" name="email" id="loginEmail" placeholder="Email" required>
                            <span id="errorLoginEmail" class="error-message"></span>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="password" name="password" id="loginPassword" placeholder="Password" required>
                            <span id="errorLoginPassword" class="error-message"></span>
                        </div>
                        <button type="submit">
                            Sign in
                        </button>
                        <p class="mt-3">
                            <span>Don't have an account?</span>
                            <b onclick="toggle()" class="pointer">Sign up here</b>
                        </p>
                    </form>
                </div>
            </div>
            <!-- END SIGN IN -->
        </div>
        <!-- END FORM SECTION -->
        <!-- CONTENT SECTION -->
        <div class="row content-row">
            <!-- SIGN IN CONTENT -->
            <div class="col align-items-center flex-col">
                <div class="text sign-in">
                    <h2>Welcome</h2>
                </div>
                <div class="img sign-in"></div>
            </div>
            <!-- END SIGN IN CONTENT -->
            <!-- SIGN UP CONTENT -->
            <div class="col align-items-center flex-col">
                <div class="img sign-up"></div>
                <div class="text sign-up">
                    <h2>Join with us</h2>
                </div>
            </div>
            <!-- END SIGN UP CONTENT -->
        </div>
        <!-- END CONTENT SECTION -->
    </div>

    <script src="{{ asset('js/login_register.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
