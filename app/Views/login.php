<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet" crosorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"
            ></script>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Bengkel - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets')?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url('assets')?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-warning">


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block ">
                                <img src="<?=base_url('assets/img/bengkel.jpg')?> "width ="915" height="500" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="text-light">Selamat Datang</h1>
                                    </div>
                                    <form class="user" id="form-login" method="post" action="<?=base_url('/login')?>">
                                       

                                        <div class="form-group">
                                           
                                                <div>
                                                <label for="email" class="form-label text-light">Masukan Alamat Email</label>
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Login">
                                            </div>

                                            <div class="form-group">
                                            <label for="sandi" class="form-label text-light">Masukan Sandi</label>
                                                <input type="password" name="sandi" class="form-control " id="sandi" placeholder="Password">
                                            </div>

                                            <button type="submit" class="btn btn-warning btn-user btn-block mb-3 text-dark">Masuk</button>
                                        </div>
                                        </div>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    
</body>




    <script>
        $(document).ready(function(){
        
        
        $('form#form-login').submitAjax({
        pre:()=>{
            $('form#form-login button [type=submit]').hide();
            
        },
        pasca:()=>{
            $('form#form-login button [type=submit]').show();

        },

        success:(response, status)=>{
           var js =  $.parseJSON(response);
            alert(js.message);
            window.location = "<?=url_to('dashboard')?>";
        },

        error:(xhr, status)=>{
            var json = $.parseJSON(xhr.responseText);
            alert(json.message);
        }

        });
    });

    </script>

</html>