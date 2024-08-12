<x-admin-lte.dashboard>
    <x-admin-lte.header label="Edit Company" />
    <x-admin-lte.main-content>
        <div class="card card-primary">
            {{-- <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div> --}}
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.companies.update', ['company' => $company->id]) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="conpanyNane">Company Name</label>
                        <input type="text" class="form-control" id="conpanyNane" name="company_name"
                            placeholder="Enter Company Name" value="{{$company->name}}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$company->email}}"
                            placeholder="Enter Email">

                            @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Logo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="logo" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            {{-- <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div> --}}
                        </div>
                    </div>

                    @if ($errors->has('logo'))
                        <p class="text-danger">{{ $errors->first('logo') }}</p>
                    @endif
                    <div class="form-group">
                        <label for="Website">Website</label>
                        <input type="text" class="form-control" id="Website" name="website" value="}{{$company->website}}"
                            placeholder="Enter Website ">
                    </div>
                    {{-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> --}}
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </x-admin-lte.main-content>
</x-admin-lte.dashboard>
