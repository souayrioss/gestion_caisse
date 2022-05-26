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
    <body class="container">
        <header class=" d-flex flex-row justify-content-between m-3 border-bottom border-3 pb-2">
            <div> 
            <h3 style="font-weight: 700;">Transaction_List</h3>
            </div>
            <div class="d-flex flex-row ">
                <div class="me-3">
                    <input class="form-control " type="search" placeholder="Search" aria-label="Search">
                </div>
                <div>
                    <button type="button" class="btn btn-success rounded-circle"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </header>
        <table class="table table-bordered border border-4 border-success mt-4">
            <thead class="text-center">
                <tr >
                <th scope="col" rowspan="2" class="pb-4">Date</th>
                <th scope="col" rowspan="2" class="pb-4">Libelle</th>
                <th scope="col" colspan="2">Caisse</th>
                <th scope="col" rowspan="2"class="pb-4">Solde</th>
                <th scope="col" rowspan="2" class="pb-4"></th>
                </tr>
                <tr>
                    <th>RECETTES</th>
                    <th>DEPONCES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transacts as $transact)
                <tr class="border border-3 border-success text-center" >
                    <td>{{$transact->date_trans}}</td>
                    <td>{{$transact->type_trans}}</td>
                    @if ($transact->type_caisse == 'recette')
                    <td>{{$transact->solde_caisse}}</td>
                    @else
                    <td></td>
                    @endif
                    @if ($transact->type_caisse == 'depot')
                    <td>{{$transact->solde_caisse}}</td>
                    @else
                    <td></td>
                    @endif
                    <td>{{$transact->solde_trans}}</td>   
                    <td class="px-0"><a href={{"edit/".$transact->id}}><i class="bi bi-pencil-square me-3"></i></a> <a href={{"delete/".$transact->id}}><i class="bi bi-trash-fill ms-3"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="position-absolute bottom-0 end-0 me-4 mb-3">
            <button type="button" class="btn btn-success rounded-circle" data-bs-toggle="modal" data-bs-target="#addTransactionModal"><i class="bi bi-plus fs-1 px-1"></i></button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addTransactionModal" tabindex="-1" aria-labelledby="addTransactionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addTransactionModalLabel">Add Transaction Form</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="row g-3 w" action="" method="POST" >
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label text-muted">Date transaction</label>
                            <input type="date" class="form-control shadow-none p-2 " name="date_trans "placeholder="Enter date transaction" > 
                        </div>
                        <div class="col">
                            <label class="form-label text-muted">Libelle transaction</label>
                            <input type="text" class="form-control shadow-none p-2" name="type_trans " placeholder="Enter Libelle transaction" >
                        </div>
                    </div>
                    <div class="row row mb-3">
                        <div class="col">
                            <label class="form-label text-muted">Out Or In Caisse</label>
                            <select name="id_caisse" class="form-select shadow-none p-2">
                                <option value="1">Recette</option>
                                <option value="2">Depot</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label text-muted">Solde caisse</label>
                            <input type="text" class="form-control shadow-none p-2" name="solde_caisse " placeholder="Enter Solde caisse" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label text-muted">Solde transaction</label>
                            <input type="text" class="form-control shadow-none p-2" name="solde_trans" placeholder="Enter Solde transaction">
                        </div>
                    </div>
                    <div >
                        <input class="btn btn-info w-100 p-2 mb-3 text-uppercase text-white" type="submit" value="Update " >
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    </body>
</html>
