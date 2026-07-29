<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/login.css'])
</head>
<body>

<div class="container">

    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-5 col-lg-4">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-body p-5">

                    <h2 class="text-center fw-bold mb-2">
                        Connexion
                    </h2>

                    <p class="text-center text-muted mb-4">
                        Connectez-vous à votre compte
                    </p>

                    <form action="{{ route('login.submit') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label class="form-label">
                                Adresse email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control form-control-lg"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                Mot de passe
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control form-control-lg"
                                required>
                        </div>

                        <button class="btn btn-primary btn-lg w-100">
                            Se connecter
                        </button>

                    </form>

                    <hr>

                    <p class="text-center mb-0">
                        Vous n'avez pas de compte ?
                    </p>

                    <div class="text-center mt-2">
                        <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">
                            Créer un compte
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
