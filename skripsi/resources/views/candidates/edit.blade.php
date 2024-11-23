@extends('layouts.user_type.auth')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('candidates.update', $candidates->id) }}" method="POST">
                {{csrf_field()}}
                @method('PUT')

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
                            </div>
                            <input type="text" class="form-control" value="{{old('namaKandidat', $candidates->namaKandidat)}}" id="namaKandidat" name="namaKandidat">

                            <div class="form-group">
                                <label for="description">Peluang Karir</label>
                                <select type="text" class="form-control" value="{{old('c1raw', $candidates->c1raw)}}" id="c1raw" name="c1raw">
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
                                <select type="text" class="form-control" value="{{old('c2raw', $candidates->c2raw)}}" id="c2raw" name="c2raw">
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
                                <select type="text" class="form-control" value="{{old('c3raw', $candidates->c3raw)}}" id="c3raw" name="c3raw">
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
                                <select type="text" class="form-control" value="{{old('c4raw', $candidates->c4raw)}}" id="c4raw" name="c4raw">
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
                                <select type="text" class="form-control" value="{{old('c5raw', $candidates->c5raw)}}" id="c5raw" name="c5raw">
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
                                <select type="text" class="form-control" value="{{old('c6raw', $candidates->c6raw)}}" id="c6raw" name="c6raw">
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
