@php
    $items = $services ?? [
        [
            'name' => 'Managed IT Services',
            'hero' => 'Proactive, Reliable IT Support That Keeps You Running',
            'support' => 'We manage your day-to-day IT so your team can stay productive, secure, and focused on what matters.',
            'url' => url('/services/managed-it-services'),
        ],
        [
            'name' => 'Cybersecurity Services',
            'hero' => 'Modern Cyber Defense for a Modern Threat Landscape',
            'support' => 'Advanced protection, monitoring, and response to keep your data, systems, and people safe from evolving cyber risks.',
            'url' => url('/services/cybersecurity-services'),
        ],
        [
            'name' => 'Cloud & Hosting Services',
            'hero' => 'Secure, Scalable Cloud Solutions Built for Your Growth',
            'support' => 'From private cloud hosting to cloud migrations and hybrid architectures, we make cloud simple, reliable, and cost-effective.',
            'url' => url('/services/cloud-hosting-services'),
        ],
        [
            'name' => 'Network & Infrastructure Solutions',
            'hero' => 'Strong Networks Start with Strong Foundations',
            'support' => 'Secure, high-performance wired and wireless networks designed for reliability, security, and long-term scalability.',
            'url' => url('/services/network-infrastructure-solutions'),
        ],
        [
            'name' => 'Phone & Unified Communications',
            'hero' => 'Stay Connected, Anywhere Your Team Works',
            'support' => 'Modern VoIP, messaging, and collaboration tools that keep communication seamless across campuses and workplaces.',
            'url' => url('/services/phone-unified-communications'),
        ],
        [
            'name' => 'Public Address & Emergency Notification Systems',
            'hero' => 'Clear Communication When Seconds Matter',
            'support' => 'Campus-wide PA, intercom, and emergency alert technologies built to support rapid response and safer learning environments.',
            'url' => url('/services/public-address-emergency-notification'),
        ],
        [
            'name' => 'Physical Security & Life Safety Systems',
            'hero' => 'Protecting the Spaces Where People Learn, Work, and Thrive',
            'support' => 'Integrated surveillance, access control, and life-safety tools that strengthen safety and visibility across your facilities.',
            'url' => url('/services/physical-security-life-safety'),
        ],
        [
            'name' => 'Technology Consulting & Project Services',
            'hero' => 'The Expertise You Need to Build What’s Next',
            'support' => 'Strategic guidance and hands-on implementation for IT upgrades, tech modernization, and major infrastructure projects.',
            'url' => url('/services/technology-consulting-project-services'),
        ],
    ];
@endphp

<section id="services" class="py-5 bg-light">
    <div class="container">
        <h2 class="display-5 fw-bold text-center mb-5">
            Our Services
        </h2>

        <ul class="row list-unstyled g-4">
            @foreach($items as $item)
                <li class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h3 class="h5 card-title mb-2">{{ $item['name'] }}</h3>
                            <p class="text-muted mb-2">{{ $item['hero'] }}</p>
                            <p class="mb-3">{{ $item['support'] }}</p>
                            <div class="mt-auto">
                                <a href="{{ $item['url'] }}" class="btn btn-primary w-100">View {{ $item['name'] }}</a>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
