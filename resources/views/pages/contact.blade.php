@extends('layouts.main')

@section('title')
    Contact us
@endsection

@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <br>
                <br>
                <h2 class="section-heading" id="kontakt">Contact us</h2>
                <hr class="dark">
                <div class="row" >
                    <div class="col-sm-6 col-sm-offset-3" >
                        <div class="well" style="margin-top: 10%">
                            <h3></h3>
                            <form role="form" id="contactForm" data-toggle="validator" class="shake">
                                <div class="row" >
                                    <div class="form-group col-sm-6" >
                                        <label for="name" class="h4">Name:</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter your name" required data-error="Molimo popunite ovo polje!">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="email" class="h4">Email:</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required data-error="Molimo popunite ovo polje!">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message" class="h4 ">Message:</label>
                                    <textarea id="message" class="form-control" rows="5" placeholder="Enter your message" required data-error="Molimo popunite ovo polje!"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Send</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                               
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>

@endsection