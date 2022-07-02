<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Login</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <div class="container text-center">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h2 class="mb-2">Login</h2>
                            <form>
                                <div class="mb-3">
                                    <input
                                        type="email"
                                        class="form-control mail"
                                        placeholder="email"
                                        autocomplete="off"
                                        value="admin@gmail.com"
                                    />
                                </div>
                                <div class="mb-3">
                                    <input
                                        type="password"
                                        class="form-control pw"
                                        placeholder="password"
                                        autocomplete="off"
                                        value="password"
                                    />
                                </div>
                                <button class="btn btn-primary">login</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"
        ></script>
        <script>
            $(document).ready(() => {
                $("form").submit((event) => {
                    event.preventDefault();
                    const mail = $(".mail").val();
                    const pw = $(".pw").val();
                    $(".btn").html("...");

                    $.ajax({
                        method: "POST",
                        url: "http://127.0.0.1:8000/api/login",
                        data: { email: mail, password: pw },
                    }).done(function (res) {
                        localStorage.setItem("token", res.token);
                        console.log(res.token);
                        $(".btn").html("login");
                    });
                });
            });
        </script>
    </body>
</html>
