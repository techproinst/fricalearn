<form action="{{ route('course_level.update', ['courseLevel' => $level->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div id="edit-form{{ $level->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ">Edit Price for
                        {{ Str::replaceFirst('payment for', ' ', $level->description) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">
                    @php

                        $prices = json_decode($level->price, true);

                    @endphp

                    <div class="mb-3">
                        <label for="amount_other">Amount for other countries</label>
                        <div>
                            <input type="number" class="form-control" placeholder="000.00" name="amount_other"
                                value="{{ $prices[App\Enums\Continent::AFRICA->value] }}" required />
                            <span class="text-danger">
                                @error('amount_other')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="amount_other">Amount for africa countries</label>
                        <div>
                            <input type="number" class="form-control" placeholder="000.00" name="amount_africa"
                                value="{{ $prices[App\Enums\Continent::OTHER->value] }}" required />
                            <span class="text-danger">
                                @error('amount_other')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>

            </div>
        </div>
    </div>
</form>
