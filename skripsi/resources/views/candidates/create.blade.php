@extends('layouts.user_type.auth')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('candidates.store') }}" method="POST">
                {{csrf_field()}}

                <div class="card">
                    <div class="card-header">Candidates</div>

                    <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="description">Nama Kandidat</label>
                                <input type="text" class="form-control" id="namaKandidat" name="namaKandidat">
                            </div>

                            <div class="form-group">
                                <label for="description">Peluang Karir</label>
                                <select type="text" class="form-control" id="c1raw" name="c1raw">
                                    @php
                                        $critd =  \DB::table('criteriadetail')->where('code', '=', 'C1')->select('category','value')->get();
                                    @endphp
                                    @foreach($critd as $cat)
                                    <option value="{{$cat->value}}">{{$cat->category}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Biaya</label>
                                <select type="text" class="form-control" id="c2raw" name="c2raw">
                                    @php
                                        $critd =  \DB::table('criteriadetail')->where('code', '=', 'C2')->select('category','value')->get();
                                    @endphp
                                    @foreach($critd as $cat)
                                    <option value="{{$cat->value}}">{{$cat->category}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Minat</label>
                                <select type="text" class="form-control" id="c3raw" name="c3raw">
                                    @php
                                        $critd =  \DB::table('criteriadetail')->where('code', '=', 'C3')->select('category','value')->get();
                                    @endphp
                                    @foreach($critd as $cat)
                                    <option value="{{$cat->value}}">{{$cat->category}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Materi</label>
                                <select type="text" class="form-control" id="c4raw" name="c4raw">
                                    @php
                                        $critd =  \DB::table('criteriadetail')->where('code', '=', 'C4')->select('category','value')->get();
                                    @endphp
                                    @foreach($critd as $cat)
                                    <option value="{{$cat->value}}">{{$cat->category}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Kualitas Program</label>
                                <select type="text" class="form-control" id="c5raw" name="c5raw">
                                    @php
                                        $critd =  \DB::table('criteriadetail')->where('code', '=', 'C5')->select('category','value')->get();
                                    @endphp
                                    @foreach($critd as $cat)
                                    <option value="{{$cat->value}}">{{$cat->category}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Jarak Kampus</label>
                                <select type="text" class="form-control" id="c6raw" name="c6raw">
                                    @php
                                        $critd =  \DB::table('criteriadetail')->where('code', '=', 'C6')->select('category','value')->get();
                                    @endphp
                                    @foreach($critd as $cat)
                                    <option value="{{$cat->value}}">{{$cat->category}}</option>
                                    @endforeach
                                </select>
                            </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
