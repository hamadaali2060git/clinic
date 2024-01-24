<!-- @if(Session::has('success'))
    <div class="row mr-2 ml-2">
            <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                    id="type-error">{{Session::get('success')}}
            </button>
    </div>
@endif
 -->



        <div class="alert alert-success">
           <strong>حسناً</strong> {{ session()->get('message') }} 
        </div>
                  


