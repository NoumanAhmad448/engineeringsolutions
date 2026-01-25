@php
    use App\Models\UserAnnModel;
    $ann = UserAnnModel::select('message')->orderByDesc('updated_at')->first();
@endphp
@if (isset($ann) && $ann->count())
    <div class="container-fluid font-bold text-center">
        <div class="row">
            <div class="col-12">

                <div class="alert alert-info mb-1 alert-dismissible fade show font-bold" role="alert"
                    style="font-weight: bold"> {{ $ann->message ?? '' }}
                    <button type="button" id="close_user_notification" class="close" data-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
