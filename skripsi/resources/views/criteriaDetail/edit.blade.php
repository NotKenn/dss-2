@extends('layouts.user_type.auth')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('criteriadetail.store') }}" method="POST">
                {{csrf_field()}}
                @method('PUT')

                <div class="card">
                    <div class="card-header">Criteria</div>

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
                                <label>Code</label>
                                <select type="text" class="form-control" value="{{old('code', $criteriad->code)}}" id="code"  name="code">
                                        <option value="C1">C1</option>
                                        <option value="C2">C2</option>
                                        <option value="C3">C3</option>
                                        <option value="C4">C4</option>
                                        <option value="C5">C5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Criteria</label>
                                <input type="text" class="form-control" value="{{old('criteria', $criteriad->criteria)}}" id="criteria" name="criteria">
                            </div>

                            <div class="form-group">
                                <label for="description">Category</label>
                                <input type="text" class="form-control" value="{{old('category', $criteriad->category)}}" id="category" name="category">
                            </div>

                            <div class="form-group">
                                <label for="description">Value</label>
                                <select type="number" class="form-control" value="{{old('value', $criteriad->value)}}" id="value"  name="value">
                            </div>

                            <div class="form-group">
                                <label for="description">Status</label>
                                <select type="text" class="form-control" value="{{old('status', $criteriad->status)}}" id="status" name="status">
                                    <option value="True">True</option>
                                    <option value="False">False</option>
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
