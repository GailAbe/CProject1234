<form wire:submit.prevent="store">
    <div wire:ignore.self class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Official</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Full Name
                                <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="fullname" placeholder="Enter First Name"
                                wire:model="fullname" />
                        </div>
                        <div class="form-group">
                            <label>Age <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('age') is-invalid @enderror "
                                name="age" placeholder="Enter Age" wire:model="age" />
                            @error('age')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectd">Gender <span class="text-danger">*</span></label>
                            <select class="form-control @error('gender') is-invalid @enderror" id="exampleSelectd"
                                wire:model='gender'>
                                <option value="">Choose your gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Non-Binary">Non-Binary</option>
                                <option value="Transgender">Transgender</option>
                                <option value="Intersex">Intersex</option>
                            </select>
                            @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Purok <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('purok') is-invalid @enderror "
                                name="purok" placeholder="Enter Purok" wire:model="purok" />
                            @error('purok')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Contact Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('contact_number') is-invalid @enderror "
                                name="contact_number" placeholder="Enter Contact Number" wire:model="contact_number" />
                            @error('contact_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectd">Choose position</label>
                            <select class="form-control @error('position') is-invalid @enderror" id="exampleSelectd"
                                wire:model='position'>
                                <option value="">-- Please select --</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position }}">{{ $position }}</option>
                                @endforeach
                            </select>
                            @error('position')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger font-weight-bold"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
