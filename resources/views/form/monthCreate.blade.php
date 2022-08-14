<!-- Modal -->
<div class="modal fade" id="monthModal" tabindex="-1" aria-labelledby="monthModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="monthModalLabel">Monthes name Add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                
              
                <form method="POST" action="{{ route('admin.month.store') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Month Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name">

                        </div>
                    </div>

      
      

            </div>
                 <input type="submit" class="btn btn-success" value="save">
          </form>
        </div>
    </div>
</div>
