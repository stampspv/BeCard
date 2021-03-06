@extends('shops.layout')
@section('content')


    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create BeCard Entrepreneur</div>
                    <div class="panel-body">


                                <div class="row">
                                  <form class="form-horizontal" method="POST" action="{{ Route('shop.regiter.post') }}"  >
                                    {{ csrf_field() }}
                                      <!-- <div class="col-lg-8"> -->


                                    <table class="table table-hover">
                                    <tbody>
                                    <tr><center><h3>Create new Entrepreneur</h3></center></tr>

                                    <tr><td>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Userename</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="username" placeholder="Enter Username"required>
                                            @if ($errors->has('username'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    </td></tr>

                                    <tr><td>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Entrepreneur Name</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" placeholder="Enter name"required>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    </td></tr>

                                    <tr><td>
                                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                          <label for="password" class="col-md-4 control-label">Password</label>
                                          <div class="col-md-6">
                                              <input id="password" type="password" class="form-control" name="password" placeholder="Enter password"required>
                                              @if ($errors->has('password'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('password') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>
                                    </td></tr>

                                    <tr><td>
                                      <div class="form-group">
                                          <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                          <div class="col-md-6">
                                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter comfrim password"required>
                                          </div>
                                      </div>
                                    </td></tr>

                                    <tr><td>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Telephone</label>
                                        <div class="col-md-6">
                                            <input id="phone" type="phone" class="form-control" name="phone" placeholder="Enter telephone"required>
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                                     <strong class="text-danger">{{ $errors->first('phone') }}</strong >
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    </td></tr>

                                    <tr><td>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">E-Mail Address</label>
                                          <div class="col-md-6">
                                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter E-Mail Address"required>

                                              @if ($errors->has('email'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('email') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>
                                    </td></tr>



                                    <tr><td>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                          <div class="col-lg-8 col-md-offset-2">
                                            <button id="myInput" type="submit" class="btn btn-primary">Submit</button>
                                          </div>
                                        </div>
                                    </div>
                                    </td></tr>

                                    </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
