<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    @vite(['resources/css/register.css','resources/js/register.js'])

    <title>Formulaire d'inscription</title>
</head>
<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-body p-5">

                    <h2 class="text-center fw-bold mb-2">
                        <i class="bi bi-person-plus-fill text-primary"></i>
                        Créer un compte
                    </h2>

                    <p class="text-center text-muted mb-4">
                        Remplissez les informations ci-dessous.
                    </p>

                    <form action="{{ route('register.store') }}" method="POST">

                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Nom complet
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-person"></i>
                                    </span>

                                    <input
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        required>

                                </div>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Adresse Email
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>

                                    <input
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        required>

                                </div>

                            </div>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Mot de passe
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>

                                <input
                                    id="password"
                                    type="password"
                                    class="form-control"
                                    name="password"
                                    required>

                                <button
                                    class="btn btn-outline-secondary"
                                    type="button"
                                    id="togglePassword">

                                    <i class="bi bi-eye"></i>

                                </button>

                            </div>

                            <div class="progress mt-2" style="height:8px;">

                                <div id="strengthBar"
                                     class="progress-bar"
                                     style="width:0%">

                                </div>

                            </div>

                            <small id="strengthText"
                                   class="text-muted">

                                Saisissez un mot de passe.

                            </small>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Adresse
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-geo-alt"></i>
                                </span>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="address"
                                    required>

                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Téléphone
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-telephone"></i>
                                    </span>

                                    <input
                                        type="tel"
                                        class="form-control"
                                        name="phone"
                                        required>

                                </div>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Situation matrimoniale
                                </label>

                                <select
                                    class="form-select"
                                    name="situation_matrimoniale">

                                    <option value="">Choisir...</option>
                                    <option>Célibataire</option>
                                    <option>Marié(e)</option>
                                    <option>Divorcé(e)</option>
                                    <option>Veuf(ve)</option>

                                </select>

                            </div>

                        </div>


                        <div class="mb-4">

                            <label class="form-label">
                                Date de naissance
                            </label>

                            <input
                                type="date"
                                class="form-control"
                                name="date_naissance"
                                required>

                        </div>


                        <button class="btn btn-primary btn-lg w-100">

                            <i class="bi bi-check-circle"></i>

                            Créer le compte

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>
</body>
</html>
