<!-- Email modal -->
<div class="modal" id="changeEmailModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Change Email</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="POST" action="/profile/email">
                {!! csrf_field() !!}
                <div class="modal-body">
                        <div class="form-group row">
                            <label for="current-email" class="col-md-4 col-form-label text-md-right">{{ __('Current Email') }}</label>

                            <div class="col-md-6">
                                <input value="{{Auth::user()->email}}" id="current-email" type="text" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('New Email') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Email" id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Confirm</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>