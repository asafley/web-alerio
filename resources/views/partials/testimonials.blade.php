<section id="services" class="py-5 bg-light">
    <div class="container position-relative">
        <h2 class="display-5 fw-bold text-center mb-5">
            Our Testimonials
        </h2>

        @php
            $items = $testimonials ?? [
                [
                    'quote' => 'Alérion transformed our IT reliability. Tickets dropped and our staff productivity improved overnight.',
                    'name' => 'Jordan M.',
                    'role' => 'Director of Operations, K–12 District',
                    'url' => 'https://www.google.com/',
                ],
                [
                    'quote' => 'Their cybersecurity team is proactive and responsive—we sleep better knowing our data is protected.',
                    'name' => 'Alex P.',
                    'role' => 'CFO, Local Government',
                    'url' => '',
                ],
                [
                    'quote' => 'Cloud migration was seamless and cost savings were real. Our apps are faster and more resilient.',
                    'name' => 'Riley S.',
                    'role' => 'IT Manager, Healthcare',
                    'url' => '',
                ],
                [
                    'quote' => 'From network design to emergency alerts, they delivered a safer, more connected campus.',
                    'name' => 'Taylor K.',
                    'role' => 'Facilities Lead, Charter School',
                    'url' => '',
                ],
            ];
        @endphp

        <div class="d-flex align-items-center">
            <button type="button" class="btn btn-outline-secondary me-2" aria-label="Scroll left" onclick="document.getElementById('testimonials-track').scrollBy({left: -320, behavior: 'smooth'})">&#8592;</button>
            <div id="testimonials-track" class="d-flex flex-nowrap overflow-auto gap-3 py-2" style="scroll-snap-type: x mandatory;">
                @foreach($items as $item)
                    <div class="card flex-shrink-0" style="width: 300px; scroll-snap-align: start;">
                        <div class="card-body d-flex flex-column">
                            <p class="mb-3">“{{ $item['quote'] }}”</p>
                            <div class="mt-auto">
                                @if (!empty($item['url']))
                                    <a href="{{ $item['url'] }}" class="text-decoration-none fw-semibold" target="_blank" rel="noopener">
                                        <div class="fw-semibold text-decoration-none">{{ $item['name'] }}</div>
                                        <div class="text-muted small">{{ $item['role'] }}</div>
                                    </a>
                                @else
                                    <div class="fw-semibold">{{ $item['name'] }}</div>
                                    <div class="text-muted small">{{ $item['role'] }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-outline-secondary ms-2" aria-label="Scroll right" onclick="document.getElementById('testimonials-track').scrollBy({left: 320, behavior: 'smooth'})">&#8594;</button>
        </div>
    </div>
</section>
