<!doctype html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>


<body class="bg-light">


<nav class="navbar navbar-dark bg-primary shadow">

    <div class="container">

        <span class="navbar-brand fw-bold">
            <i class="bi bi-speedometer2"></i>
            Dashboard Utilisateurs
        </span>


        <form action="{{route('logout')}}" method="POST">

            @csrf

            <button class="btn btn-light btn-sm">

                <i class="bi bi-box-arrow-right"></i>
                Déconnexion

            </button>

        </form>

    </div>

</nav>



<div class="container py-5">


    <div class="card shadow border-0 rounded-4">


        <div class="card-header bg-white p-4">

            <div class="d-flex justify-content-between align-items-center">


                <h3 class="fw-bold mb-0">

                    <i class="bi bi-people-fill text-primary"></i>

                    Liste des utilisateurs

                </h3>


                <a href="{{route('register')}}"
                   class="btn btn-primary">

                    <i class="bi bi-person-plus"></i>

                    Ajouter

                </a>


            </div>

        </div>



        <div class="card-body">


            <div class="table-responsive">


                <table class="table table-hover align-middle">


                    <thead class="table-primary">

                    <tr>

                        <th>ID</th>

                        <th>Nom</th>

                        <th>Email</th>

                        <th>Adresse</th>

                        <th>Téléphone</th>

                        <th>Situation</th>

                        <th>Date naissance</th>

                        <th>Actions</th>

                    </tr>

                    </thead>



                    <tbody>


                    @foreach($users as $user)


                        <tr>


                            <td>
<span class="badge bg-dark">
{{$user->id}}
</span>
                            </td>


                            <td class="fw-semibold">

                                {{$user->name}}

                            </td>


                            <td>

                                {{$user->email}}

                            </td>


                            <td>

                                {{$user->address}}

                            </td>


                            <td>

                                {{$user->phone}}

                            </td>



                            <td>

<span class="badge bg-info text-dark">

{{$user->situation_matrimoniale}}

</span>

                            </td>



                            <td>

                                {{$user->date_naissance}}

                            </td>




                            <td>


                                <button
                                    class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#edit{{$user->id}}">

                                    <i class="bi bi-pencil-square"></i>

                                    Modifier

                                </button>



                                <button
                                    class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#delete{{$user->id}}">

                                    <i class="bi bi-trash"></i>

                                    Supprimer

                                </button>


                            </td>



                        </tr>





                        <!-- MODAL MODIFICATION -->

                        <div class="modal fade"
                             id="edit{{$user->id}}">


                            <div class="modal-dialog">


                                <div class="modal-content">


                                    <div class="modal-header">

                                        <h5 class="modal-title">

                                            Modifier utilisateur

                                        </h5>


                                        <button class="btn-close"
                                                data-bs-dismiss="modal">

                                        </button>


                                    </div>



                                    <form action="{{route('users.edit',$user->id)}}"
                                          method="POST">


                                        @csrf

                                        @method('PUT')



                                        <div class="modal-body">


                                            <div class="mb-3">

                                                <label class="form-label">
                                                    Nom
                                                </label>

                                                <input
                                                    class="form-control"
                                                    name="name"
                                                    value="{{$user->name}}">

                                            </div>



                                            <div class="mb-3">

                                                <label class="form-label">
                                                    Email
                                                </label>

                                                <input
                                                    class="form-control"
                                                    name="email"
                                                    value="{{$user->email}}">

                                            </div>



                                            <div class="mb-3">

                                                <label class="form-label">
                                                    Adresse
                                                </label>

                                                <input
                                                    class="form-control"
                                                    name="address"
                                                    value="{{$user->address}}">

                                            </div>



                                            <div class="mb-3">

                                                <label class="form-label">
                                                    Téléphone
                                                </label>

                                                <input
                                                    class="form-control"
                                                    name="phone"
                                                    value="{{$user->phone}}">

                                            </div>



                                        </div>



                                        <div class="modal-footer">


                                            <button
                                                type="button"
                                                class="btn btn-secondary"
                                                data-bs-dismiss="modal">

                                                Annuler

                                            </button>



                                            <button
                                                class="btn btn-primary">

                                                Sauvegarder

                                            </button>


                                        </div>


                                    </form>



                                </div>


                            </div>


                        </div>





                        <!-- MODAL SUPPRESSION -->


                        <div class="modal fade"
                             id="delete{{$user->id}}">


                            <div class="modal-dialog">


                                <div class="modal-content">


                                    <div class="modal-header bg-danger text-white">


                                        <h5>

                                            Confirmation

                                        </h5>


                                        <button
                                            class="btn-close btn-close-white"
                                            data-bs-dismiss="modal">

                                        </button>


                                    </div>



                                    <div class="modal-body">


                                        Voulez-vous supprimer

                                        <strong>{{$user->name}}</strong> ?


                                    </div>



                                    <div class="modal-footer">


                                        <button
                                            class="btn btn-secondary"
                                            data-bs-dismiss="modal">

                                            Annuler

                                        </button>



                                        <form action="{{route('users.destroy',$user->id)}}"
                                              method="POST">


                                            @csrf

                                            @method('DELETE')


                                            <button class="btn btn-danger">

                                                Supprimer

                                            </button>


                                        </form>



                                    </div>



                                </div>


                            </div>


                        </div>



                    @endforeach


                    </tbody>


                </table>


            </div>


        </div>


    </div>


</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
