@php
    $items = $partners ?? [
        ['name' => 'Dell', 'image' => null],
        ['name' => 'Lenovo', 'image' => null],
        ['name' => 'Ubiquiti', 'image' => null],
        ['name' => 'Supermicro', 'image' => null],
        ['name' => 'Axis', 'image' => null],
        ['name' => 'Imron', 'image' => null],
        ['name' => 'Valcom', 'image' => null],
        ['name' => 'Aiphone', 'image' => null],
        ['name' => 'Sangoma', 'image' => null],
        ['name' => 'Twilio', 'image' => null],
        ['name' => 'Microsoft', 'image' => null],
        ['name' => 'Google', 'image' => null],
        ['name' => 'Veeam', 'image' => null],
        ['name' => 'Sophos', 'image' => null],
        ['name' => 'Huntress', 'image' => null],
        ['name' => 'Bitdefender', 'image' => null],
    ];
@endphp

<section id="services" class="py-5 bg-light">
    <div class="container">
        <h2 class="display-5 fw-bold text-center mb-5">
            Our Partners
        </h2>

        <div>
            <ul class="list-unstyled d-flex flex-nowrap overflow-auto py-2 gap-3" style="scroll-snap-type: x mandatory;">
                @foreach($items as $item)
                    <li class="flex-shrink-0" style="scroll-snap-align: start;">
                        <div class="bg-white border rounded p-3 d-flex align-items-center justify-content-center" style="width: 160px; height: 100px;">
                            @if(!empty($item['image']))
                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="img-fluid" style="max-height: 80px; object-fit: contain;" />
                            @else
                                <span class="fw-semibold">{{ $item['name'] }}</span>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
