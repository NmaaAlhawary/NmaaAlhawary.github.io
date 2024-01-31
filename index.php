<?php
    include('header.php');
?>

<body>
    <?php include('layout/loginHeader.html'); ?>
    <div class="container">
        <div class="row justify-content-center align-items-center h-100 my-4">
            <div class="col-12 col-lg-7 col-xl-5">
                <div class="card shadow-2-strong card-registration border-2" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-2 pb-2 mb-md-5 pageTitle">Login</h3>
                        <div id="errorMessage" class="alert alert-danger" role="alert" style="display: none;">
                            Invalid Employee ID or password.
                        </div>
                        <form method="post" id="loginForm">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="EmployeeID">Employee ID</label>
                                <input type="text" id="EmployeeID" name="EmployeeID" class="form-control">
                            </div>

                            <div id="passwordLogIn" class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                            <a class="btn btn-primary btn-block mb-4" href="Dashboard.php">Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
<script>
// $(document).ready(function() {
//     var employeeCredentials = [{
//             id: '12345',
//             password: '12345'
//         },
//         {
//             id: '54321',
//             password: '54321'
//         },
//     ];

//     function isValidCredentials(employeeID, password) {
//         return employeeCredentials.some(function(credential) {
//             return credential.id === employeeID && credential.password === password;
//         });
//     }

//     $('#loginButton').click(function() {
//         var employeeID = $('#EmployeeID').val();
//         var password = $('#password').val();

//         if (isValidCredentials(employeeID, password)) {
//             window.location.href = 'Dashboard.php';
//         } else {
//             $('#errorMessage').show();
//         }
//     });
// });
</script>

</html>