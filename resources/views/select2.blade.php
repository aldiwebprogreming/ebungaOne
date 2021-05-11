@extends('layouts/app_select')

@section('content')

    <div class="row mt-5">
        <div class="col-md-6 offset-3 mt-5">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h4>PHP Select2 Multiple Select Example Tutorial - Nicesnippets.com</h4>
                </div>
                <div class="card-body" style="height: 280px;">
                    <form action="multiSelectPro.php" method="post">
                        <div class="form-group">
                            <label>Title :</label>
                            <input type="title" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Category :</label>
                            <select class="category related-post form-control" name="category[]" multiple>
                                <option value="1">Laravel</option>
                                <option value="2">Jquery</option>
                                <option value="3">React</option>
                                <option value="4">Jquery ui</option>
                                <option value="5">Android</option>
                                <option value="6">React Native</option>
                                <option value="7">Vue js</option>
                                <option value="8">Bootstrap 4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success store-related-post btn-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
    