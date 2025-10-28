<!-- resources/views/accessibility.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body class="bg-light">
<main className="px-6 md:px-10 py-16 md:py-20 bg-neutral-50">
    <div className="max-w-3xl mx-auto">
        <h1 className="text-3xl md:text-4xl font-semibold">
            Accessibility Statement
        </h1>

        <p className="mt-2 text-neutral-600 text-sm">
            Last updated: {{ config('company.date_accessibility') }}
        </p>

        <section className="mt-6">
            <h2 className="text-xl font-semibold">
                Our commitment
            </h2>

            <p className="mt-3 text-neutral-700">
                {{ config('company.name') }} is committed to ensuring our website is accessible to all people, including individuals with disabilities. We strive to conform to the Web Content Accessibility Guidelines (WCAG) 2.2 Level AA and follow best practices for usability, performance, and inclusive design.
            </p>
        </section>

        <section className="mt-8">
            <h2 className="text-xl font-semibold">
                Measures we take
            </h2>

            <ul className="mt-3 list-disc list-inside text-neutral-700 space-y-2">
                <li>
                    Use of semantic HTML and appropriate ARIA roles where needed.
                </li>

                <li>
                    Keyboard navigability and visible focus styles.
                </li>

                <li>
                    Aim for sufficient color contrast and scalable typography.
                </li>

                <li>
                    Text alternatives for non‑text content (e.g., alt text for images).
                </li>

                <li>
                    Accessible forms with labels, instructions, and error feedback.
                </li>

                <li>
                    Regular reviews using automated and manual testing tools.
                </li>
            </ul>
        </section>

        <section className="mt-8">
            <h2 className="text-xl font-semibold">
                Compatibility & technical specs
            </h2>

            <p className="mt-3 text-neutral-700">
                This site is designed to work with the latest versions of major browsers (Chrome, Edge, Safari, and Firefox) and with assistive technologies such as screen readers and screen magnifiers. The site relies on modern web technologies including HTML, WAI‑ARIA, CSS, and JavaScript.
            </p>
        </section>

        <section className="mt-8">
            <h2 className="text-xl font-semibold">
                Assessment approach
            </h2>

            <p className="mt-3 text-neutral-700">
                We assess accessibility through internal reviews that include keyboard‑only navigation checks, color‑contrast evaluation, and automated testing tools (e.g., axe, Lighthouse). We also address issues raised by users and continue incremental improvements as our site and content evolve.
            </p>
        </section>

        <section className="mt-8">
            <h2 className="text-xl font-semibold">
                Known limitations
            </h2>

            <p className="mt-3 text-neutral-700">
                We are working to improve older documents and certain embedded media that may not yet meet all WCAG 2.2 AA criteria. Some third‑party content or widgets that we do not control may also present accessibility challenges.
            </p>
        </section>

        <section className="mt-8">
            <h2 className="text-xl font-semibold">
                Feedback & contact
            </h2>

            <p className="mt-3 text-neutral-700">
                We welcome your feedback on the accessibility of our site. If you encounter barriers or need assistance, please contact us. We aim to respond within a reasonable timeframe.
            </p>

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

        <section className="mt-8">
            <h2 className="text-xl font-semibold">
                Ongoing improvements
            </h2>

            <p className="mt-3 text-neutral-700">
                Accessibility is a journey. We review this statement periodically and update our processes as standards, technologies, and user needs evolve.
            </p>
        </section>

        <p className="mt-10 text-xs text-neutral-500">
            This statement is provided for general information and does not create legal obligations beyond those required by applicable law.
        </p>
    </div>
</main>
</body>
</html>
