{{-- Modal para registrar un nuevo usuario --}}
<div class="modal fade" id="userProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Registro de usuario nuevo</h4>
            </div>
            <form method="post" action="{{ route('saveUserProfile') }}">
            <div class="modal-body">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nameUser">Nombre:</label>
                        <input type="text" class="form-control" id="nameUser" name="nameUser">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
            </form>
        </div>
    </div>
</div>