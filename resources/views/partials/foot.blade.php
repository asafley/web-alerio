<!-- Footer -->
<footer class="py-4 bg-light border-top">
    <div class="container text-center text-muted">
        <p>
            &copy; 2025 {{ config('company.name') }}. All rights reserved.
        </p>
        <p>
            <a href="{{ route('legal.tos') }}" class="text-muted me-3">
                Terms of Service
            </a>
            <a href="{{ route('legal.privacy') }}" class="text-muted me-3">
                Privacy Policy
            </a>
            <a href="{{ route('legal.accessibility') }}" class="text-muted">
                Accessibility Statement
            </a>
        </p>
    </div>
</footer>
