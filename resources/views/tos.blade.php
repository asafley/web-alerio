<!-- resources/views/tos.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body class="bg-light">
    <main className="px-6 md:px-10 py-16 md:py-20 bg-neutral-50">
        <div className="max-w-3xl mx-auto">
            <h1 className="text-3xl md:text-4xl font-semibold">
                Terms of Service
            </h1>

            <p className="mt-2 text-neutral-600 text-sm">
                Effective date: {{ config('company.date_tos') }}
            </p>

            <p className="mt-6 text-neutral-700">
                These Terms of Service (the "Terms") govern your access to and use of the website at
                {" "}
                <a className="text-blue-700 underline" href="{{ config('app.url') }}">
                    {{ config('app.url') }}
                </a>{" "}
                operated by {{ config('company.name') }} ("Alerio," "ATG," "we," "us," or "our"). By accessing or using the
                site, you agree to be bound by these Terms. If you do not agree, please do not use the site.
            </p>

            <section className="mt-10">
                <h2 className="text-xl font-semibold">
                    1. Eligibility & Acceptance
                </h2>

                <p className="mt-3 text-neutral-700">
                    You must be at least 13 years old to use the site. By using the site on behalf of an organization, you represent that you have authority to bind that organization to these Terms and that you accept these Terms on its behalf.
                </p>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    2. Use of the Website
                </h2>

                <ul className="mt-3 list-disc list-inside text-neutral-700 space-y-2">
                    <li>
                        No unlawful, infringing, or fraudulent activity.
                    </li>

                    <li>
                        No interference with the site's operation or security (e.g., probing, scanning, or overloading).
                    </li>

                    <li>
                        No reverse engineering, scraping, or automated extraction of content without consent.
                    </li>

                    <li>
                        You are responsible for any content you submit and for maintaining the confidentiality of any accounts or credentials used to access the site.
                    </li>
                </ul>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    3. Services & Proposals
                </h2>

                <p className="mt-3 text-neutral-700">
                    Information on this site is provided for general informational purposes only and does not constitute a binding offer. Any professional services we provide are governed by separate written agreements (e.g., proposals, MSAs, SOWs). In the event of a conflict between those agreements and these Terms, the written agreements control.
                </p>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    4. Intellectual Property
                </h2>

                <p className="mt-3 text-neutral-700">
                    The site and its content (including text, graphics, logos, and software) are owned by {" "} {company.name} or its licensors and are protected by intellectual property laws. Subject to your compliance with these Terms, we grant you a limited, non-exclusive, revocable license to access and use the site for your internal, non-commercial use. You may not reproduce, modify, distribute, or create derivative works from the site content without our prior written permission.
                </p>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    5. Third-Party Links
                </h2>

                <p className="mt-3 text-neutral-700">
                    The site may contain links to third-party websites or services that are not owned or controlled by {company.name}. We are not responsible for the content, policies, or practices of any third parties, and inclusion of a link does not imply endorsement.
                </p>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    6. Disclaimers
                </h2>

                <p className="mt-3 text-neutral-700">
                    THE SITE IS PROVIDED ON AN "AS IS" AND "AS AVAILABLE" BASIS. TO THE MAXIMUM EXTENT PERMITTED BY LAW, WE DISCLAIM ALL WARRANTIES, EXPRESS OR IMPLIED, INCLUDING ANY WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND NON-INFRINGEMENT. WE DO NOT WARRANT THAT THE SITE WILL BE UNINTERRUPTED, SECURE, OR ERROR-FREE.
                </p>

                <p className="mt-3 text-neutral-700">
                    Security guidance and other information on the site are provided for general awareness and may not be suitable for your specific environment. You should seek professional advice before acting on information found on the site.
                </p>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    7. Limitation of Liability
                </h2>

                <p className="mt-3 text-neutral-700">
                    TO THE MAXIMUM EXTENT PERMITTED BY LAW, {company.name} AND ITS OFFICERS, EMPLOYEES, AGENTS, AND PARTNERS WILL NOT BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, OR PUNITIVE DAMAGES, OR ANY LOSS OF PROFITS OR REVENUES, WHETHER INCURRED DIRECTLY OR INDIRECTLY, OR ANY LOSS OF DATA, USE, GOODWILL, OR OTHER INTANGIBLE LOSSES, RESULTING FROM (A) YOUR ACCESS TO OR USE OF OR INABILITY TO ACCESS OR USE THE SITE; (B) ANY CONDUCT OR CONTENT OF ANY THIRD PARTY ON THE SITE; OR (C) UNAUTHORIZED ACCESS, USE, OR ALTERATION OF YOUR TRANSMISSIONS OR CONTENT. IN NO EVENT SHALL OUR TOTAL LIABILITY EXCEED ONE HUNDRED U.S. DOLLARS (US$100) OR THE AMOUNT YOU PAID (IF ANY) TO USE THE SITE IN THE TWELVE MONTHS PRECEDING THE CLAIM, WHICHEVER IS GREATER.
                </p>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    8. Indemnification
                </h2>

                <p className="mt-3 text-neutral-700">
                    You agree to defend, indemnify, and hold harmless {company.name} and its officers, employees, and agents from and against any claims, liabilities, damages, losses, and expenses (including reasonable attorneys’ fees) arising out of or in any way connected with your violation of these Terms or your misuse of the site.
                </p>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    9. Governing Law & Venue
                </h2>

                <p className="mt-3 text-neutral-700">
                    These Terms are governed by the laws of the State of Colorado, without regard to its conflict of laws principles. You agree to submit to the personal jurisdiction of the state and federal courts located in Denver County, Colorado, for the resolution of any disputes arising from or relating to these Terms or the site.
                </p>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    10. Changes to These Terms
                </h2>

                <p className="mt-3 text-neutral-700">
                    We may update these Terms from time to time. When we do, we will revise the effective date at the top of this page. Your continued use of the site after changes become effective constitutes your acceptance of the revised Terms.
                </p>
            </section>

            <section className="mt-8">
                <h2 className="text-xl font-semibold">
                    11. Contact Us
                </h2>

                <address className="mt-3 not-italic text-neutral-700">
                    {{ config('company.name') }}
                    <br />
                    {{ config('company.address_1') }}
                    <br />
                    {{ config('company.address_2') }}
                    <br />
                    {{ config('company.address_city') }}, {{ config('company.address_state') }} {{ config('company.address_zip') }}
                    <a className="text-blue-700 underline" href="tel:{{ config('company.phone') }}">
                        {{ config('company.phone') }}
                    </a>
                    <br />
                    <a className="text-blue-700 underline" href="mailto:{{ config('company.email_accessibility') }}">
                        {{ config('company.email_accessibility') }}
                    </a>
                </address>
            </section>

            <p className="mt-10 text-xs text-neutral-500">
                TODO: This document is a general template and does not constitute legal advice. Consult your legal counsel to adapt these Terms to your specific operations and risk profile.
            </p>

            <p className="mt-6 text-sm text-neutral-600">
                Related: See our {" "}
                <a className="text-blue-700 underline" href="/legal/privacy">
                    Privacy Policy
                </a>
                .
            </p>
        </div>
    </main>
</body>
</html>
