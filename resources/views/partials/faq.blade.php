<section id="services" class="py-5 bg-light">
    <div class="container">
        <h2 class="display-5 fw-bold text-center mb-5">
            FAQ
        </h2>

        @php
            $faqs = [
                [
                    'q' => "How can Alerio help improve our school’s safety?",
                    'a' => 'We provide integrated safety technologies—PA systems, emergency alerts, secure networks, cameras, and access control—that work together to support faster response and safer campuses.',
                    'group' => 'K12 Education',
                ],
                [
                    'q' => 'Do you understand K–12 requirements and workflows?',
                    'a' => 'We have years of experience supporting Colorado schools and understand classroom schedules, bell systems, testing windows, budget cycles, and district technology standards.',
                    'group' => 'K12 Education',
                ],
                [
                    'q' => 'Can your systems integrate with what we already have?',
                    'a' => 'In most cases, yes. We work with existing PA systems, phones, cameras, and network infrastructure, and we design a transition plan that minimizes downtime and cost.',
                    'group' => 'K12 Education',
                ],
                [
                    'q' => 'Do you support visitor management and secure entry?',
                    'a' => 'We work with leading visitor management and access control platforms to create safer front-entry workflows for staff and students.',
                    'group' => 'K12 Education',
                ],
                [
                    'q' => 'What cybersecurity protections do you offer for schools?',
                    'a' => 'We provide endpoint protection, DNS filtering, MFA enforcement, threat monitoring, and staff cybersecurity awareness training designed for K–12 environments.',
                    'group' => 'K12 Education',
                ],
                [
                    'q' => 'Can you support multiple campuses or a full school district?',
                    'a' => 'We design standardized, scalable technology and safety solutions for multi-site districts, ensuring consistent support across campuses.',
                    'group' => 'K12 Education',
                ],
                [
                    'q' => 'Do you offer emergency support for outages or safety incidents?',
                    'a' => 'We provide rapid-response support for critical network or system issues, including emergency communication and PA failures.',
                    'group' => 'K12 Education',
                ],
                [
                    'q' => 'How do you ensure our student and staff data is protected?',
                    'a' => 'We follow strict security best practices including encryption, least-privilege access, secure identity management, and monitored backup solutions.',
                    'group' => 'K12 Education',
                ],
                [
                    'q' => 'Can you help us modernize outdated technology?',
                    'a' => 'Whether replacing aging Wi-Fi, upgrading phone systems, or strengthening cybersecurity, we help schools modernize on a realistic budget and timeline.',
                    'group' => 'K12 Education',
                ],
                [
                    'q' => 'What does working with Alerio look like day-to-day?',
                    'a' => 'You get a dedicated support team, clear communication, and proactive monitoring—so problems are addressed before they interrupt learning.',
                    'group' => 'K12 Education',
                ],
                [
                    'q' => 'What IT services do you manage for businesses?',
                    'a' => 'We handle everything from helpdesk and endpoint management to networks, cloud, cybersecurity, and ongoing technology strategy.',
                    'group' => 'SMB',
                ],
                [
                    'q' => 'How does your pricing work?',
                    'a' => 'We offer predictable, flat-rate monthly plans based on your team size and environment—no surprise fees or hidden costs.',
                    'group' => 'SMB',
                ],
                [
                    'q' => 'Do you offer cybersecurity protection?',
                    'a' => 'We provide endpoint protection, threat monitoring, MFA, secure backups, and user training to keep your business safe from modern threats.',
                    'group' => 'SMB',
                ],
                [
                    'q' => 'Can you work with our existing systems and vendors?',
                    'a' => 'We support and integrate with your current tools and gradually improve what needs strengthening—no forced rip-and-replace.',
                    'group' => 'SMB',
                ],
                [
                    'q' => 'What does onboarding look like?',
                    'a' => 'We perform a full technology assessment, stabilize any issues, document your environment, and set up monitoring and support within the first month.',
                    'group' => 'SMB',
                ],
                [
                    'q' => 'How quickly do you respond to support issues?',
                    'a' => 'Most requests receive same-day responses, and critical outages are handled immediately.',
                    'group' => 'SMB',
                ],
                [
                    'q' => 'Do you support remote and hybrid teams?',
                    'a' => 'We help businesses secure remote access, manage cloud tools, and ensure your staff can work safely from anywhere.',
                    'group' => 'SMB',
                ],
                [
                    'q' => 'What backup and disaster recovery options do you offer?',
                    'a' => 'We provide secure, monitored backups with defined recovery objectives so you can restore operations quickly after data loss or cyber incidents.',
                    'group' => 'SMB',
                ],
                [
                    'q' => 'Can you help us migrate to Microsoft 365 or improve our cloud setup?',
                    'a' => 'We specialize in cloud migrations, identity security, Teams/SharePoint setup, and ongoing cloud management.',
                    'group' => 'SMB',
                ],
                [
                    'q' => 'Will we have a dedicated point of contact?',
                    'a' => 'Every client receives a dedicated account manager and technical team who learn your business and support long-term success.',
                    'group' => 'SMB',
                ],
            ];

            $groups = collect($faqs)->groupBy('group');
        @endphp

        @foreach($groups as $group => $items)
            <h3 class="h5 fw-bold mt-4 mb-3">{{ $group }}</h3>
            <div class="accordion" id="accordion-{{ Str::slug($group) }}">
                @foreach($items as $idx => $item)
                    @php
                        $headingId = 'heading-'.Str::slug($group).'-'.$idx;
                        $collapseId = 'collapse-'.Str::slug($group).'-'.$idx;
                    @endphp
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="{{ $headingId }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}" aria-expanded="false" aria-controls="{{ $collapseId }}">
                                {{ $item['q'] }}
                            </button>
                        </h2>
                        <div id="{{ $collapseId }}" class="accordion-collapse collapse" aria-labelledby="{{ $headingId }}" data-bs-parent="#accordion-{{ Str::slug($group) }}">
                            <div class="accordion-body">
                                {{ $item['a'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</section>
