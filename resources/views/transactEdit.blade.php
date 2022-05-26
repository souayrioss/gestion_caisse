<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="../css/app.css" rel="stylesheet">

        <!-- CSS only -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body >
        <main class="d-flex justify-content-center align-items-center" >
            <div class="login bg-white p-5 h-75 ">
                @foreach ($transacts as $transact)
                <form class="row g-3 w" action="{{"update/".$transact->id}}" method="PUT" >
                @csrf
                        <!-- {{-- <fieldset disabled> -->
                    <div class="div">
                        <input type="text" name="id" value="{{$transact->id}}" class="form-control input-lg mb-3" >
                    </div>
                <!-- </fieldset> --}} -->
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label text-muted">Date transaction</label>
                            <input type="date" class="form-control shadow-none p-2 " name="date_trans "placeholder="Enter date transaction" value="{{$transact->date_trans}}" > 
                        </div>
                        <div class="col">
                            <label class="form-label text-muted">Libelle transaction</label>
                            <input type="text" class="form-control shadow-none p-2" name="type_trans " placeholder="Enter Libelle transaction" value="{{$transact->type_trans}}">
                        </div>
                    </div>
                    <div class="row row mb-3">
                        <div class="col">
                            <label class="form-label text-muted">Out Or In Caisse</label>
                            <select name="id_caisse" class="form-select shadow-none p-2">
                                <option value="{{$transact->id_caisse}}">{{$transact->type_caisse}}</option>
                                <option value="1">Recette</option>
                                <option value="2">Depot</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label text-muted">Solde caisse</label>
                            <input type="text" class="form-control shadow-none p-2" name="solde_caisse " placeholder="Enter Solde caisse" value="{{$transact->solde_caisse}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label text-muted">Solde transaction</label>
                            <input type="text" class="form-control shadow-none p-2" name="solde_trans" placeholder="Enter Solde transaction" value="{{$transact->solde_trans}}">
                        </div>
                    </div>
                    <div >
                        <input class="btn btn-info w-100 p-2 mb-3 text-uppercase text-white" type="submit" value="Update " >
                    </div>
                @endforeach
                </form>
            </div>
        </main>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    </body>
</html>
