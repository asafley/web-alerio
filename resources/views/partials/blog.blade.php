<!-- Blog Partial View -->
<!-- Get Blog Posts and if none exist, do not render the section -->
@if(App\Models\Post::count() > 0)
<!-- Blog Section -->
<section id="services" class="py-5 bg-light">
    <div class="container">
        <h2 class="display-5 fw-bold text-center mb-5">
            Our Blog
        </h2>

        <!-- Get Blog Posts and create a side scrolling bulletin of newer to older posts -->
        @foreach(App\Models\Post::latest()->take(5)->get() as $post)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h3 class="fs-4 fw-bold">{{ $post->title }}</h3>
                <p class="text-muted">{{ Str::limit($post->content, 150) }}</p>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif
    <!-- End of Blog Section -->
