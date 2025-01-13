@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Candidates</strong>
        </span>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    @if(session('success'))
                    <h4 style="color:green" class="text-uppercase text-xs"> Approved!
                    @endif
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Candidates</h5>
                        </div>
                        <div class="ms-md-3 pe-md-3 d-flex align-items-left">
                            <div class="input-group">
                                <span class="input-group-text text-body"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                  </svg></span>
                                <input type="text" class="form-control form-control-navbar" name="" id="search-item" placeholder="Search by Name" onkeyup="search()">
                            </div>
                            
                            <script>
                                function search(){
                                    var td, tr, searchbox, table, filter, textvalue;
                                    searchbox = document.getElementById("search-item")
                                    filter = searchbox.value.toUpperCase()
                                    table = document.getElementById("table-data")
                                    tr = table.getElementsByTagName("tr")

                                    for(var i = 0; i < tr.length; i++){
                                        td = tr[i].getElementsByTagName('td')[0];
                                        if(td){
                                            textvalue = td.textContent || td.innerText;

                                            if(textvalue.toUpperCase().indexOf(filter) > -1){
                                                tr[i].style.display = "";
                                            }else{
                                                tr[i].style.display = "none";
                                            }
                                        }
                                    }
                                }
                            </script>
                            </div>
                    </div>
                    
                </div>
                 <!-- Check for success message -->
                 
                 {{-- @if(session('success'))
                 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                 <script>
                     document.addEventListener('DOMContentLoaded', function () {
                         swal("Success!", "{{ session('success') }}", "success");
                     });
                 </script>
                 @endif --}}

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 table-responsive" id ="table-data">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Nama Kandidat
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Approve
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('approvecandidates.updateapproval') }}" method="POST">
                                    @csrf
                                    <tbody>
                                    @foreach ($candidates as $candidate)
                                    <tr>
                                        <td class="ps-4 text-s font-weight-bold mb-0">{{ $candidate->namaKandidat }}</td>
                                        <td class="text-center text-s font-weight-bold mb-0">
                                            <input type="checkbox" name="approved_candidates[]" value="{{ $candidate->id }}"
                                                {{ $candidate->status ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                        <button style="float: right;margin-right:1.5%" type="submit" class="btn bg-gradient-primary btn-sm mb-0">Update Approval</button>
                                    </form>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Candidates</title>
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>
<body>
    <!-- Your HTML content here -->

    <!-- Check for success message -->
    @if(session('success'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                swal("Success!", "{{ session('success') }}", "success");
            });
        </script>
    @endif

    <!-- Example of a button to approve a candidate -->
    <form action="{{ route('candidates.approve', $candidate->id) }}" method="POST">
        @csrf
        <button type="submit">Approve Candidate</button>
    </form>
</body>
</html> --}}