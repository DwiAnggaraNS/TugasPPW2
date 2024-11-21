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
                <div id="gallery-container" class="row">
                    <!-- Disini nanti akan me-render HTML yang berisi galeri dari fungsi renderGalleries ...-->
                     <!-- dari script JS di bawah jika fetching datanya berhasil dan isi dari datanya tidak kosong-->
                </div>
                <div id="loading" class="text-center mt-3" style="display: none;">
                    <span>Loading...</span>
                </div>
                <div id="error" class="text-center mt-3 text-danger" style="display: none;">
                    <span>Failed to load data. Please try again.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const galleryContainer = document.getElementById('gallery-container');
        const loadingElement = document.getElementById('loading');
        const errorElement = document.getElementById('error');

        // Display loading indicator
        loadingElement.style.display = 'block';

        // Fetch data from API
        fetch('/api/gallery')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                loadingElement.style.display = 'none'; // Hide loading
                if (data.success && data.galleries.length > 0) {
                    renderGalleries(data.galleries);
                } else {
                    galleryContainer.innerHTML = '<h3>Tidak ada data.</h3>';
                }
            })
            .catch(error => {
                loadingElement.style.display = 'none'; // Hide loading
                errorElement.style.display = 'block'; // Show error
                console.error('Error fetching data:', error);
            });

        function renderGalleries(galleries) {
            let galleryHTML = '';
            galleries.forEach(gallery => {
                galleryHTML += `
                    <div class="col-sm-2 mb-4">
                        <div class="d-flex flex-column align-items-center">
                            <a class="example-image-link" href="/storage/posts_image/${gallery.picture}" data-lightbox="roadtrip" data-title="${gallery.description}">
                                <img class="example-image img-fluid mb-2" src="/storage/posts_image/${gallery.picture}" alt="${gallery.title}" />
                            </a>
                            <!-- Edit and Delete Buttons -->
                            <button type="button" class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#editModal${gallery.id}">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal${gallery.id}">Delete</button>
                        </div>
                    </div>
                `;
            });
            galleryContainer.innerHTML = galleryHTML;
        }
    });
</script>
@endsection
