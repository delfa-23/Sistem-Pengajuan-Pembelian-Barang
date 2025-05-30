
<div class="container">
    <h2>File Upload</h2>

    {{-- Upload Form --}}
    <form action="{{ route('fileupload.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Choose Image</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" required>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Upload</button>
    </form>

    {{-- Gallery List --}}
    <h4>Uploaded Images</h4>
    <div class="row">
        @forelse($galleries as $gallery)
            <div class="col-md-3 mb-4">
                <div class="card">
                    @if($gallery->images)
                        <img src="{{ asset('storage/' . $gallery->images) }}" class="card-img-top" alt="{{ $gallery->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $gallery->title }}</h5>
                        <form action="{{ route('fileupload.delete', $gallery) }}" method="POST" onsubmit="return confirm('Delete this image?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>No images uploaded yet.</p>
        @endforelse
    </div>
</div>
