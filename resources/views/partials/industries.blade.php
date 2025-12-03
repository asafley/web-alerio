<section id="services" class="py-5 bg-light">
    <div class="container">
        <h2 class="display-5 fw-bold text-center mb-5">
            Our Industries
        </h2>

        @php
            $items = $industries ?? [
                ['name' => 'K–12 Schools & Education', 'image' => "/img/industry_k12.png"],
                ['name' => 'Small to Mid-Sized Businesses', 'image' => "/img/industry_smb.png"],
                ['name' => 'Local Government & Municipalities', 'image' => "/img/industry_govt.png"],
                ['name' => 'Healthcare & Clinics', 'image' => "/img/industry_healthcare.png"],
                ['name' => 'Nonprofits & Community Organizations', 'image' => "/img/industry_nfp.png"],
                ['name' => 'Hospitality & Multi-Site Retail', 'image' => "/img/industry_hospitality.png"],
            ];
        @endphp

        <ul class="row list-unstyled g-3 justify-content-center">
            @foreach($items as $item)
                <li class="col-12 col-md-6 col-lg-4">
                    <div class="p-3 bg-white border rounded h-100 text-center">
                        @if(!empty($item['image']))
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="img-fluid mb-2" />
                        @endif
                        <div class="fw-semibold">{{ $item['name'] }}</div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
