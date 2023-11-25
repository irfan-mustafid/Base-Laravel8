@extends('welcome')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Blank Page</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Advanced Forms</h2>
                <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Input Text</h4>
                            </div>
                            <div class="card-body text-right">
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label">Your Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            What's your name?
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Oh no! Email is invalid.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Subject</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control">
                                        <div class="valid-feedback">
                                            Good job!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0 row">
                                    <label class="col-sm-3 col-form-label">Message</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" required=""></textarea>
                                        <div class="invalid-feedback">
                                            What do you wanna say?
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn btn-primary">Submit</button>
                                <button class="btn btn-danger">Batal</button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
