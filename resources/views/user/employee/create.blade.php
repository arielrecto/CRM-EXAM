<x-admin-lte.dashboard>
    <x-admin-lte.header label="Add Employee" />
    <x-admin-lte.main-content>
        <div class="card card-primary">
            {{-- <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div> --}}
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.employees.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="last_name"
                            placeholder="Enter Last Name">
                    </div>
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="first_name"
                            placeholder="Enter First Name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter Email">

                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleInputFile">Logo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="logo" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>


                        </div>
                    </div>

                    @if ($errors->has('logo'))
                        <p class="text-danger">{{ $errors->first('logo') }}</p>
                    @endif --}}

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Company</label>
                        <select class="form-control" name="company_id" id="exampleFormControlSelect1">

                            @foreach ($companies as $company)
                                <option value="{{$company->id}}">{{ $company->name }}</option>
                            @endforeach


                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="Enter Phone ">
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
