<?php
include('../layouts/link.php');
?>
<body>
    <div id="auth">
        
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="../../assets/images/favicon.svg" height="48" class='mb-4'>
                        <h3>Sign In</h3>
                        <p>Please sign in to continue to Voler.</p>
                    </div>
                    
                    <form action="index.html">
                    <div class="form-group position-relative has-icon-left">
                            <label for="username">Username</label>
                            <div class="position-relative">
                                <input type="text" class="form-control"name="username" id="username">
                                <div class="form-control-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                </div>
                            </div>
                        </div>
                       <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="password">Password</label>
                                <a href="auth-forgot-password.html" class="float-right">
                                    <small>Forgot password?</small>
                                </a>
                            </div>
                            <div class="position-relative">
                                <input type="password" class="form-control"name="password" id="password">
                                <div class="form-control-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div class='form-check clearfix my-4'>
                            <div class="checkbox float-left">
                                <input type="checkbox" id="checkbox1" class='form-check-input' >
                                <label for="checkbox1">Remember me</label>
                            </div>
                            <div class="float-right">
                                <a href="../register">Don't have an account?</a>
                            </div>
                        </div>
                        <div class="clearfix">
                            <button class="btn btn-primary float-right">Submit</button>
                        </div>
                    </form>
                    <div class="divider">
                        <div class="divider-text">OR</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <button class="btn btn-block mb-2 btn-primary"><i data-feather="facebook"></i> Facebook</button>
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-block mb-2 btn-secondary"><i data-feather="github"></i> Github</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>

</body>


