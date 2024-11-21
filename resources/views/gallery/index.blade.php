@extends('auth.layouts')
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Dashboard</span>
                <a href="{{ route('gallery.create') }}" class="btn btn-primary">Insert</a>
            </div>
            <div class="card-body">
                <div class="row" id="gallery-container">
                    <!-- Gallery items will be dynamically added here by JavaScript -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Templates for Modals -->
<div id="modals-container">
    <!-- Edit and Delete modals will be dynamically added here -->
</div>

<script>
    // Fetch data from API and dynamically render gallery
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/api/gallery')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const galleryContainer = document.getElementById('gallery-container');
                    const modalsContainer = document.getElementById('modals-container');

                    // Clear containers
                    galleryContainer.innerHTML = '';
                    modalsContainer.innerHTML = '';

                    data.galleries.forEach(gallery => {
                        // Render gallery card
                        const galleryCard = `
                            <div class="col-sm-2 mb-4">
                                <div class="d-flex flex-column align-items-center">
                                    <a class="example-image-link" href="/storage/posts_image/${gallery.picture}" data-lightbox="roadtrip" data-title="${gallery.description}">
                                        <img class="example-image img-fluid mb-2" src="/storage/posts_image/${gallery.picture}" alt="${gallery.title}" />
                                    </a>
                                    <button type="button" class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#editModal${gallery.id}">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal${gallery.id}">Delete</button>
                                </div>
                            </div>
                        `;
                        galleryContainer.innerHTML += galleryCard;

                        // Render modals for edit and delete
                        const modals = `
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal${gallery.id}" tabindex="-1" aria-labelledby="editModalLabel${gallery.id}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('gallery.update', '') }}/${gallery.id}" enctype="multipart/form-data" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel${gallery.id}">Edit Gambar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="title${gallery.id}" class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="title" id="title${gallery.id}" value="${gallery.title}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description${gallery.id}" class="form-label">Deskripsi</label>
                                                    <input type="text" class="form-control" name="description" id="description${gallery.id}" value="${gallery.description}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="picture${gallery.id}" class="form-label">Ganti Gambar</label>
                                                    <img src="/storage/posts_image/${gallery.picture}" alt="Current Image" style="max-width: 200px; display: block; margin-bottom: 10px;">
                                                    <input type="file" class="form-control" name="picture" id="picture${gallery.id}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal${gallery.id}" tabindex="-1" aria-labelledby="deleteModalLabel${gallery.id}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel${gallery.id}">Hapus Gambar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus gambar ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('gallery.destroy', '') }}/${gallery.id}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        modalsContainer.innerHTML += modals;
                    });
                } else {
                    document.getElementById('gallery-container').innerHTML = '<h3>Data tidak tersedia.</h3>';
                }
            })
            .catch(error => {
                console.error('Error fetching gallery data:', error);
                document.getElementById('gallery-container').innerHTML = '<h3>Gagal memuat data.</h3>';
            });
    });
</script>
@endsection
