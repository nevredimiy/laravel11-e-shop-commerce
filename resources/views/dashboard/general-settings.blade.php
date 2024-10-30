<x-dashboard-layout>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container mt-2">
        <div class="row">
            <div class="col-ms-12">
                <div class="card">
                    <div class="card-header">
                        <h2>It is general page</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('dashboard.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="logoImage" class="form-label">Site Logo</label>
                                <input name="logoImage" class="form-control form-control-sm" id="logoImage" type="file" accept=".png, .jpg, .jpeg" onchange="previewImage(this)" />
                                @error('logoImage')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                              <div class="avatar-preview">
                                <div id="imagePreview"></div>
                              </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
